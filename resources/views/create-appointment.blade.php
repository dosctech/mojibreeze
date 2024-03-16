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
        .form-control { 
            border-radius: 10px; /* Rounded corners */
            padding: 8px 12px;  /* Add some internal spacing */
            border: 1px solid #ccc; /* Subtle border */
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
        } 
        .form-control:hover {
            background-color: #f5f5f5; /* Light background change on hover */
            cursor: pointer; /* Indicate that it's clickable */
        }
        .form-control:focus {
            outline: none; /* Remove default dotted outline */
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3); /* Stronger shadow on focus */
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
                        <input type="date" name="date" id="date" class="form-control" required onchange="updateAppointmentTimes()">
                    </div>
                    <div class="form-group">
                        <label for="appointment_time" class="font-weight-bold">Time</label>
                        <select name="appointment_time" id="appointment_time" class="form-control" required>
                            <option value="">Select Time</option>
                            @php
                                // Define your time range and interval
                                $start = strtotime('08:00 AM');
                                $end = strtotime('05:00 PM');
                                $interval = 60 * 60; // 1 hour interval
                    
                                // Generate time options
                                for ($time = $start; $time < $end; $time += $interval) {
                                    $time_format = date('h:i A', $time);
                                    $next_time = date('h:i A', $time + $interval);
                    
                                    // Skip generating option for 12:00 PM - 01:00 PM slot
                                    if ($time_format === '12:00 PM' && $next_time === '01:00 PM') {
                                        continue;
                                    }
                    
                                    echo '<option value="' . $time_format . ' - ' . $next_time . '">' . $time_format . ' - ' . $next_time . '</option>';
                                }
                            @endphp
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
                            <option value="cat">Rabbit</option>
                            <option value="cat">Bird</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="veterinarian" class="font-weight-bold">Veterinarian</label>
                        <select name="veterinarian" id="veterinarian" class="form-control" required>
                            <option value="">Select Veterinarian</option>
                            <option value="Dr. Tiger Look - Veterinary">Dr. Tiger Look - Veterinary</option>
                            <option value="Dr. Banana - Groomer">Dr. Banana - Groomer </option>
                            
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
    <script>
        // Function to generate time options for the dropdown
        function generateTimeOptions() {
            const timeSelect = document.getElementById('appointment_time');
            timeSelect.innerHTML = '<option value="">Select Time</option>'; // Reset options
    
            const timeSlots = [
                { start: '08:00:00', end: '09:00:00' },
                { start: '09:00:00', end: '10:00:00' },
                { start: '10:00:00', end: '11:00:00' },
                { start: '11:00:00', end: '12:00:00' },
                { start: '13:00:00', end: '14:00:00' },
                { start: '14:00:00', end: '15:00:00' },
                { start: '15:00:00', end: '16:00:00' },
                { start: '16:00:00', end: '17:00:00' }
            ];
    
            timeSlots.forEach(slot => {
                const option = document.createElement('option');
                option.value = slot.start;
                option.text = `${formatTime(slot.start)} - ${formatTime(slot.end)}`;
                timeSelect.add(option);
            });
        }
    
        // Function to format time (e.g., 08:00:00 to 08:00 AM)
        function formatTime(timeString) {
            const time = new Date(`2000-01-01T${timeString}`); // Dummy date for formatting
            return time.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
        }
    
        // Call the function to generate time options initially
        generateTimeOptions();
    </script>
    
@endsection