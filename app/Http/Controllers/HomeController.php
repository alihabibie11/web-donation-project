<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Program;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $header = true;
        $nav = true;
        $program = Program::all();
        return view('pages.home', compact('header', 'nav', 'program'));
    }

    public function detail($id)
    {
        $user = auth()->check();
        $nav = false;
        $detail = 'Detail Program Donasi ' . $id;
        $program = Program::with('donatur')->find($id);
        $donated = Donation::with('program', 'donatur')->where('program_id', '=', $id)->latest()->get();

        $total = $program->target;
        $value_now = $program->dana_terkumpul;
        $result = ($value_now / $total) * 100;
        $dana_terkumpul = round($result, 0) . '%';
        // dd($dana_terkumpul);
        // dd($donated);
        return view('pages.detail', compact('user', 'nav', 'detail', 'program', 'donated', 'dana_terkumpul'));
    }

    public function detail_donasi($id)
    {
        $user = auth()->check();
        $nav = false;
        $detail = 'Nama Program Donasi #' . $id;
        return view('pages.detail_donasi', ['detail' => $detail, 'user' => $user, 'nav' => $nav]);
    }

    public function list_program()
    {
        $user = auth()->check();
        $nav = true;
        if (isset($_GET['search_program']) && $_GET['search_program'] != '') {
            $program = Program::where('status', '!=', 'SELESAI');
            $program_done = Program::where('status', '=', 'SELESAI');
            $program = $program->where('title', 'like', '%' . $_GET['search_program'] . '%');
            $program_done = $program_done->where('title', 'like', '%' . $_GET['search_program'] . '%');
            if (isset($_GET['category']) && $_GET['category'] != 'all') {
                $category = $_GET['category'];
                $program = $program->where('jenis', '=', $category);
                $program_done = $program_done->where('jenis', '=', $category);
            }
            $program = $program->get();
            $program_done = $program_done->get();
            return view('pages.list_program', compact('user', 'nav', 'program', 'program_done'));
        }
        $program = Program::where('status', '!=', 'SELESAI');
        $program_done = Program::where('status', '=', 'SELESAI');
        $program = $program->get();
        $program_done = $program_done->get();
        return view('pages.list_program', compact('user', 'nav', 'program', 'program_done'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDonationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function add_donation(Request $request)
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

        $rand_id = $id ?? rand(00, 99);
        // ['KD','ID','PROGRAM_ID', 'RANDOM+DATE']
        $kode_donasi = 'KD-' . $rand_id . '-' . $data['program_id'] . '-' . rand(00, 99) . date('d');

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

        // midtrans call back (notif) tidak berjalan di local
        // Konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Setup midtrans variable
        $midtrans = array(
            'transaction_details' => array(
                'order_id' =>  $kode_donasi,
                'gross_amount' => (int) $data['jumlah'],
            ),
            'donatur_details' => array(
                'first_name'    => $name ?? $data['nama'],
                'email'         => $email ?? $data['email']
            ),
            'enabled_payments' => array('gopay', 'bank_transfer'),
            'vtweb' => array()
        );
        try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            $donate->update(['payment_url' => $paymentUrl]);
            // Redirect ke halaman midtrans
            return redirect($paymentUrl);
        } catch (Exception $e) {
            return $e;
        }

        return redirect()->route('detail_donasi', $donate->id);
    }

    public function cek_donasi()
    {
        $user = auth()->check();
        $nav = true;
        return view('pages.cek_donasi', ['user' => $user, 'nav' => $nav]);
    }

    public function cari_donasi()
    {
        $kode_donasi = $_GET['id'] ?? '';
        $email = $_GET['email'] ?? '';
        // dd($kode_donasi, $email);
        $donate = Donation::with('program')->where('kode_donasi', '=', $kode_donasi)->where('email', '=', $email)->first();
        // dd($donate);
        $html = '';

        if ($donate) {
            $html .=
                '<table class="table">
            <tr>
                <td>ID Donasi</td>
                <td>:</td>
                <td>' . $donate->kode_donasi . '</td>
            </tr>
            <tr>
                <td>Program</td>
                <td>:</td>
                <td>' . $donate->program->title . '</td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td>:</td>
                <td>MIDTRANS PAYMENT</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>Menunggu</td>
            </tr>
            <tr>
                <td>Nominal Donasi</td>
                <td>:</td>
                <td>Rp. ' . number_format($donate->jumlah) . '</td>
            </tr>
            <tr>
                <td>Kode Unik</td>
                <td>:</td>
                <td>Belum ada kode unik</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td>Rp. ' . number_format($donate->jumlah) . '</td>
            </tr>
        </table>';
        } else {
            $html .= '<h4 class="text-center">Donasi tidak ditemukan<h4>';
        }

        echo $html;
        die;
    }
}
