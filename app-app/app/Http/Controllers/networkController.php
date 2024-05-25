<?php

namespace App\Http\Controllers;

use App\Models\NetworkEquipement;
use Illuminate\Http\Request;

class networkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $networks=NetworkEquipement::paginate(6);
        $availableNetworks = NetworkEquipement::where('status','available in stock')->paginate(6);

        return view('network-equipment.network-equipment',compact('networks','availableNetworks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('network-equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'device_Name' => 'required|string|max:255',
            'Model' => 'required|string|max:255',
            'Manufacturer' => 'required|string|max:255',
            'number_ports' => 'required|integer|min:1',
            'security_Features' => 'required|string',
            'Management_Interface' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'guarantee' => 'required',
            'status' => 'required'
        ]);

        NetworkEquipement::create($validatedData);
        return redirect()->route('network-equipment')->with('success', 'Network Equipment added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(NetworkEquipement $network)
    {
        return view('network-equipment.show',compact('network'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NetworkEquipement $network)
    {
        return view('network-equipment.edit',compact('network'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $validatedData = $request->validate([
        'device_Name' => 'required|string|max:255',
        'Model' => 'required|string|max:255',
        'Manufacturer' => 'required|string|max:255',
        'number_ports' => 'required|integer|min:1',
        'security_Features' => 'required|string',
        'Management_Interface' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'guarantee' => 'required',
        'status' => 'required'
    ]);

    $network = NetworkEquipement::findOrFail($id);

    $network->update($validatedData);

    return redirect()->route('network-equipment')->with('success', 'Network Equipment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $network = NetworkEquipement::findOrFail($id);

        $network->delete();

        return redirect()->route('network-equipment')->with('success', 'Network Equipment deleted successfully');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $networks = NetworkEquipement::where('device_Name', 'like', "%$query%")->paginate(6);

        return view('network-equipment.network-equipment', compact('networks'));
    }
}
