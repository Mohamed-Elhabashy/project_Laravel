<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\ViewModels\DoctorViewModel;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.doctor.index', ['doctors' => Doctor::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.doctor.form', new DoctorViewModel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $inputs = $request->except(['image']);
        $inputs['image'] = $this->AddImage($request->image);
        Doctor::create($inputs);
        session()->flash('message', 'Doctor added Successfully');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return View('admin.doctor.form', new DoctorViewModel($doctor));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        session()->flash('message', 'doctor updated Successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        session()->flash('message', 'doctor deleted Successfully');

        return back();
    }

    public function AddImage($image, $OldImage = null)
    {
        if ($OldImage != null) {
            Storage::disk('uploads')->delete('products/'.$OldImage);
        }
        $new_name_image = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$image->extension();
        Image::make($image)->resize(450, 450)->save(public_path('uploads/doctor/'.$new_name_image));
        return $new_name_image;
    }
}
