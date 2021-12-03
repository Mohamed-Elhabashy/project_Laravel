<?php

namespace App\ViewModels;

use App\Models\SubscribeMail;
use Spatie\ViewModels\ViewModel;

class SubscribeMailViewModel extends ViewModel
{
    public $subscribeMail;

    public function __construct($subscribeMail = null)
    {
        $this->subscribeMail = is_null($subscribeMail) ? new SubscribeMail(old()) : $subscribeMail;
        // dd($this->socialMedia);
    }

    public function action() : string
    {
        return is_null($this->subscribeMail->id)
            ? route('admin.subscribe.mail.store')
            : route('admin.subscribe.mail.update', ['subscribeMail' => $this->subscribeMail->id]);
    }

    public function method() : string
    {
        return is_null($this->subscribeMail->id) ? 'POST' : 'PUT';
    }
}
