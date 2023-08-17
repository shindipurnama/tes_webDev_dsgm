<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penjualan = Penjualan::all();
        return view('penjualan',compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::All();
        return view('pos', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $penjualan = Penjualan::findOrNew($request->penjualanId);
        $penjualan->user_id = $request->user_id;
        $penjualan->tanggal = $request->tanggal;
        $penjualan->customer = $request->customer;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->save();
        $penjualanID= Penjualan::latest()->first()->id; 
        
        foreach($request->id as $key){
            $data = array(
                'penjualan_id'=>$penjualanID,
                'barang_id'=>$request->id[$key],
                'qty'=>$request->qty[$key],
                'harga'=>$request->harga[$key],
            );
            DetailPenjualan::create($data);

            // Update Stock Barang
            $barang = Barang::find($request->id[$key]);
            $barang->stock = $barang->stock - $request->qty[$key];
            $barang->save();
        }

        return redirect()->route('penjualan.create')->with('success','Data Tersimpan');
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
        $detail = DetailPenjualan::Where('penjualan_id',$id)->get();
        return view('penjualanDetail', compact('detail'));
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
