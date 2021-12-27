<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\SocialMedia;
use App\Models\WebsiteInformation;

class HomeController extends Controller
{
    public function index()
    {
        return View('index', [
            'WebsiteInfo' => $this->WebsiteInformation(),
            'doctors' => Doctor::get(),
            'categories' => Category::where('active', 'yes')->get(),
        ]);
    }

    private function WebsiteInformation()
    {
        $WebsiteInfo = [
            'facebook' => SocialMedia::select('link')->where('name_en', 'facebook')->firstOrFail()->link,
            'twitter' => SocialMedia::select('link')->where('name_en', 'twitter')->firstOrFail()->link,
            'instagram' => SocialMedia::select('link')->where('name_en', 'instagram')->firstOrFail()->link,
            'linkedin' => SocialMedia::select('link')->where('name_en', 'linkedin')->firstOrFail()->link,
            'phone' => WebsiteInformation::select('phone')->firstOrFail()->phone,
            'email' => WebsiteInformation::select('email')->firstOrFail()->email,
            'address' => WebsiteInformation::select('address')->firstOrFail()->address,
        ];
        return $WebsiteInfo;
    }
}
