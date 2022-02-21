<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class adminController extends Controller
{
    public function doctor()
    {
        return view('admin.doctor.add_doctor');
    }

    public function add_doctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'phone' => 'required|string|unique:doctors|max:11',
            'speciality' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($request->hasfile('image')) {
            $doctor = new Doctor;
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/doctors');
            $image->move($destinationPath, $imageName);

            $doctor->name = $request->name;
            $doctor->phone = $request->phone;
            $doctor->speciality = $request->speciality;
            $doctor->image = $imageName;

            $doctor->save();

            return redirect()->back()->with('message', 'Doctor added successfully');
        } else {
            return 404;
        }
    }

    public function show_doctors()
    {
        $doctors = Doctor::orderBy("id")->get();
        $number = 1;
        return view('admin.doctor.view', compact('doctors', 'number'));
    }

    public function edit_doctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        return view('admin.doctor.edit', compact('doctor'));
    }

    public function update_doctor(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'phone' => 'required|string|max:11',
            'speciality' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $doctor = Doctor::find($id);

        if ($request->hasfile('image')) {
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/doctors');
            $image->move($destinationPath, $imageName);

            $doctor->image = $imageName;
        }

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor upated successfully');
    }

    public function email_view($id)
    {
        $appointment = Appointment::find($id);
        return view('admin.email', compact('appointment'));
    }

    public function send_email(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'greeting' => $request->greeting,
        ];

        Notification::send($appointment, new SendEmailNotification($details));
        return redirect()->back()->with('message', 'Email sent successfully');
    }

    public function delete_doctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->back()->with('message', 'Doctor deleted succussful');
    }
}