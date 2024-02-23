<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include custom CSS -->
    <style>
        /* Custom styles */
        body {
            font-family: 'Poppins', sans-serif; /* Change the font-family to 'Poppins' */
            background-color: #f8f9fa; /* Change the background color */
            color: #333; /* Change the default text color */
            line-height: 1.6; /* Adjust the line-height for better readability */
        }
        .navbar-brand {
            font-weight: bold;
            color: #333;
            font-size: 24px; /* Increase the font size */
            margin-top: 15px;
            letter-spacing: 1px; /* Add letter-spacing */
        }
        .navbar-brand img {
            margin-right: 5px; /* Add spacing between the image and text */
            width: 30px; /* Set the width of the image */
            height: auto; /* Maintain aspect ratio */
        }
        .navbar-nav .nav-item .nav-link {
            color: #333;
            font-weight: bold;
            font-size: 18px; /* Increase the font size */
            text-transform: uppercase; /* Uppercase the text */
            letter-spacing: 1px; /* Add letter-spacing */
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
        h1, h2, h3, h4, h5, h6 {
            color: #333; /* Set heading colors */
        }
        p {
            font-size: 16px; /* Set paragraph font size */
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            
            <a class="navbar-brand" href="{{ url('/dashboard') }}"><img src="{{ asset('images/arrow.png') }}">Appointment List</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
