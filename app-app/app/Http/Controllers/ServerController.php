<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\NetworkEquipement;
use App\Models\Server;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servers=Server::paginate(6);
        $availableServers = Server::where('status', 'available in stock')->paginate(6);

        return view('server.servers',compact('servers','availableServers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('server.server-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData= $request->validate([
            'server_name' => 'required|string',
            'host_name' => 'required|string',
            'ip_address' => 'required|ip',
            'port' => 'required|numeric',
            'quantity' => 'required|numeric',
            'guarantee' => 'required|numeric',
            'status' => 'required'
        ]);


        $server = new Server();
        $server->server_name = $validatedData['server_name'];
        $server->host_name = $validatedData['host_name'];
        $server->ip_address = $validatedData['ip_address'];
        $server->port = $validatedData['port'];
        $server->quantity = $validatedData['quantity'];
        $server->guarantee = $validatedData['guarantee'];
        $server->status = $validatedData['status'];
        $server->save();


        return redirect()->route('servers')
        ->with('success', 'server created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Server $server)
    {
        return view('server.show-server',compact('server'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Server $server)
    {
        return view('server.edit-server',compact('server'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,Server $server)
    {
        $validatedData= $request->validate([
            'server_name' => 'required|string',
            'host_name' => 'required|string',
            'ip_address' => 'required|ip',
            'port' => 'required|numeric',
            'quantity' => 'required|numeric',
            'guarantee' => 'required|numeric',
            'status' => 'required'
        ]);
        $server->fill($validatedData)->save();



        return redirect()->route('servers')->with('success', 'Server updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Server $server)
    {
        $server->delete();
        return redirect()->route('servers')->with('success', 'Server deleted successfully');
    }
    public function nbrServers(){
        $servers = Server::all();
        $nbr=$servers->count();
        $nbrServerAvailable = Server::where('status', 'available in stock')->count();

        $laptops = Laptop::all();
        $nbrLaptop= Laptop::count();
        $nbrLaptopAvailable = Laptop::where('status', 'available in stock')->count();

        $networks=NetworkEquipement::all();
        $nbrNetwork=NetworkEquipement::count();
        $nbrNetworkAvailable = NetworkEquipement::where('status', 'available in stock')->count();

        return view('asset-type',compact('nbr','servers','nbrServerAvailable','laptops','nbrLaptop','nbrLaptopAvailable','networks','nbrNetwork','nbrNetworkAvailable'));;
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $servers = Server::where('server_name', 'like', "%$query%")->paginate(6);

        return view('server.servers', compact('servers'));
    }

}
