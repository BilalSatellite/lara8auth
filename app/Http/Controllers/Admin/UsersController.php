<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Arr;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //desc and asc
       return view('panel.admin.users.index',['users' => User::orderBy('id','asc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::pluck('name','name')->all();
        // return view('panel.admin.user_create',compact('roles'));
        return view('panel.admin.users.create',['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $user = User::create([$request->except(['_token','roles']),
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password'])]
    );
        $user->roles()->sync($request->roles);
       
        return redirect(route('alluser.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        return view('panel.admin.users.show',['user' => User::findOrFail($id)]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('panel.admin.users.edit',[
            'roles' => Role::all(),
            'user'  => User::find($id)
            ]);
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
        $user = User::findOrFail($id);
        $user->update($request->except(['_token','roles']));
        $user->roles()->sync($request->roles);
        return redirect(route('alluser.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        User::destroy($id);
        return redirect(route('alluser.index'));
}
}