<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Category;
class ServiceController extends Controller
{
    public function create() {
        $categories = Category::all();
        return view('admins.createService', compact('categories'));
    }

    public function store(Request $request) {
        // dd($request);
        $validatedAttributes = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required',
            'categorie_id' => 'required|exists:categories,id',

        ]);

        // $imageName = time() . '.' . $request->image->extension();

        if ($imageName = $request->file('image')->store('service')) {


            $service = Service::create([
                'user_id' => auth()->id(),
                'categorie_id' => $validatedAttributes['categorie_id'],
                'name' => $validatedAttributes['name'],
                'description' => $validatedAttributes['description'],
                'price' => $validatedAttributes['price'],
                'image' => $imageName
            ]);
            // dd($service);

            if ($service) {
                session()->flash('success', 'service created successfully!');
            } else {
                session()->flash('error', 'Failed to create new service');
            }
        } else {

            dd('Failed to upload image');
            session()->flash('error', 'Failed to upload image');
        }

        return redirect()->route('Services');
    }
    public function delete(Service $service)
{
    if ($service->delete()) {
        session()->flash('success', 'Service deleted successfully!');
    } else {
        session()->flash('error', 'Failed to delete service');
    }

    return redirect()->route('Services');
}
public function edit($id) {
    $categories = Category::all();
    $service = Service::findOrFail($id);
    return view('admins.editService', compact('categories', 'service'));
}
public function update(Request $request, Service $service)
{
    $validatedAttributes = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'price' => 'required',
        'categorie_id' => 'required|exists:categories,id',
    ]);

    $service->name = $validatedAttributes['name'];
    $service->description = $validatedAttributes['description'];
    $service->price = $validatedAttributes['price'];
    $service->categorie_id = $validatedAttributes['categorie_id'];

    if ($request->hasFile('image')) {
        $imageName = $request->file('image')->store('service');
        $service->image = $imageName;
    }

    if ($service->save()) {
        session()->flash('success', 'Service updated successfully!');
    } else {
        session()->flash('error', 'Failed to update service');
    }

    return redirect()->route('Services');
}

}
