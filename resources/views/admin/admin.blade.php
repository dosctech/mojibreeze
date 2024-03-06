<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
  overflow-x: hidden; /* Hide horizontal scrollbar */
  display: flex;
}

.dashboard-sidebar {
  background-color: #d1d1d1;
  color: #fff;
  padding: 20px;
  width: 250px; /* Adjust sidebar width as needed */
  height: 100vh; /* Set sidebar height to 100% of the viewport height */
  overflow-y: auto; /* Add vertical scroll if content exceeds sidebar height */
}

.dashboard-content {
  padding: 20px;
  flex-grow: 1;
}

.profile-dropdown {
  position: absolute;
  top: 20px;
  right: 20px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 110px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 5px;
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
.dropbtn{
    padding: 15px;
    border-radius: 10px;
}
.text-blue-500 {
  color: #000000; /* Default color */
  font-family: "Arial", sans-serif; /* Aesthetic font */
  text-decoration: none; /* Remove text decoration */
  font-size: 18px; /* Increase font size */
  margin-left: 30px; /* Left margin */
  margin-top: 30px;
  transition: margin-left 0.5s; /* Add transition for margin-left */
}

.text-blue-500:hover {
  color: #4b4b4b; /* Darker color on hover */
  margin-top: 30px; /* Top margin on hover */
  margin-left: 0; /* Slide to the left on hover */
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

.dashboard-sidebar,
.dashboard-content {
  display: flex;
  flex-direction: column;
}

.dashboard-content {
  align-items: center;
}

@media only screen and (max-width: 768px) {
  .dashboard-sidebar {
    width: 100%; /* Set sidebar width to 100% on smaller screens */
  }
}
</style>
</head>
<body>

<div class="dashboard-sidebar">
  <img src="images/navigationlogo.png" style="width: 200px; height: auto;">
  <a href="{{ route('admin.show_post') }}" class="text-blue-500 hover:text-blue-700">Appointment List</a>
</div>

<div class="dashboard-content">
  <div class="dashboard-header">

  </div>

  <!-- Content for the selected navigation will go here -->
  <div class="picture">
    <img src="images/create.png" style="width: 700px; height: 400px;">
  </div>

  <div class="profile-dropdown">
    <div class="dropdown">
      <button class="dropbtn">Profile</button>
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

</body>
</html>
