@extends('appointment.app')

@section('content')
    <style>
    .picture {
            position: fixed;
            bottom: 0;
            right: 0;
            margin: 20px;
            width: 680px; /* Adjust width as needed */
            height: 380px; /* Adjust height as needed */
            z-index: -1;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
                    <div class="card-body">
                        @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        <form method="POST" action="{{ route('appointments.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="date" class="font-weight-bold">Date</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="appointment_time" class="font-weight-bold">Time</label>
                                <select name="appointment_time" id="appointment_time" class="form-control" required>
                                    <option value="">Select Time</option>
                                    @php
                                        $startHour = 8; // Start hour (e.g., 8 AM)
                                        $endHour = 17; // End hour (e.g., 5 PM)
                                    @endphp
                                    @for ($hour = $startHour; $hour <= $endHour; $hour++)
                                        @php
                                            $hourFormatted = str_pad($hour % 12 ?: 12, 2, '0', STR_PAD_LEFT); // Format hour (e.g., 08)
                                            $ampm = $hour < 12 ? 'AM' : 'PM'; // Determine AM/PM
                                        @endphp
                                        <option value="{{ $hourFormatted }}:00">{{ $hourFormatted }}:00 {{ $ampm }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pet_name" class="font-weight-bold">Pet's Name</label>
                                <input type="text" name="pet_name" id="pet_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="pet_type" class="font-weight-bold">Pet's Type</label>
                                <select name="pet_type" id="pet_type" class="form-control" required>
                                    <option value="">Select Pet's Type</option>
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="veterinarian" class="font-weight-bold">Veterinarian</label>
                                <select name="veterinarian" id="veterinarian" class="form-control" required>
                                    <option value="">Select Veterinarian</option>
                                    <option value="Dr. Tiger Look - Veterinary">Dr. Tiger Look - Veterinary</option>
                                    <option value="Dr. Banana - Groomer">Dr. Banana - Groomer </option>
                                    <option value="Dr. Dadz - Boldstar">Dr. Dadz - Boldstar</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="concern" class="font-weight-bold">Appointment Concern</label>
                                <textarea name="concern" id="concern" class="form-control" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block">Create Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="picture">
        <img src="images/create.png" style="width: 700px; height: 400px;">
    </div>
@endsection
