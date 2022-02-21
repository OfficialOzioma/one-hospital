<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type == '0') {
                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $doctors = Doctor::all();
        return view('user.home', compact('doctors'));
    }

    public function myappointment()
    {

        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $number = 0;
            $getAppointment = Appointment::where('user_id', $user_id)->get();
            return view('user.my_appointment', compact('getAppointment', 'number'));
        } else {
            return redirect()->back();
        }
    }

    public function delete_appointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        $appointment->delete();

        return redirect()->back()->with('message', 'Appointment deleted succussful');
    }
}