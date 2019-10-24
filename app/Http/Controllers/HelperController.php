<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    function refreshcaptcha(){
        return captcha_img('flat');
    }
}
