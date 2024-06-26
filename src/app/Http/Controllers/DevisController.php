<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Devis;
use Spatie\Browsershot\Browsershot;
class DevisController extends Controller
{

    public function index() {
        $devis = Devis::latest()
                ->filter(request(['q']))
                ->with('user', 'services', 'facture')
                ->paginate(10);
        return view('devis.all', compact('devis'));
    }

    public function show(Devis $devis) {
        $devis->load('user', 'services');
        $html = view('devis.show', compact('devis'))->render();
        $path = storage_path('app/devis.pdf');
        Browsershot::html($html)
        ->scale(0.7)
        ->setNodeBinary("C:/Program Files/nodejs/node.exe")
        ->noSandbox()
        ->savePdf($path);
        // return view('devis.show', compact('devis'));
        return response()->download($path);

    }

    public function create() {
        $users = User::all()->where('role','!=', 'admin');
        $services = Service::all();
        return view('devis.create', compact('users', 'services'));
    }

    public function store(Request $request) {
        $payload = $request->validate([
            'user_id' => 'required|exists:users,id',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            'total_ht' => 'required|numeric',
            'total_ttc' => 'required|numeric',
            'tva' => 'nullable|numeric',
            'reduction' => 'nullable|numeric',
        ]);

        $devis = Devis::create($payload);
        foreach($payload['services'] as $service) {
            $devis->services()->attach($service);
        }

        return redirect()->route('devis.all', $devis->id)->with('success', 'Devis créé avec succès');
    }

    public function approve(Devis $devis) {
        $devis->status = "approved";
        $devis->save();
        Facture::create([
            'devis_id' => $devis->id
        ]);
        return redirect()->back();
    }

    public function destroy(Devis $devis) {
        $devis->delete();
        return redirect()->back();
    }
}
