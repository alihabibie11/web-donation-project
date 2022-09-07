<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show data donasi di sini, join ke tbel lainnya
        $data = DB::table('donations')
            ->leftjoin('programs', 'donations.program_id', '=', 'programs.id')
            ->leftjoin('users', 'donations.user_id', '=', 'users.id')
            ->where('programs.user_id', '=', Auth::id())
            ->select('donations.*', 'programs.title', 'users.name')
            ->get();
        // dd($users);
        return view('pages.admin.donasi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.create_donasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDonationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // id	program_id	user_id	nama	email	no_hp	jumlah	hamba_allah	doa	bank	status	kode_donasi	approval_picture

        $asal = $data['alamat'] ?? '';
        if (Auth::check()) {
            $name = auth()->user()->name ?? '';
            $id = auth()->user()->id ?? null;
            $asal = auth()->user()->provinsi ?? '';
            $email = auth()->user()->email ?? '';
            $no_hp = auth()->user()->no_hp ?? '';
        }

        $kode_donasi = 'KD' . $data['program_id'] . rand(000, 999) . date('d');

        $ddata = [
            'program_id' => $data['program_id'],
            'user_id' => $id ?? null,
            'nama' => $name ?? $data['nama'],
            'no_hp' => $no_hp ?? $data['no_hp'],
            'email' => $email ?? $data['email'],
            'jumlah' => $data['jumlah'],
            'hamba_allah' => $data['hamba_allah'] ?? null,
            'doa' => $data['doa'],
            'kode_donasi' => $kode_donasi,
            'asal' => $asal
        ];
        // dd($ddata);

        $donate = Donation::create($ddata);

        session()->flash('message', "Donasi berhasil dibuat!");

        return redirect()->route('detail_donasi', $donate->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        $data = $donation;
        dd($data);

        return view('pages.admin.detail_donasi', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        $data = $donation;
        // dd($data);

        return view('pages.admin.edit_donasi', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDonationRequest  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
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

        $donation->update($data);
        session()->flash('message', "Program berhasil diupdate!");

        return redirect()->route('admin.program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
