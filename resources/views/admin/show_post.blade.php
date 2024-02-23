<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment List</title>
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
            width: 300px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Card header */
        .appointment-card .card-header {
            background-color: #007bff;
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
            background-color: darken(#007bff, 10%);
        }
    </style>
</head>
<body>
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
</body>
</html>
