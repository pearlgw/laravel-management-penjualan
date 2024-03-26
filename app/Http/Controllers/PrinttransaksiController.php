<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PrinttransaksiController extends Controller
{
    public function print($id)
    {
        $transaksi = Transaksi::find($id);
        $pdf = FacadePdf::loadView('printtransaksi.index', compact('transaksi'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('transaksi.pdf');
    }
}
