<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RLB;
use App\DataEmas;

class RLBController extends Controller
{
    public function index()
    {
    	$emas = DataEmas::orderBy('id', 'ASC')->get();
    	$data = DataEmas::count();
        return view('pages.rlb', compact('emas', 'data'));
    }

    public function store(Request $request)
    {
    	//memvalidasi data
		$this->validate($request, [
			'b0' => 'required|numeric',
			'b1' => 'required|numeric',
			'b2' => 'required|numeric',
			'b3' => 'required|numeric',
		]);

		try {
			//simpan data ke dalam table
			$rlb = RLB::firstOrCreate([
				'b0' => $request->b0,
				'b1' => $request->b1,
				'b2' => $request->b2,
				'b3' => $request->b3,
			]);

			//jika sukses maka akan redirect ke halaman prediksi
			return redirect(route('prediksi.index'))
				->with(['success' => 'Persamaan regresi berhasil telah ditambah.']);
		} catch (Exception $e) {
			//jika terjadi kesalahan maka akan redirect ke halaman sebelumnya
			return redirect()->back()
					->with(['error' => $e->getMessage()]);
		}
    }
}
