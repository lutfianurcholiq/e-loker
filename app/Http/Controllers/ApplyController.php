<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apply = Apply::with('user')->get();
        $no = 1;

        // return $apply;

        return view('master.apply.index', [
            'title' => 'Apply',
            'apply' => $apply,
            'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'nama_perusahaan' => 'required|max:255',
            'tgl_apply' => 'required',
            'media_apply' => 'required',
            'status_apply' => 'required'
        ], [
            'nama_perusahaan.required' => 'Nama Perusahaan Tidak Boleh Kosong',
            'nama_perusahaan.max' => 'Nama Perusahaan Tidak Boleh Lebih Dari 255 Karakter',
            'tgl_apply.required' => 'Tanggal Apply Tidak Boleh Kosong',
            'media_apply.required' => 'Media Apply Tidak Boleh Kosong',
            'status_apply.required' => 'Status Apply Tidak Boleh Kosong',
        ]);

        Apply::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'tgl_apply' => $request->tgl_apply,
            'media_apply' => $request->media_apply,
            'status_apply' => $request->status_apply,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/apply')->with('success', 'Apply Success Add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function show(Apply $apply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function edit(Apply $apply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apply $apply)
    {
        $validate = $request->validate([
            'status_apply' => 'required'
        ]);

        Apply::where('id', $apply->id)->update($validate);

        return redirect('/apply')->with('success','Apply has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apply $apply)
    {
        $apply->delete();

        return redirect('/apply');
        
    }
}
