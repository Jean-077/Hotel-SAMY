<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;


class MailController extends Controller
{
    public function getMail(){
        FacadesMail::to('anthonycalapuja@gmail.com');
    }
}
