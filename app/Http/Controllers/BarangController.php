<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class BarangController extends Controller
{
    public function index(){
        $data = Barang::all();
        return response()->json($data);

    }


    public function store(Request $request)
    {
        $data = $request->all();
        $barang = Barang::create($data);

        return response()->json($barang);
    }


    public function show($id)
    {
       $data = Barang::findOrFail($id);
       return response()->json($data);
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['message'=>'Data Not Found'],404);
            # code...
        }

        $barang->delete();
        return response()->json(['message'=>'Data Delete Successfully'],200);
    }

    public function update(Request $request,$id)
    {
        $barang =Barang::find($id);

        if(!$barang){
            return response()->json(['message'=>'Data Not Found'], 404);
        }

        $this->validate($request,[
            "nama_barang"=>"Required|Unique:barang",
            "jumlah_barang"=>"required",
            "harga_barang"=>"required",
            "image_barang"=>"required",

        ]);

        $data =$request->all();
        $barang->fill($data);
        $barang->save();

        return response()->json($barang);
    }
}
