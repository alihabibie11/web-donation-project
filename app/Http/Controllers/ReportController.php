<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Program;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function report($type)
    {

        if ($type == 'program') {
            $program = Program::where('user_id', '=', Auth::id())->get();
            $data = [
                'title' => 'Program Donasi',
                'date' => date('m/d/Y'),
                'type' => 'program',
                'items' => $program
            ];
            $pdf = Pdf::loadView('pages.report.program', $data);
        }

        if ($type == 'donasi') {
            $donation = DB::table('donations')
                ->leftjoin('programs', 'donations.program_id', '=', 'programs.id')
                ->leftjoin('users', 'donations.user_id', '=', 'users.id')
                ->where('programs.user_id', '=', Auth::id())
                ->select('donations.*', 'programs.title', 'users.name')
                ->get();
            // dd($donation);

            $data = [
                'title' => 'Donasi',
                'date' => date('m/d/Y'),
                'type' => 'donasi',
                'items' => $donation
            ];

            $pdf = Pdf::loadView('pages.report.donasi', $data);
        }

        if ($type == 'donatur') {
            $users = DB::table('users')
                ->join('programs', 'users.id', '=', 'programs.user_id')
                ->join('donations', 'users.id', '=', 'donations.user_id')
                ->select('users.*', 'programs.title', 'donations.jumlah')
                ->where('programs.user_id', '=', Auth::user()->id)
                ->groupBy('users.id')
                ->get();

            $data = [
                'title' => 'Donatur',
                'date' => date('m/d/Y'),
                'type' => 'donatur',
                'items' => $users
            ];
            $pdf = Pdf::loadView('pages.report.donatur', $data);
        }

        return $pdf->stream();
    }

    public function myReport($id)
    {
        $donasi = Donation::where('user_id', $id)->get();
        $data = [
            'title' => 'Program Donasi',
            'date' => date('m/d/Y'),
            'type' => 'program',
            'program' => $donasi
        ];
        $pdf = Pdf::loadView('pages.report.program', $data);
        return $pdf->stream();
    }
}
