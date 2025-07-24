<?php
namespace App\Livewire\Forms\Pendaftar;

use App\Enum\PendaftarStatus;
use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\Pendaftar;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Livewire\Form;

class CreatePendaftarForm extends Form
{
    /**
    "user_id",
    "phone",
    "institute",
    "pekerjaan",
    "jabatan",
    "status",
     */

    public $user_id;
    public $phone;
    public $institute;
    public $pekerjaan;
    public $jabatan;
    public $status;

    public function rules()
    {

        return [
            'user_id'   => ['required', 'exists:users,id'],
            'phone'     => ['required'],
            'institute' => ['required'],
            'pekerjaan' => ['nullable'],
            'jabatan'   => ['nullable'],
            'status'    => ['nullable', Rule::in(PendaftarStatus::values())],
        ];

    }

    public function create(Kursus | Model $kursus)
    {
        $this->status = PendaftarStatus::NEW ->value;
        $this->validate();

        try {
            $pendaftar = new Pendaftar([
                "user_id"   => $this->user_id,
                "phone"     => $this->phone,
                "institute" => $this->institute,
                "pekerjaan" => $this->pekerjaan,
                "jabatan"   => $this->jabatan,
                "status"    => $this->status,
            ]);
            if($kursus->jadwals->count() == 0){
                sweetalert()->info('belum ada jadwal untuk kursus ini');
                throw new \Exception('belum ada jadwal untuk kursus ini');
            }

            $pendaftar->save();


            $kursus->pendaftars()->syncWithoutDetaching($pendaftar);

            $jadwal = $this->getAvailableOrCreateJadwal($kursus->id);
            $jadwal->pendaftars()->syncWithoutDetaching($pendaftar);

            return $pendaftar;
        } catch (\Throwable $th) {
            return false;
            //throw $th;
        }

    }

    public function getAvailableOrCreateJadwal($kursusId): Jadwal
{
    $today = now()->startOfDay(); // Waktu hari ini jam 00:00:00

    // 1. Ambil semua jadwal aktif yang end_datetime-nya belum lewat
    $jadwals = Jadwal::where('kursus_id', $kursusId)
        ->where('end_datetime', '>=', $today)
        ->orderBy('start_datetime', 'asc')
        ->get();

    // 2. Cek apakah ada jadwal yang belum penuh
    foreach ($jadwals as $jadwal) {
        if ($jadwal->pendaftars()->count() < $jadwal->quota) {
            return $jadwal;
        }
    }

    // 3. Tidak ada jadwal aktif atau semua penuh → ambil jadwal terakhir (aktif/tidak)
    $lastJadwal = Jadwal::where('kursus_id', $kursusId)
        ->orderByDesc('end_datetime')
        ->first();

    if (! $lastJadwal) {
        throw new \Exception('Tidak ada jadwal sebelumnya untuk menentukan durasi.');
    }

    // 4. Hitung durasi hari (pastikan ada perbedaan waktu valid)
    $start = $lastJadwal->end_datetime->copy()->addDay()->startOfDay(); // hari berikutnya jam 00:00
    $durationInDays = $lastJadwal->start_datetime->diffInDays($lastJadwal->end_datetime) + 1;

    $end = $start->copy()->addDays($durationInDays - 1)->endOfDay(); // hari terakhir jam 23:59:59

    // 5. Buat jadwal baru
    $newJadwal = Jadwal::create([
        'kursus_id'      => $kursusId,
        'start_datetime' => $start,
        'end_datetime'   => $end,
        'quota'          => $lastJadwal->quota,
        'location'       => $lastJadwal->location,
    ]);

    return $newJadwal;
}


}
