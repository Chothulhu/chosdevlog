<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Game;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    
    public function Index(){
        return view('admin.admin_login');
    }

    public function Dashboard(){
        return view('admin.index');
    }

    public function Login(Request $request){
        //The dd method dumps the collection's items and ends execution of the script:
        //dd($request->all()); //u ovom slucaju je to token kao i login informacije prosledjene kroz request

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin.dashboard')->with('success', 'Admin Login Successfully');
        }else{
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('error', 'Admin Logout Successfully');
    }

    public function AdminRegister(){
        return view('admin.manage.managers');
    }

    public function AdminRegisterCreate(Request $request){
        
        //dd($request->all());

        $admin = new Admin([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'status' => 'manager'
        ]);

        $admin->save();
        
        return redirect()->back();
        
    }

    // Return AdminDashboard Routes

    public function ManageManagers(){
        $admins = Admin::all();
        return view('admin.manage.managers', compact('admins'));
    }

    public function ManageComments(){
        return view('admin.manage.comments');
    }

    public function ManageUsers(){
        $users = User::all();
        return view('admin.manage.users', compact('users'));
    }

    public function ManageGames(){
        $games = Game::all()->toArray();
        return view('admin.manage.games', compact('games'));
    }

    public function ManageGenres(){
        return view('admin.manage.genres');
    }

    // End AdminDashboard Routes

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Admin::find($id);
        $admin->delete();
        return redirect()->back();
    }
}
