<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = Tamu::where('keterangan','!=', NULL)->get();
        return view('welcome',compact('data'));
    }

    public function kode($id)
    {
        $tamu = Tamu::where('kode', $id)->first();
        if(!$tamu){
            return redirect('/');
        }else{
            $data = Tamu::where('keterangan','!=', NULL)->orderBy('updated_at', 'DESC')->get();
            return view('v_tamu',compact('data','tamu'));
        }
        
    }

    public function update(Request $request, $id)
    {
        $Tamu = Tamu::find($id)->update([
            'komentar' => $request->komentar,
            'keterangan' => $request->keterangan]);
        return redirect()->back();
    }
}
