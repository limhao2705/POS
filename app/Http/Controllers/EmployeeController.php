<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index(){
        $users = User::get();
        return view('layouts.sidebar.Employees.employee', compact("users"));
    }
    public function showName(){
        $emps = User::get();
        return view('layouts.dashboard', compact("emps"));
    }
    public function edit(User $user){
        //dd($product);
        return view('layouts.sidebar.Employees.crud.edit', compact('user'));
    }
    public function delete(User $user) {
        $user->delete();
        return redirect(route('employee.main'))->with('status', 'The employee have been deleted successfully!');
    }
}
