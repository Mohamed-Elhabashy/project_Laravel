<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscribeMailRequest;
use App\Http\Requests\UpdateSubscribeMailRequest;
use App\Models\SubscribeMail;
use App\ViewModels\SubscribeMailViewModel;
use Facade\FlareClient\View;

class SubscribeMailController extends Controller
{
    public function index()
    {
        $SubscribeMails = SubscribeMail::paginate(25);
        return View('admin.subscribe-mail.index', ['SubscribeMails' => $SubscribeMails]);
    }

    public function create()
    {
        return View('admin.subscribe-mail.form', new SubscribeMailViewModel);
    }

    public function store(StoreSubscribeMailRequest $request)
    {
        SubscribeMail::create($request->all());
        session()->flash('success', 'Email Added Successfully');

        return back();
    }

    public function edit(SubscribeMail $subscribeMail)
    {
        return View('admin.subscribe-mail.form', new SubscribeMailViewModel($subscribeMail));
    }

    public function update(UpdateSubscribeMailRequest $request, SubscribeMail $subscribeMail)
    {
        $subscribeMail->update($request->all());
        session()->flash('success', 'Email Update Successfully');

        return back();
    }

    public function destroy(SubscribeMail $subscribeMail)
    {
        dd($subscribeMail);
        $subscribeMail->delete();
        session()->flash('success', 'Email deleted Successfully');
        return back();
    }

    public function trashed()
    {
        $SubscribeMails = SubscribeMail::onlyTrashed()->paginate(25);
        return View('admin.subscribe-mail.trashed', ['SubscribeMails' => $SubscribeMails]);
    }

    public function restore($id)
    {
        SubscribeMail::withTrashed()->findOrFail($id)->restore();
        session()->flash('success', 'Email restore Successfully');
        return back();
    }

    public function ForceDelete($id)
    {
        SubscribeMail::withTrashed()->findOrFail($id)->forceDelete();
        session()->flash('success', 'Email Deleted Successfully');
        return back();
    }

    public function SendMail()
    {
        return View('admin.subscribe-mail.SendMail');
    }
}
