<?php

// app/Http/Controllers/Api/AppointmentApiController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $appointments = Appointment::query();

        // Filter by name, email, date, etc. if needed
        if ($request->has('name')) {
            $appointments->where('name', 'like', '%' . $request->name . '%');
        }

        // Add other filters based on request parameters

        $appointments = $appointments->get();

        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'concern' => 'required|string',
            'veterinarian' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $appointment = Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'appointment_time' => $request->appointment_time,
            'pet_name' => $request->pet_name,
            'pet_type' => $request->pet_type,
            'concern' => $request->concern,
            'veterinarian' => $request->veterinarian,
        ]);

        return response()->json($appointment, 201);
    }

    public function show($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json('Appointment not found', 404);
        }

        return response()->json($appointment);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json('Appointment not found', 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'email',
            'date' => 'date',
            'appointment_time' => 'date_format:H:i',
            'pet_name' => 'string|max:255',
            'pet_type' => 'string|max:255',
            'concern' => 'string',
            'veterinarian' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $appointment->update($request->all());

        return response()->json($appointment);
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json('Appointment not found', 404);
        }

        $appointment->delete();

        return response()->json('Appointment deleted successfully', 204);
    }
}
