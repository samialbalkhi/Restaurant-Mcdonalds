<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\Employment_application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendmail(Request $request)
    {
        $data=[
            'name' => '$request->name',
            'email' => '$request->email',
            'messge' => '$request->messge',

        ];
        Mail::to('samialbalkhi766@gmail.com')->send(new Employment_application($data));
        return response('success');
    }
}
