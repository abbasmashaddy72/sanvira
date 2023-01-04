<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage($langCode)
    {
        App::setLocale($langCode);
        session()->put("lang_code", $langCode);

        return redirect()->back();
    }
}
