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
            $certificate = Certificate::where('certificate_code', $request->code)
                ->with('course')
                ->first();
        }
        
        return view('certificates.verify', compact('certificate'));
    }

    public function checkCertificate(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $certificate = Certificate::where('certificate_code', $request->code)
            ->with('course')
            ->first();

        if ($certificate) {
            return response()->json([
                'valid' => true,
                'data' => [
                    'student_name' => $certificate->student_name,
                    'course_title' => $certificate->course->title,
                    'certificate_code' => $certificate->certificate_code,
                    'issue_date' => $certificate->issue_date->format('F d, Y'),
                    'download_url' => route('certificates.download', $certificate),
                ]
            ]);
        }

        return response()->json([
            'valid' => false,
            'message' => 'Certificate not found'
        ], 404);
    }
}
