<?php

namespace App\Http\Controllers;

use Auth;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
	{
		if(Auth::user()->rank == 0) {
			return view('errors.401');
		}
		else {
			$users = Users::all();
			return view('admin_panel.index', compact('users'));
		}
		
	}
	
	public function show($user)
	{
		if(Auth::user()->rank == 0) {
			return view('errors.401');
		}
		else {
			$user = Users::where('id', $user)->get();
			
			return view('admin_panel.edit', compact('user'));
		}
	}
	
	public function update(Request $request, $user) {
		if(Auth::user()->rank < 2) {
			return view('errors.401');
		}
		else {
			$user = Users::find($user);
			$user->update($request->all());
			
			return back();
		}
	}
	
	public function delete(Request $request, $user) {
		if(Auth::user()->rank < 3) {
			return view('errors.401');
		} 
		else {
			$user = Users::find($user);
			$user->delete($request->all());
			
			return redirect()->to('aPanel');
		}
	}
}
