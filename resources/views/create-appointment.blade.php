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
                                <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
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
                                    <option value="vet1">Dr. Tiger Look</option>
                                    <option value="vet2">Dr. Banana </option>
                                    <option value="vet3">Dr. Dadz</option>
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
