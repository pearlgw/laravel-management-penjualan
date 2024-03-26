<?php

namespace App\Http\Controllers;

use App\Models\StokToko;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PrintsuratjalanController extends Controller
{
    public function print($id)
    {
        $stoktoko = StokToko::find($id);
        $pdf = FacadePdf::loadView('printsuratjalan.index', compact('stoktoko'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('surat_jalan.pdf');
    }
}
