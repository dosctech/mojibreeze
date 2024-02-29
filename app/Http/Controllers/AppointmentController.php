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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'pet_name' => 'required|string',
            'pet_type' => 'required|string',
            'veterinarian' => 'required|string',
            'concern' => 'required|string',
        ]);


        
        // Check if the chosen date and time are available
        $existingAppointment = Appointment::where('date', $validatedData['date'])
            ->where('appointment_time', $validatedData['appointment_time'])
            ->exists();

        if ($existingAppointment) {
            return back()->with('error', 'The selected date and time are not available. Please choose a different date and time.');
        }

        // Create a new appointment
        Appointment::create($validatedData);

        \Session::flash('success', 'Appointment created successfully.');

    // Redirect back
        return redirect()->route('appointments.index');
    
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


