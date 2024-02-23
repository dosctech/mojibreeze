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
        return view ('admin.show_post',compact('appointments'));
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
}