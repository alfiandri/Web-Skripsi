<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\DataEmas;
// use Yajra\Datatables\Facades\Datatables;
use Yajra\DataTables\Facades\DataTables;
use Validator;

class DataEmasController extends Controller
{
    protected $rules = 
    [
        'bulan' => 'required|string',
        'hargaemas' => 'required|numeric',
        'inflasi' => 'required|numeric',
        'kursdollar' => 'required|numeric',
        'sukubunga' => 'required|numeric'
    ];

    public function index()
    {
        return view('pages.dataemas');
    }

    public function datatables()
    {
        $selected = DataEmas::orderBy('id', 'ASC');
        
        return DataTables::of($selected)
            ->addIndexColumn()
            ->editColumn('hargaemas', 'Rp {{ number_format($hargaemas)}}')
            ->editColumn('inflasi', '{{ $inflasi}} %')
            ->editColumn('kursdollar', 'Rp {{ number_format($kursdollar)}}')
            ->editColumn('sukubunga', '{{ $sukubunga }} %')
            ->addColumn('action',function ($selected){
                return 
                '<button type="button" class="btn waves-effect waves-light grey btnEdit" data-edit="'.route('dataemas.edit', $selected->id).'">Edit</button>
                <button type="submit" class="btn waves-effect waves-light red btnDelete" data-remove="'.route('dataemas.destroy', $selected->id).'">Delete</button>';
        })
        ->make(true);
    }

    //Pages -> Data Emas ->Store!
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(),$this->rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $emas = new DataEmas();
            $emas->bulan      = $request->bulan;
            $emas->hargaemas  = $request->hargaemas;
            $emas->inflasi    = $request->inflasi;
            $emas->kursdollar = $request->kursdollar;
            $emas->sukubunga  = $request->sukubunga;
            $emas->save();

            return response()->json(array("success"=>true));
        }
    }

    //Pages -> Data Emas -> Edit
    public function edit($id)
    {
        $data = DataEmas::find($id);
        return response()->json($data);
    }

    //Pages -> Data Emas -> Update!
    public function update(Request $request, $id)
    {
        $Validator = Validator::make(Input::all(), $this->rules);

        if ($Validator->fails()) {
            return response()->json(array('errors' => $Validator->getMessageBag()->toArray()));
        }else{
            $emas = DataEmas::find($id);
            $emas->bulan      = $request->bulan;
            $emas->hargaemas  = $request->hargaemas;
            $emas->inflasi    = $request->inflasi;
            $emas->kursdollar = $request->kursdollar;
            $emas->sukubunga  = $request->sukubunga;
            $emas->update();

            return response()->json(array("success"=>true));
        }
    }

    public function destroy($id)
    {
        if (DataEmas::destroy($id)) {
           $data = 'Success';
        }else{
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
