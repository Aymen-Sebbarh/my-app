<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laptops=Laptop::paginate(6);
        $availableLaptops = Laptop::where('status', 'available in stock')->paginate(6);


        return view('laptop.laptops',compact('laptops','availableLaptops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laptop.laptop-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'laptop_name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'screen_size' => 'required|string|max:255',
            'graphics_card' => 'required|string|max:255',
            'battery_life' => 'required|string|max:255',
            'guarantee' => 'required|numeric',
            'status' => 'required'
        ]);
        $laptop = new Laptop();
        $laptop->laptop_name = $request->laptop_name;
        $laptop->model = $request->model;
        $laptop->processor = $request->processor;
        $laptop->ram = $request->ram;
        $laptop->storage = $request->storage;
        $laptop->quantity = $request->quantity;
        $laptop->screen_size = $request->screen_size;
        $laptop->graphics_card = $request->graphics_card;
        $laptop->battery_life = $request->battery_life;
        $laptop->guarantee = $request->guarantee;
        $laptop->status = $request->status;

        $laptop->save();
        return redirect()->route('laptops')
        ->with('success', 'laptop created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Laptop $laptop)
    {
        return view('laptop.show', compact('laptop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laptop $laptop)
    {
        return view('laptop.edit-laptop',compact('laptop'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Laptop $laptop)
    {
        $validatedData=$request->validate([
            'laptop_name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'screen_size' => 'required|string|max:255',
            'graphics_card' => 'required|string|max:255',
            'battery_life' => 'required|string|max:255',
            'guarantee' => 'required|numeric',
            'status' => 'required'
        ]);
        $laptop->fill($validatedData)->save();
        return redirect()->route('laptops')->with('success', 'laptop updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laptop $laptop)
    {
        $laptop->delete();
        return redirect()->route('laptops')->with('success', 'laptop deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $laptops = Laptop::where('laptop_name', 'like', "%$query%")->paginate(6);

        return view('laptop.laptops', compact('laptops'));
    }

}
