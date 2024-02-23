
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MojiVet</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">
     <style>
        /* Centering items */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .col-md-3, .col-md-4, .col-md-6, .col-md-offset-2 {
            width: calc(33.33% - 30px);
            margin: 15px;
        }
        .col-md-12 {
            width: calc(100% - 30px);
            margin: 15px;
        }
        .col-md-8 {
            width: calc(66.66% - 30px);
            margin: 15px;
        }
        .col-md-2 {
            width: calc(16.66% - 30px);
            margin: 15px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
        }
        .paragraph {
            text-align: justify;
            margin-bottom: 20px;
        }
    </style>
    
</head>
<body>

<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">
        <span class="spinner-rotate"></span>
    </div>
</section>

<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

         <div class="navbar-header">
              <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                   <span class="icon icon-bar"></span>
                   <span class="icon icon-bar"></span>
                   <span class="icon icon-bar"></span>
              </button>

         </div>

         <!-- MENU LINKS -->
         <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-nav-first">
                <a href="{{url('/dashboard')}}" class="navbar-brand">MojiVet</a>
                   <li><a href="#home" class="smoothScroll">Home</a></li>
                   <li><a href="#about" class="smoothScroll">About</a></li>
                   <li><a href="#menu" class="smoothScroll">Photos</a></li>
              

              <ul class="nav navbar-nav navbar-right">
                   <li><a href="{{ route('appointment') }}" class="section-btn btn btn-default smoothScroll">Get appointment</a></li>
                   <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
    
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
    
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
              </ul>
         </div>
    </div>
    
</section>

<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="row">
        <div class="owl-carousel owl-theme">
            <div class="item item-first">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12">
                            <h3>Welcome to MojiVet</h3>
                            <h1>Schedule your pet's next appointment effortlessly and embark on a journey of tailored veterinary excellence.</h1>
                            <a href="{{ route('appointment') }}" class="section-btn btn btn-default smoothScroll">Get appointment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item item-third">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12">
                            <h3>Take Care of your pets</h3>
                            <h1>Vaccinations, proper nutrition, and regular dental check-ups contribute to a lifetime of good health for your beloved pets.</h1>
                            <a href="{{ route('appointment') }}" class="section-btn btn btn-default smoothScroll">Get appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<main>

<!-- ABOUT -->
<section id="about" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="about-info">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                        <h4>Read our story</h4>
                        <h2>Paws and Hooves, Hearts and Health – Where Compassion Meets Care!</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>Create and manage personalized profiles for each of your pets. Keep track of their medical history, vaccination records, and upcoming appointments in one centralized location.</p>
                        <p>Communicate directly with our veterinary team through the platform. Ask questions, share concerns, and receive guidance without the need for a phone call. <a href="https://plus.google.com/+templatemo" target="_parent">templatemo</a>. Thank you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                    <img src="images/about-image.jpg" class="img-responsive" alt="" style="width: 600px; height: auto;">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="menu" data-stellar-background-ratio="0.5">
    <div class="section">
        <h2>Max survived from parvo</h2>
        <div class="paragraph">
            <p>Life in Parvoopolis was tough for a stray dog like Max, especially with the looming threat of the deadly parvovirus lurking around every corner. But Max was determined to survive, his spirit unbroken despite the hardships he faced.</p>
            <p>One fateful day, as Max was scavenging for food in a run-down alley, he encountered a group of other dogs who had fallen victim to the ravages of parvovirus. They were weak and emaciated, their once-glossy coats now dull and matted with filth. Max knew he had to do something to help them, but he also knew that he was risking his own life by staying in such close proximity to the infected dogs.</p>
        </div>
        <img src="images/max_picture.jpg" alt="Max's Picture">
    </div>

    <div class="section">
        <h2>Luna survived from Bacterial infection</h2>
        <div class="paragraph">
            <p>Life in Whisker Hollow was idyllic, with the townsfolk going about their days in peaceful harmony. Luna spent her time exploring the nooks and crannies of the town, basking in the warmth of the sun and chasing after butterflies in the meadows. However, one day, tragedy struck when Luna fell ill with a severe bacterial infection. The normally lively cat became lethargic and weak, her once-shiny coat now dull and unkempt. The townsfolk were devastated by Luna’s plight, fearing that they might lose their beloved feline friend.</p>
        </div>
        <img src="images/luna_picture.jpeg" alt="Luna's Picture">
    </div>
</section>
</main>

<!-- Footer and Scripts -->
<!-- FOOTER -->
<footer id="footer" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-8">
                <div class="footer-info">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us</h2>
                    </div>
                    <address class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>123 AB Fernandez,<br> Daguapan City</p>
                    </address>
                </div>
            </div>
            <div class="col-md-3 col-sm-8">
                <div class="footer-info">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservation</h2>
                    </div>
                    <address class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>090-080-0650 | 090-070-0430</p>
                        <p><a href="mailto:info@company.com">mojivet@gmail.com</a></p>
                    </address>
                </div>
            </div>
            <div class="col-md-4 col-sm-8">
                <div class="footer-info footer-open-hour">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Open Hours</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>Sunday: Closed</p>
                        <div>
                            <strong>Monday to Friday</strong>
                            <p>8:00 AM - 5:00 PM</p>
                        </div>
                        <div>
                            <strong>Saturday</strong>
                            <p>8:00 AM - 12:00 NN</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                    <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                    <li><a href="#" class="fa fa-google"></a></li>
                </ul>
                <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s">
                    <p><br>Copyright &copy; 2024 <br>MojiVet</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
