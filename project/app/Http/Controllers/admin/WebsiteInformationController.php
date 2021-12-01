<?php

namespace App\Http\Controllers\admin;

use App\Models\WebsiteInformation;
use App\Http\Requests\UpdateWebsiteInformationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteInformationController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteInformation  $websiteInformation
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $websiteInformation=WebsiteInformation::first();
        return View('admin.website-information.edit',['websiteInformation'=>$websiteInformation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebsiteInformationRequest  $request
     * @param  \App\Models\WebsiteInformation  $websiteInformation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWebsiteInformationRequest $request, WebsiteInformation $websiteInformation)
    {
        if ($request->logo == null) {
            $websiteInformation->update($request->except(['logo']));
        } else {
            $inputs = $request->except(['logo']);
            $inputs['logo'] = $this->update_image($websiteInformation->logo, $request->logo);
            $websiteInformation->update($inputs);
        }
        return back();
    }
    public function update_image($old_name, $logo)
    {
        $new_name_image = $logo->hashName();
        Storage::disk('uploads')->delete('websiteInformation/'.$old_name);
        Image::make($logo)->resize(128, 128)->save(public_path('uploads/websiteInformation/'.$new_name_image));
        return $new_name_image;
    }

    
}
