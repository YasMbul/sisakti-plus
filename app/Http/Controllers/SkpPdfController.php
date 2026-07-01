<?php

namespace App\Http\Controllers;

use App\Models\Skp;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;

class SkpPdfController extends Controller
{
    public function download()
    {
        $user = auth()->user()->load('major');

        $skps = Skp::where('user_id', $user->id)
            ->with(['skpDetail.partisipasi'])
            ->orderBy('start_date')
            ->get();

        // Hanya yang approved yang dihitung ke total SKP
        $totalBobot = $skps
            ->where('status', 'approved')
            ->sum(fn($skp) => $skp->skpDetail->bobot ?? 0);

        $pdf = Pdf::loadView('pdf.kartu-skp', [
            'user' => $user,
            'skps' => $skps,
            'totalBobot' => $totalBobot,
        ]);

        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('Kartu-SKP-' . $user->nim . '.pdf');
    }
}