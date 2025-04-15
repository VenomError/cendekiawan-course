<?php

namespace App\Livewire\Forms\Kursus;

use Livewire\Form;
use App\Models\Kursus;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

class UpdateKursusForm extends Form
{
    public $name;
    public $price;
    public $hour_duration;
    public $description;


    /**
     *
     * @param \App\Models\Kursus|\Illuminate\Database\Eloquent\Collection $kursus
     */
    public function update(Kursus|Collection $kursus)
    {
        try
        {
            $this->validate(
                [
                    'name' => "required|unique:kursuses,name,{$kursus->id}",
                    'price' => 'required|numeric|min:1',
                    'hour_duration' => 'required|numeric|min:1',
                    'description' => 'required',
                ]
            );

            return DB::transaction(function () use ($kursus) {

                $kursus->update($this->all());

                flash()->success('Update Kursus Success');
                return true;
            });
        } catch (ValidationException $th)
        {
            flash()->error($th->getMessage());
            throw $th;
        } catch (\Throwable $th)
        {
            flash()->error('Failed to Update Kursus');
            return false;
        }
    }

    public function setFrom(Kursus|Collection $kursus)
    {
        $this->name = $kursus->name;
        $this->price = $kursus->price;
        $this->hour_duration = $kursus->hour_duration;
        $this->description = $kursus->description;
    }


}
