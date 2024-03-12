<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show_post()
{
    $appointments = Appointment::all();
    $acceptedCount = $appointments->where('user_status', 'accepted')->count();
    $rejectedCount = $appointments->where('user_status', 'rejected')->count();
    $canceledCount = $appointments->where('user_status', 'canceled')->count();

    return view('admin.show_post', compact('appointments', 'acceptedCount', 'rejectedCount', 'canceledCount'));
}


    public function accept_post(Request $request)
    {
        $id = $request->input('appointment_id'); // Assuming the appointment ID is passed as 'appointment_id' from the form

        $appointment = Appointment::findOrFail($id);
        $appointment->user_status = 'accepted'; // Assuming there's a 'status' field in your Appointment model indicating the status of the appointment
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment accepted successfully.');
    }
    public function reject_post(Request $request)
    {
        $id = $request->input('appointment_id'); // Assuming the appointment ID is passed as 'appointment_id' from the form

        $appointment = Appointment::findOrFail($id);
        $appointment->user_status = 'rejected'; // Assuming there's a 'status' field in your Appointment model indicating the status of the appointment
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment rejected successfully.');
    }
    public function admin()
    {
        $appointments = Appointment::all();
        return view('admin.admin', compact('appointments'));

    }
    public function deleteAppointment(Request $request)
    {
        // Validate the request
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
        ]);

        // Find the appointment by ID
        $appointment = Appointment::findOrFail($request->appointment_id);

        // Delete the appointment
        $appointment->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Appointment deleted successfully.');
    }
   
}