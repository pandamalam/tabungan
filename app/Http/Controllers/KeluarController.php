<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluar;

class KeluarController extends Controller
{
    
    public function create()
    {
        return view('keluar');
    }
public function store(Request $request)
	{
		Keluar::create([

			'uid' => auth()->id(),
			'nominal' => request('nominal'),
			'keterangan' => request('ket'),
			'tanggal' => request('tanggal'),
					]);
		return back();
  	}
public function destroy(keluar $keluar){
        $keluar -> delete();
                    return back();
                }}
