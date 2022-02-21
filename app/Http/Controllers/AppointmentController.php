<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function book_appointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|string|email',
            'doctor_name' => 'required|string',
            'date' => 'required',
            'message' => 'required|string',
        ]);

        $appointment = new Appointment();

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->doctor_name = $request->doctor_name;
        $appointment->date = $request->date;
        $appointment->message = $request->message;
        $appointment->status = "In progress";

        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();

        return redirect()->back()->with('message', 'Appointment request was succussful, We will contact you soon');
    }

    public function showAppointment()
    {
        $appointments = Appointment::orderBy("id")->get();
        $number = 1;
        return view('admin.appointment.show', compact('appointments', 'number'));
    }

    public function approve_appointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        $appointment->status = 'Approved';
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment Approved succussful');
    }

    public function cancel_appointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        $appointment->status = 'Cancelled';
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment cancelled succussful');
    }
}