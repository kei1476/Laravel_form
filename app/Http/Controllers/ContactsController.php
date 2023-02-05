<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactsSendmail;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();

        return view('contact.confirm',['inputs' => $inputs]);
    }

    public function send(ContactRequest $request)
    {
        $action = $request->input('action');

        $inputs = $request->except('action');

        if($action !== 'submit')
        {
            return redirect()
                        ->route('contact.index')
                        ->withInput($inputs);
        }else {
            \Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));

            $request->session()->regenerateToken();

            return view('contact.thanks');
        }
    }
}
