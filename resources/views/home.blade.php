@extends('appointment.app')

@section('content')
    <style>
        .btn-yellow {
            background-color: #F3B95F;
            color: black; /* Ensure text is readable on the yellow background */
            border-radius: 15px;
            border: 2px solid black; /* Define border */
            /* Add any other necessary styles */
        }
        .btn-gray {
            background-color: gray;
            color: white; /* Ensure text is readable on the gray background */
            /* Add any other necessary styles */
            border-radius: 15px;
        }
        /* Adjust card body styles */
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%; /* Ensure card body takes full height */
            border-radius: 15px;
            
        }
        .btn-green {
            background-color: rgb(99, 158, 84);
            color: black; /* Ensure text is readable on the yellow background */
            /* Add any other necessary styles */
            border-radius: 15px;
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
    <div class="container">
        
        <a href="{{ route('create-appointment') }}" class="btn btn-yellow mb-3">Create Appointment</a>

        <div class="row">
            @foreach ($appointments as $appointment)
            <div class="col-lg-12 col-md-6 mb-5">
                <div class="card h-100" style="border-radius: 15px; border: 2px solid rgba(97, 97, 97, 0.527);">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $appointment->name }}</b></h5>
                            <p class="card-text"><b>Email:</b> {{ $appointment->email }} | 
                                <b>Date:</b>  {{ $appointment->date }} | 
                                    <b>Time:</b>  {{ $appointment->appointment_time }} | 
                                        <b>Pet's Name:</b>  {{ $appointment->pet_name }} | 
                                            <b> Pet's Type:</b>  {{ $appointment->pet_type }} | 
                                                <b>Veterinarian:</b>  {{ $appointment->veterinarian }} |
                                                    <b>Concern: </b> {{ $appointment->concern }} 
                            </p>

                            <p><strong> {{ $appointment->user_status}}</p></strong>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-gray">Cancel</button>
                            </form>
                            <a href="{{ route('appointment.edit', $appointment) }}" class="btn btn-green">Edit Appointment</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="picture">
        <img src="images/create.png" style="width: 700px; height: 400px;">
    </div>
@endsection
