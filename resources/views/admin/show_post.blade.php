<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0; /* Initially open */
            height: 100%;
            width: 220px;
            background-color: #5858581a;
            color: #000000;
            padding: 20px;
            transition: left 0.3s ease; /* Smooth transition */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999; /* Ensure it's above other elements */
        }

        .sidebar.active {
            left: -220px; /* Hide sidebar */
        }

        .sidebar-header img {
            width: 100px; /* Adjust image size as needed */
            display: block;
            margin: 0 auto; /* Center the image */
        }

        .sidebar-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            text-decoration: none;
            color: #000000; /* Changed color to improve readability */
            font-size: 18px;
            display: block;
            padding: 10px 0;
            text-align: center;
        }

        /* Main Content Styles */
        .container {
            padding: 20px;
            transition: margin-left 0.3s ease; /* Smooth transition */
            margin-left: 0; /* Adjusted margin-left */
        }

        .container.move-right {
            margin-left: 0; /* Adjusted margin-left when sidebar is closed */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .total-appointments {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .appointment-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .card-body {
            padding: 20px;
        }
        .container.move-right {
            margin-left:-220px; /* Adjusted margin-right when sidebar is closed */
        }

        .appointment-details {
            display: flex;
            flex-wrap: wrap;
            margin-left: 252px;
        }

        .detail-pair {
            margin-right: 20px; /* Adjust as needed */
            margin-bottom: 10px; /* Adjust as needed */
        }

        .title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .data {
            margin-bottom: 5px;
            margin-right: -10px;
        }

        .card-footer {
            text-align: center;
            padding-top: 10px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 5px;
            width: 90px;
            outline: none;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-left: 250px;
        }

        .table th,
        .table td {
            padding: 8px;
            border-bottom: 1px solid #808080;
            
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
            
        }

        .table tbody tr:hover {
            background-color: #f5f5f5;
            
        }

        .btn {
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-success {
            background-color: #4CAF50;
            color: white;
        }

        .btn-danger {
            background-color: #f44336;
            color: white;
        }

        .btn-container {
            display: flex;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Confirmation Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 5px;
            width: 50%;
            text-align: center;
        }

        .modal-buttons {
            margin-top: 20px;
        }

        .modal-buttons button {
            margin: 0 10px;
        }

        /* Hamburger Menu Styles */
        .hamburger {
            position: fixed;
            top: 20px;
            left: 20px;
            cursor: pointer;
            z-index: 9999; /* Ensure it's above other elements */
        }

        .hamburger div {
            width: 35px;
            height: 5px;
            background-color: #000000;
            margin: 6px 0;
            transition: all 0.3s ease; /* Smooth transition */
        }

        /* Rotate the middle bar to create X icon when active */
        .hamburger.active div:first-child {
            transform: rotate(-45deg) translate(-9px, 6px);
        }

        .hamburger.active div:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active div:last-child {
            transform: rotate(45deg) translate(-9px, -6px);
        }

        .profile-dropdown {
            margin-left: 70px;
            top: 20px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-top:190px;
            margin-left: -50px;
        }

        

        .dropdown-content a {
            color: #000000;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #555;
            color: #fff;
            border: none;
        }
        .dropbtn{
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="hamburger" onclick="toggleSidebar()">
    <div></div>
    <div></div>
    <div></div>
</div>

<div class="sidebar">
    <div class="sidebar-header">
        <img src="images/favicon.ico">
    </div>
    <ul class="sidebar-menu">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/show_post">Appointments</a></li>
    </ul>
    
    <div class="stats-container">
        <div class="stats-item">
            <h3>Number of Accepted</h3>
            <p><?php echo $acceptedCount; ?></p>
        </div>
        <div class="stats-item">
            <h3>Number of Rejected</h3>
            <p><?php echo $rejectedCount; ?></p>
        </div>
    </div>
    <div class="profile-dropdown">
        <div class="dropdown">
            <div class="dropdown-content">
                <a href="{{ route('profile.edit') }}">Edit Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</div>
<h1 class="header">Appointment Details</h1>
    <p class="total-appointments">Total Appointments: {{ $appointments->count() }}</p>
<div class="container">
    
    <div class="appointment-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date & Time</th>
                    <th>Pet's Details</th>
                    <th>Veterinarian</th>
                    <th>Concern</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->email }}</td>
                        <td>{{ $appointment->date }}<br>
                            @php
                                $appointmentTime = \Carbon\Carbon::createFromFormat('H:i:s', $appointment->appointment_time);
                                $formattedStartTime = $appointmentTime->format('h:i'); // Format start time (e.g., 8:00)
                                $formattedEndTime = $appointmentTime->copy()->addHour()->format('h:i A'); // Add an hour and format end time with AM/PM
                            @endphp
                            {{ $formattedStartTime }} - {{ $formattedEndTime }}</p>
                        <td>
                            <strong>Name:</strong> {{ $appointment->pet_name }}<br>
                            <strong>Type:</strong> {{ $appointment->pet_type }}
                        </td>
                        <td>{{ $appointment->veterinarian }}</td>
                        <td>{{ $appointment->concern }}</td>
                        <td>{{ $appointment->user_status}}</td>
                        <td>
                            @if($appointment->user_status !== 'accepted' && $appointment->user_status !== 'rejected')
                                <form id="acceptForm_{{ $appointment->id }}" action="{{ route('admin.accept_post') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                    <button type="button" onclick="showConfirmation('accept', {{ $appointment->id }})" class="btn btn-success">Accept</button>
                                </form>
                                <form id="rejectForm_{{ $appointment->id }}" action="{{ route('admin.reject_post') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                    <button type="button" onclick="showConfirmation('reject', {{ $appointment->id }})" class="btn btn-danger">Reject</button>
                                </form>
                                
                            @endif
                        </td>
                        <td>
                            <form id="deleteForm_{{ $appointment->id }}" action="{{ route('admin.delete_post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                <button type="button" onclick="showConfirmation('delete', {{ $appointment->id }})" class="btn" style="background-color: #494949; color: white; padding: 6px 12px; border: none; cursor: pointer; border-radius: 4px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmation Modal -->
<!-- Confirmation Modal -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p id="confirmationMessage"></p>
        <div class="modal-buttons">
            <button id="confirmBtn" class="btn btn-success">Confirm</button>
            <button id="cancelBtn" class="btn btn-danger">Cancel</button>
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
        document.querySelector('.container').classList.toggle('move-right');
    }

    function showConfirmation(action, appointmentId) {
        var confirmationMessage = "";

        // Set appropriate confirmation message based on action
        if (action === 'delete') {
            confirmationMessage = "Are you sure you want to delete this appointment?";
        } else if (action === 'accept') {
            confirmationMessage = "Are you sure you want to accept this appointment?";
        } else if (action === 'reject') {
            confirmationMessage = "Are you sure you want to reject this appointment?";
        }

        document.getElementById('confirmationMessage').innerText = confirmationMessage;
        document.getElementById('confirmationModal').style.display = "block";

        // Set appropriate action for confirm button
        document.getElementById('confirmBtn').onclick = function() {
            var form = document.createElement('form');
            form.method = 'POST';

            // Set action based on the action type
            if (action === 'delete') {
                form.action = '{{ route("admin.delete_post") }}';
            } else if (action === 'accept') {
                form.action = '{{ route("admin.accept_post") }}';
            } else if (action === 'reject') {
                form.action = '{{ route("admin.reject_post") }}';
            }

            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            var methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);

            var appointmentIdInput = document.createElement('input');
            appointmentIdInput.type = 'hidden';
            appointmentIdInput.name = 'appointment_id';
            appointmentIdInput.value = appointmentId;
            form.appendChild(appointmentIdInput);

            document.body.appendChild(form);
            form.submit();
        };

        document.getElementById('cancelBtn').onclick = function() {
            document.getElementById('confirmationModal').style.display = "none";
        };
    }
</script>




</body>
</html>
