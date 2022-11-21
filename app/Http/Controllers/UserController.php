<?php

namespace App\Http\Controllers;

//use App\Models\Role;
use App\Models\Warehouse;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $users = User::whereHas('roles', function($query){
//            $query->where('name', 'user');
//        })->with(['warehouse', 'roles'])->get();
        if(!auth()->user()->hasRole('admin')){
            return redirect()->route('dashboard')->with('error','You do not have permissions to do that');
        }
        $users = User::whereHas('roles')->with(['warehouse', 'roles'])->get();


        return Inertia::render('Users/Index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::get(['id', 'name']);
        $warehouses = Warehouse::all();
        return Inertia::render('Users/Create', compact('roles', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'warehouse_id' =>  'required',
            'name'   =>   'required',
            'email'     =>  'required',
            'password'  =>  'required',
        ]);

        $role = Role::find($request->role);
        $user = User::create([
            'warehouse_id' =>  $request->warehouse_id,
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  Hash::make($request->password),
        ]);


        $user->assignRole($role);

        return redirect()->route('users')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return Inertia::render('Users/Show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(['id', 'name']);
        $userRoles = $user->roles->pluck('id')->toArray();

        return Inertia::render('Users/Edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        if($request->password !== null){
            $user->update(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
        }else{
            $user->update(['name' => $request->name, 'email' => $request->email]);
        }

        $user->syncRoles($request->input('roles'));

        return redirect()->route('users')->with('success','User details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'User updated succssfully.');
    }
}
