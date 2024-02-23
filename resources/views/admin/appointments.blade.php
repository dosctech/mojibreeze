@extends('appointment.app')

@section('content')
   
        <div class="row">
            @foreach ($appointments as $appointment)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $appointment->name }}</b></h5>
                            <p class="card-text"><b>Email:</b> {{ $appointment->email }}</p>
                            <p class="card-text">Date: {{ $appointment->date }}</p>
                            <p class="card-text">Time: {{ $appointment->appointment_time }}</p>
                            <p class="card-text">Pet's Name: {{ $appointment->pet_name }}</p>
                            <p class="card-text">Pet's Type: {{ $appointment->pet_type }}</p>
                            <p class="card-text">Veterinarian: {{ $appointment->veterinarian }}</p>
                            <p class="card-text">Concern: {{ $appointment->concern }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('appointment.edit', $appointment) }}" class="btn btn-success">Edit Appointment</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
