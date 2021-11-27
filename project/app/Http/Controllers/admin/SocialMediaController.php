<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\ViewModels\SocialMediaViewModel;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.social-media.index', ['socialMedias' => SocialMedia::all()]);
    }
    
    public function create()
    {
        return View('admin.social-media.form', new SocialMediaViewModel);
    }

    public function store(StoreSocialMediaRequest $request)
    {
        SocialMedia::create($request->all());
        session()->flash('success', 'Social Media Created Successfully');

        return back();
    }

    public function edit(SocialMedia $socialMedia)
    {
        return View('admin.social-media.form', new SocialMediaViewModel($socialMedia));

    }

    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialMedia)
    {
        $socialMedia->update($request->all());
        session()->flash('success', 'Social Media Created Successfully');

        return back();
    }

    public function destroy(SocialMedia $socialMedia)
    {
        dd($socialMedia);
    }
}
