<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recent_donated = Donation::where('user_id', '=', Auth::id())->latest()->take(5)->get();
        return view('pages.user.index', compact('recent_donated'));
    }

    public function donation_history()
    {
        $donated = Donation::with('program')->where('user_id', '=', Auth::id())->get();
        return view('pages.user.riwayat_donasi', compact('donated'));
    }

    public function profile($id)
    {
        $item = User::find($id);
        $res = json_decode($item->sosmed);
        // dd($item, $res);
        return view('pages.user.profile', compact('item', 'res'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('test');
        $item = User::find($id);
        $res = json_decode($item->sosmed);
        // dd($res);
        dd($item, $res);
        return view('pages.user.profile', compact('item', 'res'));
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
