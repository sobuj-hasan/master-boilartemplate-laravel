<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(){
        return view('frontend.pages.language.index');
    }
}
