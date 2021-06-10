<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Storage;
use Toastr;

class BarangController extends Controller
{
    //

    public function index(){

        $barang = DB::table('barang')
        ->select('barang.id', 'foto_barang', 'nm_barang', 'harga_beli', 'harga_jual', 'stok')
        ->orderBy('barang.created_at', 'desc')
        ->paginate(1000);

        return view('barang.list',['barang' => $barang]);
    }

    public function form(){
        $tombol = 'Submit';
        $url = 'simpanBarang';

        return view('barang.form', compact('tombol', 'url'));
    }

    public function store(Request $request, Barang $barang ){
        $validator = Validator::make(
            $request->all(),
            [
                'foto_barang' => 'required|file|mimes:jpg,png|max:100',
                'nm_barang' => 'required|unique:barang',
                'harga_beli' => 'required|numeric',
                'harga_jual' => 'required|numeric',
                'stok' => 'required|numeric',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('barang')
                ->withErrors($validator)
                ->withInput();
        } else {
            $file = $request->file('foto_barang');
            $name = 'Barang' . date('Y') . -time() . '.' . $file->getClientOriginalExtension();
            $path = $file->move('upload/foto/', $name);
            $barang->foto_barang = $request->file('foto_barang');
            $barang->foto_barang = 'Barang' . date('Y') . -time() . '.' . $request->file('foto_barang')->getClientOriginalExtension();
            $barang->nm_barang = $request->nm_barang;
            $barang->harga_beli = $request->harga_beli;
            $barang->harga_jual = $request->harga_jual;
            $barang->stok = $request->stok;
            $barang->save();

            return redirect()->route('barang')->with('message', 'Data added Successfully');
        }
    }

    public function delete($barangId, Barang $barang)
    {
        $barang->where('id', $barangId)
            ->delete();

        return redirect()->route('barang')->with('error', 'Data Delete Successfully');
    }

    public function formEditBarang($barangId, Barang $barang)
    {
        $tombol = "Submit";
        $url = "gantiBarang";

        $barang = $barang->where('id', $barangId)
        ->first();
        return view('barang.form', compact('barang', 'tombol', 'url'));
    }

    public function ganti(Request $request, Barang $barang)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'foto_barang' => 'file|mimes:jpg,png|max:100',
                'nm_barang' => 'required',
                'harga_beli' => 'required|numeric',
                'harga_jual' => 'required|numeric',
                'stok' => 'required|numeric',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('formBarang', ['id' => $request->barangId])
                ->withErrors($validator)
                ->withInput();
        } else {            
                    $barang = $barang::find($request->barangId);
                    $file = $request->file('foto_barang');
                    $name = 'Barang' . date('Y') . -time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->move('upload/foto/', $name);
                    $barang->foto_barang = $request->file('foto_barang');
                    $barang->foto_barang = 'Barang' . date('Y') . -time() . '.' . $request->file('foto_barang')->getClientOriginalExtension();
                    $barang->nm_barang = $request->nm_barang;
                    $barang->harga_beli = $request->harga_beli;
                    $barang->harga_jual = $request->harga_jual;
                    $barang->stok = $request->stok;
                    $barang->update();
                
            }

            return redirect()->route('barang')->with('message', 'Data update Successfully');
        }
}
