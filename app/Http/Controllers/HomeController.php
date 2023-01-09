<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','revalidate']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tamu = Tamu::All()->count();
        $hadir = Tamu::where('keterangan',1)->count();
        $tidak = Tamu::where('keterangan',0)->count();
        $kosong = Tamu::where('keterangan', NULL)->count();
        return view('home',compact('hadir','tidak','kosong','tamu'));
    }
    
}
