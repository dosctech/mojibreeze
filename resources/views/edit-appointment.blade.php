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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
                            @csrf
                            @method('PUT') <div class="form-group">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $appointment->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $appointment->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="date" class="font-weight-bold">Date</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $appointment->date) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="appointment_time" class="font-weight-bold">Time</label>
                                <input type="time" name="appointment_time" id="appointment_time" class="form-control" value="{{ old('appointment_time', $appointment->appointment_time) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="pet_name" class="font-weight-bold">Pet's Name</label>
                                <input type="text" name="pet_name" id="pet_name" class="form-control" value="{{ old('pet_name', $appointment->pet_name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="pet_type" class="font-weight-bold">Pet's Type</label>
                                <select name="pet_type" id="pet_type" class="form-control" required>
                                    <option value="">Select Pet's Type</option>
                                    <option value="dog" {{ (old('pet_type', $appointment->pet_type) == 'dog') ? 'selected' : '' }}>Dog</option>
                                    <option value="cat" {{ (old('pet_type', $appointment->pet_type) == 'cat') ? 'selected' : '' }}>Cat</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="veterinarian" class="font-weight-bold">Veterinarian</label>
                                <select name="veterinarian" id="veterinarian" class="form-control" required>
                                    <option value="">Select Veterinarian</option>
                                    <option value="Dr. Tiger look" {{ (old('veterinarian', $appointment->veterinarian) == 'Dr. Tiger look') ? 'selected' : '' }}>Dr. Tiger look</option>
                                    <option value="Dr. Banana" {{ (old('veterinarian', $appointment->veterinarian) == 'Dr. Banana') ? 'selected' : '' }}>Dr. Banana</option>
                                    <option value="Dr. Dadz<" {{ (old('veterinarian', $appointment->veterinarian) == 'Dr. Dadz') ? 'selected' : '' }}>Dr. Dadz</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="concern" class="font-weight-bold">Appointment Concern</label>
                                <textarea name="concern" id="concern" class="form-control" required>{{ old('concern', $appointment->concern) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Update Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="picture">
        <img src="{{ asset('images/create.png') }}" style="width: 700px; height: 400px;">
    </div>
@endsection
