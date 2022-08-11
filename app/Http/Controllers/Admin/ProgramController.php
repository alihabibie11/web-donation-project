<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Program::where('user_id', '=', Auth::id())->get();
        return view('pages.admin.program', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.create_program');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('photo_program')) {
            // $fileName = $request->file('photo_program')->getClientOriginalName();
            $data['photo_program'] = $request->file('photo_program')->store('assets/images/program', 'public');
        }

        $arr = [];
        $arr['facebook'] = $request->fb;
        $arr['instagram'] = $request->ig;
        $arr['twitter'] = $request->tw;

        $data['sosmed'] = json_encode($arr);
        // dd($data);

        Program::create($data);
        session()->flash('message', "Program berhasil dibuat!");

        return redirect()->route('admin.program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Program::findOrFail($id);
        $res = json_decode($item->sosmed);
        // dd($res);
        // dd($item);
        return view('pages.admin.detail_program', compact('item', 'res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Program::findOrFail($id);
        $res = json_decode($item->sosmed);
        $jenis = ['zakat', 'infaq', 'sedekah', 'umum'];
        // dd($res);
        // dd($item);
        return view('pages.admin.edit_program', compact('item', 'res', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $data = $request->all();

        if ($request->hasFile('photo_program')) {
            // $fileName = $request->file('photo_program')->getClientOriginalName();
            $data['photo_program'] = $request->file('photo_program')->store('assets/images/program', 'public');
        }

        $arr = [];
        $arr['facebook'] = $request->fb;
        $arr['instagram'] = $request->ig;
        $arr['twitter'] = $request->tw;

        $data['sosmed'] = json_encode($arr);

        $program->update($data);
        session()->flash('message', "Program berhasil diupdate!");

        return redirect()->route('admin.program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Program::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.program.index');
    }
}
