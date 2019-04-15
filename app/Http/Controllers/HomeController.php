<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{

    public function __construct(User $user)    {
        $this->middleware('auth');
        $this->user = $user;
    }
 
    public function index()    {
        $user = $this->user->all();
        return view('home', compact('user'));
    }
    

    public function store (Request $request)
    {
        $dados = $this->user->create($request->all());

        return view('home');
    }

    public function delete ($id) {

        $user = $this->user->find($id);

        $delete = $user->delete();
        if($delete) {
            return redirect()->route('home')
                   ->with('success','User deleted');
        } else {
            return redirect()->route('home')
                   ->with('error','Error');
        }
    }

    public function edit ($id) {
        $userid = $this->user->find($id);

        return view('edit', compact('userid'));


    }

    public function update(Request $request, $id) {
        $id = $this->user->find($id);

        $id->name = $request->get('name');
        $id->email = $request->get('email');
        

        $id->save();

        return redirect()->route('home');
    }

}
