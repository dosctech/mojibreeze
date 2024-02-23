<!-- resources/views/appointment.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Appointment </title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include custom CSS -->
    <style>
        /* Custom styles */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #00000023;
        }
        .navbar-brand {
            font-weight: bold;
            color: #333;
        }
        .navbar-nav .nav-item .nav-link {
            color: #333;
            font-weight: bold;
        }
        .jumbotron {
            background-color: #4d4d4d27;
            padding: 2rem;
        }
        #appointment-section {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">MojiVet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#appointment-section">Get Appointment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="jumbotron mt-4">
            <h1>Welcome to our website!</h1>
            <!-- Other content goes here -->
            <p class="lead">We provide high-quality pet care services. Schedule an appointment today!</p>
        </div>

        <div id="appointment-section" class="mt-5">
            <h2 class="mb-4">Get Appointment</h2>
            <!-- Appointment form or content goes here -->
            <p>Please fill out the form below to schedule an appointment.</p>
            <!-- Add your appointment form here -->
            <form id="appointment-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date">
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time">
                </div>
                <div class="form-group">
                    <label for="pet_name">Pet's Name</label>
                    <input type="text" class="form-control" id="pet_name" placeholder="Enter your pet's name">
                </div>
                <div class="form-group">
                    <label for="pet_type">Pet's Type</label>
                    <input type="text" class="form-control" id="pet_type" placeholder="Enter your pet's type">
                </div>
                <div class="form-group">
                    <label for="veterinarian" class="font-weight-bold">Veterinarian</label>
                    <input type="text" class="form-control" name="veterinarian" id="veterinarian" placeholder="Choose">
                </div>
                <div class="form-group">
                    <label for="concern">Appointment Concern</label>
                    <textarea class="form-control" id="concern" rows="3" placeholder="Enter your appointment concern"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Form Submission Script -->
    <script>
        $(document).ready(function() {
            $("#appointment-form").submit(function(event) {
                // Prevent default form submission
                event.preventDefault();
                
                // Get form data
                var formData = {
                    name: $("#name").val(),
                    email: $("#email").val(), // Include email
                    date: $("#date").val(),
                    time: $("#time").val(), // Include time
                    pet_name: $("#pet_name").val(),
                    pet_type: $("#pet_type").val(),
                    concern: $("#concern").val()
                };
    
                // Display form data (for demonstration purposes)
                console.log(formData);
    
                // Here you can make an AJAX request to send the form data to the server
                // For example:
                // $.post("/appointments", formData, function(response) {
                //     console.log(response);
                // });
    
                // Redirect to home page
                window.location.href = "/home";
            });
        });
    </script>

</body>
</html>
