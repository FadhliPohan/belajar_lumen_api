<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

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
       $data = Barang::find($id);
       return response()->json($data);
    }

    public function delete(Request $request)
    {
        # code...
    }

    public function update(Request $request)
    {
        # code...
    }
}
