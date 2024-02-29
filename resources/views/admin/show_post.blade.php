<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment List</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <style>
        body{
            
        }
        /* Basic CSS Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Container for appointment cards */
        .appointment-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        /* Individual appointment card */
        .appointment-card {
            width: 1200px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 20px;
        }

        /* Card header */
        .appointment-card .card-header {
            background-color: #FBA834;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        /* Card body */
        .appointment-card .card-body {
            padding: 15px;
        }

        /* Card footer */
        .appointment-card .card-footer {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Accept and Reject buttons */
        .appointment-card .btn-success,
        .appointment-card .btn-danger {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .appointment-card .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .appointment-card .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .appointment-card .btn-success:hover,
        .appointment-card .btn-danger:hover {
            background-color: darken(#c6e25e, 10%);
        }
        
        
        .navbar-brand {
        font-weight: bold;
        color: hsl(0, 0%, 20%);
        font-size: 34px; /* Increase the font size */
        letter-spacing: 1px; /* Add letter-spacing */
        text-decoration: none;
        display: flex; /* Use flexbox for alignment */
        align-items: center; /* Align items vertically */
        margin-left: 15%; 
        padding-top: 17px; /* Adjust vertical padding */
        }

        .navbar-brand img {
            margin-right: 5px; /* Add spacing between the image and text */
            width: 33px; /* Set the width of the image */
            height: auto; /* Maintain aspect ratio */
        }
        .total-appointments {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-top: 20px;
        margin-left: 15%; /* Adjust as needed */
    }
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
</head>
<body>
    <div class="container">
        
            <a class="navbar-brand" href="{{ url('/home') }}"><img src="{{ asset('images/arrow.png') }}">Admin Panel</a>
       
    </div>
    <p class="total-appointments">Total Appointments: {{ $appointments->count() }}</p>
    <div class="appointment-container">
        @foreach ($appointments as $appointment)
            <div class="appointment-card">
                <div class="card-header">
                    <h3>{{ $appointment->name }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $appointment->email }}</p>
                    <p><strong>Date:</strong> {{ $appointment->date }}</p>
                    <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>
                    <p><strong>Pet's Name:</strong> {{ $appointment->pet_name }}</p>
                    <p><strong>Pet's Type:</strong> {{ $appointment->pet_type }}</p>
                    <p><strong>Veterinarian:</strong> {{ $appointment->veterinarian }}</p>
                    <p><strong>Concern:</strong> {{ $appointment->concern }}</p>
                    <p><strong> {{ $appointment->user_status}}</p></strong>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.accept_post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                    <form action="{{ route('admin.reject_post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="picture">
        <img src="images/create.png" style="width: 700px; height: 400px;">
    </div>
</body>
</html>
