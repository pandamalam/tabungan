<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masuk;
use Auth;
class MasukController extends Controller
{
    public function create()
    {
        return view('masuk');
    }
public function store(Request $request)
	{
		Masuk::create([

			'uid' => Auth::user()->id,
			'nominal' => request('nominal'),
			'keterangan' => request('ket'),
			'tanggal' => request('tanggal'),
					]);
		 return back();
  	}
public function destroy(masuk $masuk){
        $masuk -> delete();
                    return back();
                }
}
