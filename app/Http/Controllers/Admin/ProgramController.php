<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galleries;
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
        // dd($data['photo']);
        $data['user_id'] = Auth::user()->id;

        $photo = [];
        if ($request->hasFile('photo')) {
            // $fileName = $request->file('photo_program')->getClientOriginalName();
            $no = 0;
            foreach ($data['photo'] as $item) {
                $photo[$no++] = $item->store('assets/images/program', 'public');
                // $data['photo'] = $request->file('photo_program')->store('assets/images/program', 'public');
            }
        }
        // dd($photo);

        $arr = [];
        $arr['facebook'] = $request->fb;
        $arr['instagram'] = $request->ig;
        $arr['twitter'] = $request->tw;

        $data['sosmed'] = json_encode($arr);
        // dd($data);

        $program = Program::create($data);

        foreach ($photo as $ph) {
            $pic = new Galleries(
                [
                    'url' => $ph
                ]
            );
            $program->gallery()->save($pic);
        }

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
        $item = Program::with('gallery')->findOrFail($id);
        $gallery = $item->gallery;
        $res = json_decode($item->sosmed);
        // dd($res);
        // dd($item->gallery);
        return view('pages.admin.detail_program', compact('item', 'res', 'gallery'));
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
