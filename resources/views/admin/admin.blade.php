<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-vDI5s5G81h3RmAeXImK6RlhrKmJ/CcHRJHpnoIOIblzkRJ64EQJsrdU9yvONgMpJZB07L4p+Lrh+o72byuWdMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            margin-left: 220px; /* Adjusted margin-left */
        }

        .container.active {
            margin-left: 0; /* Adjusted margin-left when sidebar is active */
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

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
        }

        .card-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 10px 0;
        }

        .card-footer {
            text-align: center;
            margin-top: 20px;
        }

        /* Profile Dropdown Styles */
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
    position: fixed;
    bottom: 20px; /* Adjust the bottom position as needed */
    left: 20px;
    z-index: 9999; /* Ensure it's above other elements */
}

.dropdown {
    position: relative;
    display: inline-block;
}



.dropdown-content a {
    color: #333;
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

.dropbtn {
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

<div class="container active"> <!-- Ensure container is active by default -->
    <div class="header">
        <h1>Appointment Details Dashboard</h1>
        <p>Welcome, User</p>
    </div>

    <div class="dashboard-container">
        <div class="card">
            <div class="card-header">
                <h2>Total Appointments</h2>
            </div>
            <div class="card-body">
              <h1 class="total-appointments">{{ $appointments->count() }}</h1>
            </div>
            <div class="card-footer">
                <a href="/show_post" class="btn btn-success">View All</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Upcoming Appointments</h2>
            </div>
            <div class="card-body">
                <p>No upcoming appointments</p>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-success">Schedule Appointment</a>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
       
    }
</script>

</body>
</html>
