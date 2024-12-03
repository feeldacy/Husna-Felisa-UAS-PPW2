<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_transaksi = DB::table('transaksi')->count();
        $transaksi_count = $total_transaksi;

        $total_terjual = TransaksiDetail::sum('jumlah');

        $omset = TransaksiDetail::sum('subtotal');

        return view('dashboard', compact('transaksi_count', 'total_terjual', 'omset'));
    }
}
