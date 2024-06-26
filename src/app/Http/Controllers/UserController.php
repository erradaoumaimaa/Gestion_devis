<?php

namespace App\Http\Controllers;

use App\Models\Service;

use App\Models\Category;
use App\Models\User;
use App\Models\Devis;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $clientsCount = User::count();
        $servicesCount = Service::count();
        $devisCount = Devis::count();

        $data = [
            'clientsCount' => $clientsCount,
            'servicesCount' => $servicesCount,
            'devisCount' => $devisCount,
        ];

        return view('admins.index', compact('data'));
    }


    public function Services(){
        // $services = Service::latest()->with('category')->paginate(6);
        $categories = Category::all();

        $services= Service::latest()->with('category')->filter(request(['q', 'category']))->get();
        return view('service.All', compact('services','categories'));
    }

    public function clients()
{
    $clients = User::where('role', '!=', 'admin')
                    ->latest()
                    ->filter(request(['q']))
                    ->paginate(10);

    return view('clients.all', compact('clients'));
}


    public function create(){
        return view('clients.create');
    }

    public function store(Request $request){
        // dd($request);
        $payload = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'ice' => 'required|string|max:255',
            'ville' => 'nullable|string',
        ]);

        if ($image = $request->file('image')->store('users')) {
            $payload = array_merge($payload, [
                'image' => $image
            ]);

            $user = User::create($payload);

            if ($user) {
                session()->flash('success', 'User created successfully!');
            } else {
                session()->flash('error', 'Failed to create new user');
            }
        } else {

            session()->flash('error', 'Failed to upload image');
        }

        return redirect()->route('clients');
    }

    public function destroy(int $user)
    {
        $client = User::find($user);
        if ($client->delete()) {
            session()->flash('success', 'Client deleted successfully!');
        } else {
            session()->flash('error', 'Failed to delete client');
        }

        return redirect()->route('clients');
    }

    public function edit(int $user){
        $client = User::find($user);

        return view('clients.create', compact('client'));
    }

    public function update(Request $request, int $user){
        // dd($request);
        $client = User::find($user);
        $payload = $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'ice' => 'string|max:255',
            'ville' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('users');
            $payload = array_merge($payload, [
                'image' => $image
            ]);
        }

        $client->update($payload);

        return redirect()->route('clients');
    }
}
