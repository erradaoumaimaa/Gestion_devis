<?php

namespace App\Http\Controllers;

use App\Mail\FactureMail;
use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Browsershot\Browsershot;

class FactureController extends Controller
{
    public function show(Facture $facture) {
        $facture->load('devis.user', 'devis.services');
        $html = view('facture.show', compact('facture'))->render();
        $path = storage_path('app/facture.pdf');
        Browsershot::html($html)
        ->setNodeBinary("C:/Program Files/nodejs/node.exe")
        ->noSandbox()
        ->savePdf($path);
        Mail::to($facture->devis->user->email)->send(new FactureMail($facture));
        return response()->download($path);

    }

    // public function store(Request $request) {
    //     $validatedAttributes = $request->validate([
    //         'devis_id' => 'required|exists:devis,id',
    //     ]);

    //     Facture::create($validatedAttributes);

    //     return redirect()->back();
    // }
}
