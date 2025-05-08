<?php
namespace App\Livewire\Forms\Jadwal;

use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\Pendaftar;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Livewire\Form;

class CreateJadwalForm extends Form
{
    /**
    'pendaftar_id',
    'kursus_id',
    'start_datetime',
    'end_datetime',
    'location',
    'quota',
     */

    public $start_datetime;
    public $end_datetime;
    public $location;
    public $quota;

    public function rules(){

        return [
            'start_datetime' => ['required','date','after_or_equal:now'],
            'location' => ['required'],
            'quota' => ['required','numeric']
        ];

    }

    public function create(Kursus | Model $kursus, Pendaftar | Model $pendaftar)
    {

        $this->validate();

        try {
            $kursusId = $kursus->id;
            $start    = Carbon::parse($this->start_datetime);

            do {

                $end = (clone $start)->addHours($kursus->hour_duration);
                
                $conflictingJadwal = Jadwal::where('kursus_id', $kursusId)
            ->where(function ($query) use ($start, $end) {
                        $query->whereBetween('start_datetime' , [$start,$end]);
                    })->first();
                    
                if ($conflictingJadwal) {
                    // Geser waktu mulai ke setelah waktu selesai jadwal konflik
                    $start = Carbon::parse($conflictingJadwal->end_datetime);
                }

            } while ($conflictingJadwal);

            $this->start_datetime = $start;
            $this->end_datetime   = $start->copy()->addHours($kursus->hour_duration);

            // Simpan jadwal
            $jadwal = new Jadwal([
                'kursus_id'      => $kursusId,
                'pendaftar_id'   => $pendaftar->id,
                'start_datetime' => $this->start_datetime,
                'end_datetime'   => $this->end_datetime,
                'quota'          => $this->quota,
                'location'       => $this->location,
            ]);

            $jadwal->save();

            $this->reset();
            return $jadwal;

        } catch (\Throwable $th) {
            sweetalert()->error($th->getMessage());
        }

    }
}
