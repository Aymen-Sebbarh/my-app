<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\NetworkEquipement;
use App\Models\Server;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function useServer(Request $request, $id)
    {
        $user_id = $request->input('user_id');


        $server = Server::findOrFail($id);


        $server->decrement('quantity', 1);

        if ($server->quantity === 0) {
            $server->status = 'not available';
            $server->save();
        }

        // affectation
        $server->users()->attach($user_id);
        // Set a session variable to indicate that the button should be hidden
        $request->session()->put('hide_use_button_' . $id, true);


        return redirect()->back()->with('success', 'server has been associated with the user.');




    }
    public function useLaptop(Request $request, $id)
    {
        $user_id = $request->input('user_id');


        $laptop = Laptop::findOrFail($id);


        $laptop->decrement('quantity', 1);

        if ($laptop->quantity === 0) {
            $laptop->status = 'not available';
            $laptop->save();
        }

        // affectation
        $laptop->users()->attach($user_id);
        // Set a session variable to indicate that the button should be hidden
        $request->session()->put('hide_use_button_' . $id, true);

        return redirect()->back()->with('success', 'laptop has been associated with the user.');
    }
    public function useNetwork(Request $request, $id)
    {
        $user_id = $request->input('user_id');


        $network = NetworkEquipement::findOrFail($id);


        $network->decrement('quantity', 1);

        if ($network->quantity === 0) {
            $network->status = 'not available';
            $network->save();
        }

        // affectation
        $network->users()->attach($user_id);
        // Set a session variable to indicate that the button should be hidden
        $request->session()->put('hide_use_button_' . $id, true);

        return redirect()->back()->with('success', 'network equipment has been associated with the user.');
    }
    public function yourProduct(){
        $user_id=Auth::user()->id;


        //server:
        $serverData = DB::table('server_user')
        ->where('user_id', $user_id)
        ->join('servers', 'server_user.server_id', '=', 'servers.id')
        ->select('servers.*')
        ->get();


        //laptop:
        $laptopData = DB::table('laptop_user')
        ->where('user_id', $user_id)
        ->join('laptops', 'laptop_user.laptop_id', '=', 'laptops.id')
        ->select('laptops.*')
        ->get();
        //network::
        $networkData = DB::table('network_equipement_user')
        ->where('user_id', $user_id)
        ->join('network_equipments', 'network_equipement_user.network_equipement_id', '=', 'network_equipments.id')
        ->select('network_equipments.*')
        ->get();
        return view('your-product', compact( 'serverData','laptopData','networkData'));

    }
    public function filter(Request $request){
        $user_id=Auth::user()->id;


        $serverData = [];
        $laptopData = [];
        $networkData = [];
    $assetType = $request->get('assetType');
    switch ($assetType) {
        case 'server':
            $serverData = DB::table('server_user')
            ->where('user_id', $user_id)
            ->join('servers', 'server_user.server_id', '=', 'servers.id')
            ->select('servers.*')
            ->get();
                    break;
        case 'laptop':
            $laptopData = DB::table('laptop_user')
            ->where('user_id', $user_id)
            ->join('laptops', 'laptop_user.laptop_id', '=', 'laptops.id')
            ->select('laptops.*')
            ->get();
                    break;
        case 'network equipment':
            $networkData = DB::table('network_equipement_user')
            ->where('user_id', $user_id)
            ->join('network_equipments', 'network_equipement_user.network_equipement_id', '=', 'network_equipments.id')
            ->select('network_equipments.*')
            ->get();
                    break;

    }
    return view('your-product', compact( 'serverData','laptopData','networkData'));
}
}

