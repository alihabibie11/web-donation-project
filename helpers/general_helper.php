<?php

use App\Models\Donation;

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
function getTotalDonation($user_id)
{
    $donasi = Donation::where('user_id', $user_id)->sum('jumlah');
    return 'Rp' . number_format($donasi);
}
