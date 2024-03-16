<?php


// app/Http/Controllers/AppointmentController.php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply auth middleware to all methods in this controller
    }
    
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
            'appointment_time' => 'required',
            'pet_name' => 'required|string',
            'pet_type' => 'required|string',
            'veterinarian' => 'required|string',
            'concern' => 'required|string',

        ]);
        

        $existingAppointments = Appointment::whereDate('date', $validatedData['date'])
        ->where('appointment_time', $validatedData['appointment_time'])
        ->exists();

        if ($existingAppointments) {
            return redirect()->back()->with('error', 'The selected appointment time is already booked. Please choose another time.');
        }
            // Associate the appointment with the authenticated user
        $validatedData['user_id'] = Auth::id();
    
        // Create a new appointment
        Appointment::create($validatedData);
    
        \Session::flash('success', 'Appointment created successfully.');
    
        // Redirect back
        return redirect()->route('appointments.index');
    }


        public function index()
        {
            $user = Auth::user(); // Get the authenticated user
            $appointments = $user->appointments()->latest()->get(); // Assuming appointments are related to users
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
        $appointment = Appointment::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'appointment_time' => 'required', // Ensuring appointment time is selected
            'pet_name' => 'required|string',
            'pet_type' => 'required|string',
            'veterinarian' => 'required|string',
            'concern' => 'required|string',
            'user_status' => 'required|in:pending,accepted,rejected,canceled',
        ]);
    
        // Check if the selected appointment time is already booked
        $existingAppointment = Appointment::where('date', $request->date)
                                            ->where('appointment_time', $request->appointment_time)
                                            ->where('id', '!=', $id) // Exclude the current appointment being updated
                                            ->exists();
        if ($existingAppointment) {
            return redirect()->back()->with('error', 'This appointment time is already booked. Please select a different time.');
        }
    
        $appointment->update($request->all());
    
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }
    

    public function updateCancel(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        
        // Validate the request
        $request->validate([
            
            'user_status' => 'required|in:pending,accepted,rejected,canceled', // Only accept these values
        ]);

        // Update the user status
        $appointment->update([
            'user_status' => $request->user_status,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }
    public function destroy($id)
    {
        Appointment::destroy($id);
        return redirect()->route('home')->with('success', 'Appointment deleted successfully.');
    }
    public function getAppointments($date) {
        $existingAppointments = \App\Models\Appointment::whereDate('date', $date)->pluck('appointment_time')->toArray();
        return response()->json(['appointments' => $existingAppointments]);
    }
    
}


