<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Liste des champs : id, num, lib
     */
    protected $rules = [
        'id'=>'integer|required',
        'civilite'=>'integer|required',
        'nom'=>'string|required',
        'prenom'=>'string|required',
        'email'=>'string|required',
        'login'=>'string|required|unique',
        'password'=>'string|required',
        'role_id'=>'integer',
    ];

    /**
     * Display a listing of the resource.
     * @param Request $request filters
     * @return array users
     */
    public function index(Request $request)
    {
        $users = User::orderBy('lib');

        if ($request->has('lib')) {
            $users->where('lib', 'like', '%'.$request->lib.'%');
        }

        return view('user.index')->with(['users'=>$users->simplePaginate(50)]);
    }

    /**
     * Display the specified resource
     * @param  integer  $id User.id
     * @return array user
     */
    public function show($id)
    {
        $user = self::getUser($id);
        return view('user.show')->with(['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id User.id
     * @return array users
     */
    public function edit($id)
    {
        $user = self::getUser($id);
        return view('user.edit')->with(['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource
     * @return User
     */
    public function create()
    {
        $user=new User();
        return view('user.create')->with(['user'=>$user]);
    }

    /**
     * delete users
     * @param integer $id User.id
     * @return array users
     */
    public function delete($id)
    {
        self::destroy($id);
    }

    /**
     * retrieve a user instance
     * @param  integer $id User.id
     * @return User
     */
    public function getUser($id) {
        return User::findOrFail($id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request user.id
     * @throws exceptions
     * @return User
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        User::Create($request->all());
        return redirect('/user');
    }

    /**
     * Update the specified resource in storage.
     * @param  integer $id User.id
     * @param  \Illuminate\Http\Request $request User.id
     * @throws exceptions
     * @return User
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);
        $user = $this->getUser($id);
        $user->update($request->all());
        $user->save();
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     * @param   integer $id User.id
     * @return  none
     * @throws  exceptions
     */
    public function destroy($id)
    {
        $user = $this->getUser($id)->delete();
        return redirect('/user');
    }


}

