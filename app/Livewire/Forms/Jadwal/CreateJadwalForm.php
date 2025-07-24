<?php
namespace App\Livewire\Forms\Jadwal;

use App\Models\Jadwal;
use App\Models\Kursus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateJadwalForm extends Form
{
    /**
    'kursus_id',
    'start_datetime',
    'end_datetime',
    'location',
    'quota',
     */
    #[Validate( as : 'kursus')]
    public $kursus_id;
    #[Validate( as : 'start date')]
    public $start_datetime;
    #[Validate( as : 'end date')]
    public $location;
    #[Validate( as : 'quota')]
    public $quota;

    public function rules()
    {

        return [
            'kursus_id'      => ['required', 'exists:kursuses,id'],
            'start_datetime' => ['required', 'date', 'after_or_equal:now'],
            'location'       => ['required'],
            'quota'          => ['required', 'numeric', 'gt:0'],
        ];

    }

    public function create()
    {
        $this->validate();

        $kursus = Kursus::find($this->kursus_id);

        // Hitung end_datetime berdasarkan start_datetime + durasi dalam jam
        $start_datetime = Carbon::parse($this->start_datetime);
        $end_datetime   = $start_datetime->copy()->addHours($kursus->hour_duration);

        // Cek konflik jadwal
        $conflict = Jadwal::where('kursus_id', $this->kursus_id)
            ->where(function ($query) use ($start_datetime, $end_datetime) {
                $query->where('start_datetime', '<', $end_datetime)
                    ->where('end_datetime', '>', $start_datetime);
            })
            ->exists();

        if ($conflict) {
            return $this->addError('start_datetime', 'Jadwal bentrok dengan jadwal kursus yang sudah ada');
        }

        DB::beginTransaction();
        try {
            // Simpan jadwal
            $jadwal = new Jadwal([
                'kursus_id'      => $this->kursus_id,
                'start_datetime' => $start_datetime,
                'end_datetime'   => $end_datetime,
                'quota'          => $this->quota,
                'location'       => $this->location,
            ]);

            $jadwal->save();

            DB::commit();
            flash('New jadwal created');
            $this->reset();

            return $jadwal;

        } catch (\Throwable $th) {
            DB::rollBack();
            sweetalert()->error($th->getMessage());
            return false;
        }
    }

    public function update(Jadwal|Model $jadwal)
    {
        $this->validate();

        $kursus = Kursus::findOrFail($this->kursus_id);

        $start_datetime = Carbon::parse($this->start_datetime);
        $end_datetime   = $start_datetime->copy()->addHours($kursus->hour_duration);

        // Cek konflik, kecuali dengan dirinya sendiri
        $conflict = Jadwal::where('kursus_id', $this->kursus_id)
            ->where('id', '!=', $jadwal->id)
            ->where(function ($query) use ($start_datetime, $end_datetime) {
                $query->where('start_datetime', '<', $end_datetime)
                    ->where('end_datetime', '>', $start_datetime);
            })
            ->exists();

        if ($conflict) {
            return $this->addError('start_datetime', 'Jadwal bentrok dengan jadwal kursus lain');
        }

        DB::beginTransaction();
        try {
            $jadwal->update([
                'kursus_id'      => $this->kursus_id,
                'start_datetime' => $start_datetime,
                'end_datetime'   => $end_datetime,
                'location'       => $this->location,
                'quota'          => $this->quota,
            ]);

            DB::commit();

            flash('Jadwal berhasil diperbarui');
            return true;

        } catch (\Throwable $e) {
            DB::rollBack();
            sweetalert()->error($e->getMessage());
            return false;
        }
    }

}
