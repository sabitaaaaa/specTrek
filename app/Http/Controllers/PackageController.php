<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Package;
class PackageController extends Controller
{

// Show form
public function create()
{
    return view('admin.packages.create');
}
public function index()
{
    $packages = Package::all();
    return view('admin.packages.index', compact('packages'));
}
// Store new package
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
    ]);

    Package::create([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    return redirect()->route('packages.index')->with('success', 'Package created successfully.');
}
}














