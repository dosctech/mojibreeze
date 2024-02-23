<?php


// app/Http/Controllers/AppointmentController.php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('create-appointment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'concern' => 'required|string',
            'veterinarian' => 'required|string|max:255',
        ]);

        Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'appointment_time' => $request->appointment_time,
            'pet_name' => $request->pet_name,
            'pet_type' => $request->pet_type,
            'concern' => $request->concern,
            'veterinarian' => $request->veterinarian,
        ]);

        return redirect()->route('home')->with('success', 'Appointment created successfully!');
    }

    public function index()
    {
        $appointments = Appointment::latest()->get();
        return view('home', compact('appointments'));
    }

   

    public function edit($id)
    {
        // Add an edit method for updating appointments
        $appointment = Appointment::find($id);
        return view('edit-appointment', compact('appointment')); // Assuming a view for editing
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->update($request->all());

        return redirect('/appointment')->with('message', 'Student data updated');
    }

    public function destroy($id)
    {
        Appointment::destroy($id);
        return redirect()->route('home')->with('success', 'Appointment deleted successfully.');
    }
}


