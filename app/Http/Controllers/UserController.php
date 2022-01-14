<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Models\Grupo;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('onlyuser', ['only' => ['index']]);
    }
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.home');
    }

    public function store(UserCreateRequest $request)
    {
        /* $request->validate([
            'name' => 'required|min:3|max:15|regex:/^[a-zA-Z\s]+$/u',
            'username' => 'required|unique:users|min:3|max:15|',
            'email' => 'required|email|unique:users',
            'tipo' => 'required|in:1,2',
            'password' => 'required',
        ]); */

        User::create($request->only('name', 'username', 'email', 'tipo')
            + [
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }
    public function show($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(UserEditRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $data = $request->only('name', 'username', 'email', 'tipo');
        if (trim($request->password) == '') {
            $data=$request->except('password');
        }
        else{
            $data =$request->all();
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);
        /* return redirect()->back(); */
        return redirect()->route('users.index')->with('success','Usuario actualizado correctamente');
    }
    function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuario eliminado');
    }
}
