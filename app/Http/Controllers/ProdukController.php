<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = \App\Produk::all();
 
        return $produks->toJson();
    }
 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'nama' => 'required',
          'merk' => 'required',
          'storage' => 'required',
          'tahun' => 'required',
          'garansi' => 'required',
          'status' => 'required',
        ]);
 
        $project = \App\Produk::create([
          'nama' => $validatedData['nama'],
          'merk' => $validatedData['merk'],
          'storage' => $validatedData['storage'],
          'tahun' => $validatedData['tahun'],
          'garansi' => $validatedData['garansi'],
          'status' => $validatedData['status'],
        ]);
 
        $msg = [
            'success' => true,
            'message' => 'Berhasil Menambahkan Produk!'
        ];
 
        return response()->json($msg);
    }
 
    public function getProduk($id) // for edit and show
    {
        $produk = \App\Produk::find($id);
 
        return $produk->toJson();
    }
 
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'merk' => 'required',
            'storage' => 'required',
            'tahun' => 'required',
            'garansi' => 'required',
            'status' => 'required',
        ]);
 
        $produk = \App\Produk::find($id);
        $produk->nama = $validatedData['nama'];
        $produk->merk = $validatedData['merk'];
        $produk->storage = $validatedData['storage'];
        $produk->tahun = $validatedData['tahun'];
        $produk->garansi = $validatedData['garansi'];
        $produk->status = $validatedData['status'];
        $produk->save();
 
        $msg = [
            'success' => true,
            'message' => 'Berhasil Mengupdate Produk!'
        ];
 
        return response()->json($msg);
    }
 
    public function delete($id)
    {
        $produk = \App\Produk::find($id);
        if(!empty($produk)){
            $produk->delete();
            $msg = [
                'success' => true,
                'message' => 'Berhasil Menghapus Produk!'
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'success' => false,
                'message' => 'Gagal Menghapus Produk!!'
            ];
            return response()->json($msg);
        }
    }
}
