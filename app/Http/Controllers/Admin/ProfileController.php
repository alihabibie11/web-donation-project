<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = User::findOrFail(Auth::user()->id);
        $res = json_decode($item->sosmed);
        // dd($res);
        // dd($item);
        return view('pages.admin.profile', compact('item', 'res'));
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
        $item = User::findOrFail($id);
        $res = json_decode($item->sosmed);
        // dd($res);
        // dd($item);
        return view('pages.admin.edit_profile', compact('item', 'res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        // dd($data);

        if ($request->hasFile('photo_url')) {
            // $fileName = $request->file('photo_program')->getClientOriginalName();
            $data['photo_program'] = $request->file('photo_url')->store('assets/images/program', 'public');
        }

        $arr = [];
        $arr['facebook'] = $request->fb;
        $arr['instagram'] = $request->ig;
        $arr['twitter'] = $request->tw;

        $data['sosmed'] = json_encode($arr);

        $user->update($data);
        session()->flash('message', "Profile berhasil diupdate!");

        return redirect()->route('admin.profile');
    }
}
