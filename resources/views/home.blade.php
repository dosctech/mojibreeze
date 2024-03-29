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
        border: 2px solid transparent; /* Set default border color */
    }

    .btn-green {
        background-color: transparent;
        border: 2px solid green; /* Set border color to green */
        color: black; /* Ensure text is readable on the yellow background */
        /* Add any other necessary styles */
        border-radius: 15px;
    }

    .btn-red {
        background-color: transparent;
        border: 2px solid red; /* Set border color to red */
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
    <p>Total Appointments: {{ $appointments->count() }}</p>
    <div class="row">
        @foreach ($appointments as $appointment)
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="card h-100" style="border-radius: 15px; border: 2px solid rgba(97, 97, 97, 0.527);">
                <div class="card-body" style="@if($appointment->user_status == 'accepted') border-color: green; @elseif($appointment->user_status == 'rejected') border-color: red; @endif">
                    <!-- Your existing card content -->
                    <div class="card-body" style="@if($appointment->user_status == 'accepted') border-color: green; @elseif($appointment->user_status == 'rejected') border-color: red; @endif">
                        <h5 class="card-title"><b>{{ $appointment->name }}</b></h5>
                        <p class="card-text"><b>Email:</b> {{ $appointment->email }} </p>
                        <p><b>Date:</b> {{ $appointment->date }} </p>
                        <p>
                            <b>Time:</b> 
                            @php
                                // Split the appointment time string into hours and minutes
                                list($hours, $minutes) = explode(':', $appointment->appointment_time);
                                // Format the hours and minutes
                                $formattedStartTime = date('h:i A', mktime($hours, $minutes));
                                // Calculate end time by adding an hour to the start time
                                $formattedEndTime = date('h:i A', mktime($hours + 1, $minutes));
                            @endphp
                            {{ $formattedStartTime }} - {{ $formattedEndTime }}
                        </p>
                        
                        <p><b>Pet's Name:</b> {{ $appointment->pet_name }} </p>
                        <p><b> Pet's Type:</b> {{ $appointment->pet_type }} </p>
                        <p><b>Veterinarian:</b> {{ $appointment->veterinarian }}</p>
                        <p><b>Concern: </b> {{ $appointment->concern }} </p>
                        <p><strong>{{ $appointment->user_status }}</strong></p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    @if($appointment->user_status == 'pending')
                        @if($appointment->user_type !== 'canceled')
                            <button type="button" class="btn btn-gray" onclick="confirmCancellation('cancelForm{{$appointment->id}}')">Cancel</button>
                            <form action="{{ route('appointments.updateCancel', $appointment->id) }}" method="POST" id="cancelForm{{$appointment->id}}">
                                @csrf
                                @method('PUT') <!-- Ensure the method is set to PUT -->
                                <input type="hidden" name="user_status" value="canceled">
                            </form>
                            <a href="{{ route('appointment.edit', $appointment) }}" class="btn btn-green">Edit Appointment</a>
                        @endif
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this appointment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="confirmCancelBtn">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Your image -->
<div class="picture">
    <img src="images/create.png" style="width: 700px; height: 400px;">
</div>

<script>
    function confirmCancellation(formId) {
        $('#confirmationModal').modal('show');

        // When user confirms, submit the form
        $('#confirmCancelBtn').on('click', function () {
            $('#' + formId).submit(); // Submit the form with the specified ID
        });

        // When user cancels
        $('#confirmationModal').on('hide.bs.modal', function () {
            console.log('Canceled');
        });
    }
    
</script>

@endsection
