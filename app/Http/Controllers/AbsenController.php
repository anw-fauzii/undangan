<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Tamu;
use Illuminate\Http\Request;

class AbsenController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'revalidate']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::orderBy('id', 'DESC')->get();
        return view('absen.index', compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tamu = Tamu::where('kode', $request->tamu_id)->first();
        if ($tamu) {
            $cek = Absen::where([
                'tamu_id' => $tamu->id,
                'tanggal' => date('Y-m-d')
            ])->first();
            if ($cek) {
                return redirect('/absen')->with('alert', [
                    'type' => 'error',
                    'title' => 'Gagal',
                    'message' => 'Anda sudah absen'
                ]);
            } else {
                Absen::create([
                    'tamu_id' => $tamu->id,
                    'tanggal' => date('Y-m-d')
                ]);
                $pp = Tamu::find($tamu->id);
                return redirect('/absen')->with('alert', [
                    'type' => 'success',
                    'title' => 'Selamat Datang ' . $pp->nama,
                    'message' => 'Silahkan masuk, terima kasih'
                ]);
            }
        } else {
            return redirect('/absen')->with('alert', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => 'Barcode tidak valid'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
