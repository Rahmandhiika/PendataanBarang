<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\testMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(){
        Mail::to('rahmandhika24@gmail.com')->send(new testMail());

        return "email has been sent";
    }
}
