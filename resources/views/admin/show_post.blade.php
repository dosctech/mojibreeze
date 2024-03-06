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
            left: -220px; /* Initially hidden */
            height: 100%;
            width: 200px;
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            transition: left 0.3s ease; /* Smooth transition */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar.active {
            left: 0;
            /* Show sidebar */
        }

        .sidebar-header h2 {
            margin-top: 60px;
            margin-bottom: 20px;
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
        }

        /* Main Content Styles */
        .container {
            padding: 20px;
            transition: margin-left 0.3s ease; /* Smooth transition */
            margin-left: 0; /* Adjusted margin-left */
        }

        .container.active {
            margin-left: 200px; /* Adjusted margin-left when sidebar is active */
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
            /* margin-left: 190px; */ /* Removed fixed margin-left */
        }

        .card-body {
            padding: 20px;
        }

        .appointment-details {
            display: flex;
            flex-wrap: wrap;
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
            margin: 10px;
            width: 120px;
            outline: none;
        }

        .btn-success {
            background-color: #4CAF50;
            color: #fff;
        }

        .btn-danger {
            background-color: #f44336;
            color: #fff;
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

        /* Statistics Container Styles */
        .stats-container {
            margin-left: 34%;
            text-align: center;
            margin-top: 250px; /* Adjusted for top margin */
            padding: 20px;
            position: fixed;
        }

        .stats-item {
            display: inline-block;
            margin: 0 20px;
        }

        .stats-item h3 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .stats-item p {
            margin: 5px 0 0;
            font-size: 16px;
            color: #666;
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
        <h2>Menu</h2>
    </div>
    <ul class="sidebar-menu">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Appointments</a></li>
    </ul>
    
</div>

<div class="container">
    <h1 class="header">Appointment Details</h1>
    <p class="total-appointments">Total Appointments: {{ $appointments->count() }}</p>
    <div class="appointment-container">
        @foreach ($appointments as $appointment)
            <div class="appointment-card">
                <div class="card-body">
                    <div class="appointment-details">
                        <!-- Appointment details -->
                        <div class="detail-pair">
                            <div class="title"><strong>Name</strong></div>
                            <div class="data">{{ $appointment->name }}</div>
                        </div>
                        <div class="detail-pair">
                            <div class="title"><strong>Email</strong></div>
                            <div class="data">{{ $appointment->email }}</div>
                        </div>
                        <div class="detail-pair">
                            <div class="title"><strong>Date</strong></div>
                            <div class="data">{{ $appointment->date }}</div>
                        </div>
                        <div class="detail-pair">
                            <div class="title"><strong>Time</strong></div>
                            <div class="data">{{ $appointment->appointment_time }}</div>
                        </div>
                        <div class="detail-pair">
                            <div class="title"><strong>Pet's Name</strong></div>
                            <div class="data">{{ $appointment->pet_name }}</div>
                        </div>
                        <div class="detail-pair">
                            <div class="title"><strong>Pet's Type</strong></div>
                            <div class="data">{{ $appointment->pet_type }}</div>
                        </div>
                        <div class="detail-pair">
                            <div class="title"><strong>Veterinarian</strong></div>
                            <div class="data">{{ $appointment->veterinarian }}</div>
                        </div>
                        <div class="detail-pair">
                            <div class="title"><strong>Concern</strong></div>
                            <div class="data">{{ $appointment->concern }}</div>
                        </div>
                        <div class="detail-pair">
                            <div class="title"><strong>Status</strong></div>
                            <div class="data">{{ $appointment->user_status}}</div>
                        </div>
                   
                    
                        <!-- Accept and Reject buttons -->
                        <div class="btn-container">
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
                        </div>
                        
                        <div id="confirmationModal" class="modal">
                            <div class="modal-content">
                                <p id="confirmationMessage"></p>
                                <div class="modal-buttons">
                                    <button id="confirmBtn" class="btn btn-success">Confirm</button>
                                    <button id="cancelBtn" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
</div>

<script>
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
        document.querySelector('.container').classList.toggle('active');
    }
</script>
<script>
    function showConfirmation(action, appointmentId) {
        var confirmationMessage = "Are you sure you want to " + action + " this appointment?";
        document.getElementById('confirmationMessage').innerText = confirmationMessage;
        document.getElementById('confirmationModal').style.display = "block";

        document.getElementById('confirmBtn').onclick = function() {
            if (action === 'accept') {
                document.getElementById('acceptForm_' + appointmentId).submit();
            } else if (action === 'reject') {
                document.getElementById('rejectForm_' + appointmentId).submit();
            }
        };

        document.getElementById('cancelBtn').onclick = function() {
            document.getElementById('confirmationModal').style.display = "none";
        };
    }
</script>
</body>
</html>
