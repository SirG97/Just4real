<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Just4real International Limited</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="/"><span>JUST4REAL INTERNATIONAL LIMITED</span></a></h1>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">Home</a></li>
                    <li class="{{ (request()->is('gym')) ? 'active' : '' }}"><a href="/gym">Gym Equipments</a></li>
                    <li class="{{ (request()->is('sports')) ? 'active' : '' }}"><a href="/sports">Sports Equipments</a></li>
                    <li class="{{ (request()->is('spare-parts')) ? 'active' : '' }}"><a href="/spare-parts">Vehicle, Engines & Spare Parts</a></li>
                    <li class="{{ (request()->is('wines')) ? 'active' : '' }}"><a href="/wines">Wines</a></li>
                    <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="/contact">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->

@yield('content')


<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="copyright">
                    <p>Just4real International Limited</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="footer-card-icon">
                    Contact Phone: +2348033359211, +2348060403133
                    <br>
                    Contact Email: just4reals@yahoo.com
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>

<!-- jQuery easing -->
<script src="{{asset('js/jquery.easing.1.3.min.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
