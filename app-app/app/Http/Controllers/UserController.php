<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role','user')->paginate(6);
        return view('users.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name=$request->input('name');
        $prenom=$request->input('prenom');
        $role=$request->input('role');
        $email=$request->input('email');
        $phone_number=$request->input('phone_number');
        $password=Hash::make($request->input('password'));

        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number'=>'required|max:12',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' =>$name,
            'prenom'=>$prenom,
            'role'=>$role,
            'email'=>$email,
            'phone_number'=>$phone_number,
            'password'=>$password
        ]);
        return redirect('/login')
        ->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:255',
        ]);
        $user = User::findOrFail($id);
        $user->update($validatedData);




        return redirect()->route('index')->with('success', 'user updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('index')->with('success', 'user deleted successfully.');

    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%$query%")
        ->where('role', 'user')
        ->paginate(6);
        return view('users.users', compact('users'));
    }
}
