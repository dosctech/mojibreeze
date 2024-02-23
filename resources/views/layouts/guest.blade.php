<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                background-image: url('images/bgfront.jpg');
                background-size: cover;
                background-repeat: no-repeat;
            }
                .text {
                margin-top: 350px; /* Adjust top margin as needed */
                margin-left: 240px;
                text-align: left; /* Align text to the left */
                font-weight: bold; /* Make text bold */
                font-size: 3rem;
                }
            .paragraph{
                font-size: 1rem;
            }
            .header5{
                font-size: 1.5rem;
            }
            .container {
                margin-top:-300px;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }
            .custom-box {
                border: 2px solid black; /* Add black border */
                border-radius: 10px; /* Add border radius */
                margin-left: auto; /* Move to the left */
                margin-right: 170px; /* Reset right margin */
                padding: 20px; /* Add padding */
                width: 100%; /* Ensure full width */
                max-width: 480px; /* Limit maximum width */
                background-color: white; /* Add white background */
            }
            .mojivet,
            .login,
            .sec {
                font-family: 'figtree', sans-serif;
                color: #000000; /* Adjust color as needed */
                margin-bottom: 20px; /* Adjust margin as needed */
                text-align: center; /* Center align the text */
            }
            .mojivet {
                font-size: 3rem; /* Adjust size as needed */
            }
            .login {
                font-size: 2rem; /* Adjust size as needed */
            }
            .sec {
                font-size: 1.5rem; /* Adjust size as needed */
            }
            @media (max-width: 1500px) {
            .custom-box {
                margin-right: 10%;
                max-width: 80%; /* Adjust maximum width for smaller screens */
                margin-top:400px;
            }
            .text {
                margin-top: 150px; /* Adjust top margin as needed */
                margin-left: 70px;
                text-align: left; /* Align text to the left */
                font-weight: bold; /* Make text bold */
                font-size: 1.5rem;
                }
            .paragraph{
                font-size: .5rem;
            }
            .header5{
                font-size: 1rem;
            }
        
        }
       
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="text">
            <h1>Welcome to MojiVet</h1>
            <p class="paragraph">Friendly & Caring</p>
            <h5 class="header5">Welcome to our online appointment system<br> for veterinary care.</h5>
        </div>
        <div class="container">
            <div class="custom-box">
                <h1 class="mojivet">MojiVet</h1>
                <h3 class="login">Login</h3>
                <p class="sec">Sign in to continue</p>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>