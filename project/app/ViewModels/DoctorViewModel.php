<?php

namespace App\ViewModels;

use App\Models\Doctor;
use Spatie\ViewModels\ViewModel;

class DoctorViewModel extends ViewModel
{
    public $doctor;

    public function __construct($doctor = null)
    {
        $this->doctor = is_null($doctor) ? new Doctor(old()) : $doctor;
    }

    public function action() : string
    {
        return is_null($this->doctor->id)
            ? route('admin.doctor.store')
            : route('admin.doctor.update', ['doctor' => $this->doctor->id]);
    }

    public function method() : string
    {
        return is_null($this->doctor->id) ? 'POST' : 'PUT';
    }
}
