<?php

namespace App\ViewModels;

use App\Models\SocialMedia;
use Spatie\ViewModels\ViewModel;

class SocialMediaViewModel extends ViewModel
{
    public $socialMedia;

    public function __construct($socialMedia = null)
    {
        $this->socialMedia = is_null($socialMedia) ? new SocialMedia(old()) : $socialMedia;

        // dd($this->socialMedia);
    }

    public function action() : string
    {
        return is_null($this->socialMedia->id)
            ? route('admin.social-media.store')
            : route('admin.social-media.update', ['socialMedia' => $this->socialMedia->id]);
    }

    public function method() : string
    {
        return is_null($this->socialMedia->id) ? 'POST' : 'PUT';
    }
}
