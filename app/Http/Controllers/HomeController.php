<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index', 'employeehome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function employeehome()
    {
        $employees = auth()->user()->all();
        return view('employeedashboard')->with('employees', $employees);
    }

    public function adminhome()
    {
        return view('adminhome');
    }
    public function admindashboard()
    {
        $employees = auth()->user()->all();
        return view('admindashboard')->with('employees', $employees);
    }
    public function adminadduser()
    {
        return view('adminadduser');
    }

    public function adminstoruser(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
            'role' => ['required'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);//  Crypt::decryptString($encryptedString) Crypt::encryptString
        $user->role = $request->role;

        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'employee has been added successfully');
    }

    public function adminedituser($id)
    {
        $employee = User::findOrFail($id);
        return view('adminedituser')->with('employee', $employee);

    }

    public function adminupdateuser(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        $request->validate([
            'name' => ['required'],
            'email' => "required|email|unique:users,email,$id",
            'password' => ['required', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
            'role' => ['required'],
        ]);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);
        $employee->role = $request->role;

        $employee->save();

        return redirect()->route('admin.dashboard')->with('success', 'employee has been updated successfully');
    }

    public function admindeleteuser($id)
    {

        $employee = User::findOrFail($id);

        $employee->delete();


        return redirect()->route('admin.dashboard')->with('success', 'employee has been deleted successfully');
    }
}
