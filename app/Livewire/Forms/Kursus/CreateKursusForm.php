<?php

namespace App\Livewire\Forms\Kursus;

use App\Models\Kursus;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Form;
use Livewire\WithFileUploads;

class CreateKursusForm extends Form
{
    use WithFileUploads;

    public $name;

    public $price;

    public $hour_duration;

    public $description;

    public $thumbnail;

    /**
     * teacher_name
     *
     * @var mixed
     */
    public $teacher_name;

    /**
     * teacher_foto
     *
     * @var mixed
     */
    public $teacher_foto;

    public array $benefits = [];

    /**
     * rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:kursuses,name',
            'price' => 'required|numeric|min:1',
            'hour_duration' => 'required|numeric|min:1',
            'description' => 'required',
            'benefits' => 'required|array',
        ];
    }

    public function create()
    {
        try {
            $this->validate();

            return DB::transaction(function () {

                $kursus = new Kursus(
                    $this->all()
                );
                $kursus->save();

                flash()->success('Create new Kursus Success');
                $this->reset();

                return $kursus;
            });
        } catch (ValidationException $th) {
            flash()->error($th->getMessage());
            throw $th;
        } catch (\Throwable $th) {
            flash()->error('Failed to Create Kursus');

            return false;
        }
    }

    public function uploadThumbnail($thumbnail)
    {

        $this->thumbnail = $thumbnail->storePublicly(path: 'kursus/thumbnail', options: 'public');
    }

    public function uploadTeacherFoto($teacherFoto)
    {

        $this->teacher_foto = $teacherFoto->storePublicly(path: 'kursus/teacher-foto', options: 'public');
    }
}
