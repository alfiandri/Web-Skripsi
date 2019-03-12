<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilPrediksi;
use App\RLB;
use Yajra\DataTables\Facades\DataTables;
use Validator;
use Illuminate\Support\Facades\Input;
use PDF;

class HasilPrediksiController extends Controller
{
	protected $rules = 
    [
        'bulan' => 'required|string',
        'inflasi' => 'required|numeric',
        'kursdollar' => 'required|numeric',
        'sukubunga' => 'required|numeric'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
        return view('pages.prediksi');
    }

    //Pages -> Prediksi ->Store!
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(),$this->rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $pred = new HasilPrediksi();
            $pred->bulan      = $request->bulan;
            $pred->inflasi    = $request->inflasi;
            $pred->kursdollar = $request->kursdollar;
            $pred->sukubunga  = $request->sukubunga;

            //menghitung hasil dengan persamaan regresi
            $rlb = RLB::orderBy('id', 'desc')->first();
            $b1  = $rlb->b1 * ($pred->inflasi/100); // b0 x x1
            $b2  = $rlb->b2 * ($pred->kursdollar/100); // b0 x x2
            $b3  = $rlb->b3 * ($pred->sukubunga/100); // b0 x x3
            $pred->hasil = $rlb->b0 + $b1 + $b2 + $b3;
            $pred->save();

            return response()->json(array("success"=>true));
        }
    }

    public function datatables()
    {
        $selected = HasilPrediksi::orderBy('id', 'ASC');
        
        return DataTables::of($selected)
            ->addIndexColumn()
            ->editColumn('inflasi', '{{ $inflasi}} %')
            ->editColumn('kursdollar', 'Rp {{ number_format($kursdollar)}}')
            ->editColumn('sukubunga', '{{ $sukubunga }} %')
            ->editColumn('hasil', 'Rp {{ number_format($hasil*100) }}')
            ->addColumn('action',function ($selected){
                return 
                '<button type="button" class="btn waves-effect waves-light grey btnEdit" data-edit="'.route('prediksi.edit', $selected->id).'">Edit</button>
                <button type="button" class="btn waves-effect waves-light green btnEdit" data-edit="'.route('laporan', $selected->id).'">Print</button>
                <button type="submit" class="btn waves-effect waves-light red btnDelete" data-remove="'.route('prediksi.destroy', $selected->id).'">Delete</button>';
        })
        ->make(true);
    }

    //delete data
    public function destroy($id)
    {
        if (HasilPrediksi::destroy($id)) {
           $data = 'Success';
        }else{
            $data = 'Failed';
        }
        return response()->json($data);
    }

    //Pages -> Prediksi-> Edit
    public function edit($id)
    {
        $data = HasilPrediksi::find($id);
        return response()->json($data);
    }

    //Pages -> Prediksi -> Update!
    public function update(Request $request, $id)
    {
        $Validator = Validator::make(Input::all(), $this->rules);

        if ($Validator->fails()) {
            return response()->json(array('errors' => $Validator->getMessageBag()->toArray()));
        }else{
            $pred = HasilPrediksi::find($id);
            $pred->bulan      = $request->bulan;
            $pred->inflasi    = $request->inflasi;
            $pred->kursdollar = $request->kursdollar;
            $pred->sukubunga  = $request->sukubunga;

            //menghitung hasil dengan persamaan regresi
            $rlb = RLB::orderBy('id', 'desc')->first();
            $b1  = $rlb->b1 * ($pred->inflasi/100); // b0 x x1
            $b2  = $rlb->b2 * ($pred->kursdollar/100); // b0 x x2
            $b3  = $rlb->b3 * ($pred->sukubunga/100); // b0 x x3
            $pred->hasil = $rlb->b0 + $b1 + $b2 + $b3;

            $pred->update();

            return response()->json(array("success"=>true));
        }
    }

    // Pages -> Laporan -> Semua
    public function semuaLaporan()
    {
        $data = HasilPrediksi::orderBy('id', 'ASC')->get();
        // return view('pages.laporan-semua', compact('data'));

        $pdf = PDF::loadView('pages.laporan-semua', compact('data'))->setPaper('a4', 'landscape');
  
        return $pdf->download('Laporan-Prediksi-Harga-Emas.pdf');
    }

    // Pages -> Laporan -> Cetak By ID
    public function laporan($id)
    {
        $data = HasilPrediksi::where('id', $id)->get();
        // return view('pages.laporan-semua', compact('data'));

        $pdf = PDF::loadView('pages.laporan-semua', compact('data'))->setPaper('a4', 'landscape');
  
        return $pdf->download('Laporan-Prediksi-Harga-Emas.pdf');
    }
}