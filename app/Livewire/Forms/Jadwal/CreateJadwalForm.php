<?php
namespace App\Livewire\Forms\Jadwal;

use Carbon\Carbon;
use Livewire\Form;
use App\Models\Jadwal;
use App\Models\Kursus;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

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
    public $end_datetime;
    #[Validate( as : 'location')]
    public $location;
    #[Validate( as : 'quota')]
    public $quota;

    public function rules()
    {

        return [
            'kursus_id'      => ['required', 'exists:kursuses,id'],
            'start_datetime' => ['required', 'date', 'after_or_equal:now'],
            'end_datetime'   => ['required', 'date', 'after:start_datetime'],
            'location'       => ['required'],
            'quota'          => ['required', 'numeric' , 'gt:0'],
        ];

    }

    public function create()
    {

        $this->validate();

        // Cek konflik jadwal
        $conflict = Jadwal::where('kursus_id', $this->kursus_id)
            ->where(function ($query) {
                $query->where('start_datetime', '<', $this->end_datetime)
                    ->where('end_datetime', '>', $this->start_datetime);
            })
            ->exists();

        if ($conflict) {
            return $this->addError('start_datetime' , 'Jadwal bentrok dengan jadwal kursus yang sudah ada');
        }

        DB::beginTransaction();
        try {
            // Simpan jadwal
            $jadwal = new Jadwal([
                'kursus_id'      => $this->kursus_id,
                'start_datetime' => $this->start_datetime,
                'end_datetime'   => $this->end_datetime,
                'quota'          => $this->quota,
                'location'       => $this->location,
            ]);

            $jadwal->save();
            DB::commit();
            flash('new jadwal created');
            $this->reset();
            return $jadwal;

        } catch (\Throwable $th) {
            DB::rollBack();
            sweetalert()->error($th->getMessage());
            return false;
        }

    }

    public function update(
        Jadwal | Model | Collection $jadwal,
        Kursus | Model $kursus
    ) {

        $this->validate();
        DB::beginTransaction();
        try {
            $start1 = Carbon::parse($this->start_datetime);
            $start2 = Carbon::parse($jadwal->start_datetime);

            if (! $start1->equalTo($start2)) {
                // $this->fixConflictJadwal($kursus);
                flash('Fix Conflict Jadwal Success ');
            }

            $jadwal->update([
                'start_datetime' => $this->start_datetime,
                'end_datetime'   => $this->end_datetime,
                'quota'          => $this->quota,
                'location'       => $this->location,
            ]);
            DB::commit();
            flash('Updated Successfully');
            $this->start_datetime = $this->start_datetime->format('Y-m-d\TH:i');
            return $jadwal;

        } catch (\Throwable $th) {
            DB::rollBack();
            sweetalert()->error($th->getMessage());
            return false;
        }

    }
}
