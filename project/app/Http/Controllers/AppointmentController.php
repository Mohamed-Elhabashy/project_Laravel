<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.appointment.index', ['appointments' => Appointment::paginate(25)]);
    }

    public function store(StoreAppointmentRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        $inputs['doctor_id'] = (int)$inputs['doctor_id'];
        //dd($inputs);
        Appointment::create($inputs);
        session()->flash('message', 'appointment added Successfully');
        return back();
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        session()->flash('message', 'appointment deleted Successfully');

        return back();
    }
}
