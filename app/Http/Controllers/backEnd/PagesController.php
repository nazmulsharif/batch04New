<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('backEnd.admin.pages.home');
    }
}
