<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function download(Certificate $certificate)
    {
        $pdf = Pdf::loadView('pdf.certificate', compact('certificate'));
        
        return $pdf->download('certificate-' . $certificate->certificate_code . '.pdf');
    }

    public function verify(Request $request)
    {
        $certificate = null;
        if ($request->filled('code')) {
            $certificate = Certificate::where('certificate_code', $request->code)->first();
        }
        
        return view('certificates.verify', compact('certificate'));
    }
}
