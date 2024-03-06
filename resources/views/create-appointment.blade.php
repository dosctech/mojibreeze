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

        /* Style for modal dialog */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Add custom style for invalid input */
        .is-invalid {
            border-color: red !important;
        }

        /* Add custom style for valid input */
        .is-valid {
            border-color: green !important;
        }
    </style>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Are you sure you want to create this appointment?</p>
            <button class="btn btn-primary" onclick="submitForm()">Yes</button>
            <button class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </div>
    </div>

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
                <form id="createAppointmentForm" method="POST" action="{{ route('appointments.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <!-- Other form fields -->
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
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
                            @for ($hour = $startHour; $hour < $endHour; $hour++)
                                @if ($hour !== 12) {{-- Skip 12 PM (lunch break) --}}
                                    @php
                                        $hourFormatted = str_pad($hour % 12 ?: 12, 2, '0', STR_PAD_LEFT); // Format hour (e.g., 08)
                                        $nextHourFormatted = str_pad(($hour + 1) % 12 ?: 12, 2, '0', STR_PAD_LEFT); // Format next hour
                                        $ampm = $hour < 12 ? 'AM' : 'PM'; // Determine AM/PM
                                        $nextAmpm = ($hour + 1) < 12 ? 'AM' : 'PM'; // Determine AM/PM for the next hour
                                    @endphp
                                    <option value="{{ $hourFormatted }}:00">{{ $hourFormatted }}:00 {{ $ampm }} - {{ $nextHourFormatted }}:00 {{ $nextAmpm }}</option>
                                @endif
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
                    

                    <button type="button" class="btn btn-primary btn-block" onclick="validateForm()">Create Appointment</button>
                </form>
            </div>
        </div>
    </div>

    <div class="picture">
        <img src="images/create.png" style="width: 700px; height: 400px;">
    </div>

    <script>
        // Function to open the modal
        function openModal() {
            var modal = document.getElementById('confirmationModal');
            modal.style.display = 'block';
        }

        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById('confirmationModal');
            modal.style.display = 'none';
        }

        // Function to submit the form
        function submitForm() {
            document.getElementById('createAppointmentForm').submit();
        }

        // Function to validate form fields
        function validateForm() {
            var inputs = document.querySelectorAll('input, select, textarea');
            var isValid = true;

            inputs.forEach(function(input) {
                if (!input.value) {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                }
            });

            if (isValid) {
                openModal();
            }
        }
    </script>
@endsection
