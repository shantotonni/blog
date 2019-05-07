@inject("categories","App\Inject\Category")
@inject("tags","App\Inject\Tag")
<!DOCTYPE html>
<html>
<head>
    <title>Discover | @yield('title')</title>

<!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="{{ asset('img/fabicon1.png') }}" type="image/x-icon" />
    <meta name="keywords" content="Express News Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

    <link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/css/select2.min.css" rel="stylesheet" />

    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- for bootstrap working -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:600" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
    <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/admin-theme/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>

</head>
<body>
<!-- header-section-starts-here -->
<div class="header">
    <div class="header-top">
        <div class="container wrap">
            <div class="num" style="padding: 0px 10px">

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"
                           style="font-size: 16px;font-family: 'Source Sans Pro', sans-serif;color: #fff;">
                            <i class="fas fa-user"></i>
                            {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu login">

                            <li>
                                <a href="{{ route('user.profile.view') }}"
                                   style="color: black;margin-left: 20px;font-size: 14px;font-family: 'Source Sans Pro', sans-serif;">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Profile
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user.post') }}"
                                   style="color: black;margin-left: 20px;font-size: 14px;font-family: 'Source Sans Pro', sans-serif;">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    My Posts
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   style="color: black;margin-left: 20px;font-size: 14px;font-family: 'Source Sans Pro', sans-serif;"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li> <a href="{{ route('login') }}" style="text-decoration: none;color: white;padding-right: 10px">Login</a></li>
                    <li><a href="{{ route('register') }}" style="text-decoration: none;color: white;">Register</a></li>
                @endif
                <div class="search">
                    <!-- start search-->
                    <div class="search-box">
                        <div id="sb-search" class="sb-search">
                            <form action="" method="GET">
                                <input class="sb-search-input" placeholder="Enter your search term..." type="text" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"> </span>
                            </form>
                        </div>
                    </div>
                    <!-- search-scripts -->
                    <script src="{{ asset('js/classie.js') }}"></script>
                    <script src="{{ asset('js/uisearch.js') }}"></script>
                    <script>
                        new UISearch( document.getElementById( 'sb-search' ) );
                    </script>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    @if(session()->has('msg'))
        <div class="alert alert-success">
            {{ session()->get('msg') }}
        </div>
    @endif

    <div class="header-bottom">
        <div class="logo text-center">
            <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Blog" width="250px" height="100px" /></a>
        </div>
        <div class="navigation">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container wrap">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <!--/.navbar-header-->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">

                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            @foreach($categories->getCategory() as $value)
                                <li><a href="{{ route('category.post',$value->id) }}">{{ $value->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>


@yield('content')


<!-- footer-section-starts-here -->
    <div class="footer">
        <div class="footer-top">
            <div class="container wrap ">
                <div class="row">
                    <div class="col-md-6 col-xs-6 col-sm-4 footer-grid">

                    </div>
                    <div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
                        <h4 class="footer-head">Categories</h4>
                        <ul class="cat">
                            @foreach($categories->getCategory() as $value)
                                <li><a href="">{{ $value->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-12 footer-grid">
                        <h4 class="footer-head">Tags</h4>
                        <ul class="cat">
                            @foreach($tags->getTag() as $value)
                                <li><a href="">{{ $value->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container wrap">
                <div class="copyrights col-md-6">
                    <p> Discover</p>
                </div>
                <div class="footer-social-icons col-md-6">
                    <ul>
                        <li><a class="facebook" href="#"></a></li>
                        <li><a class="twitter" href="#"></a></li>
                        <li><a class="flickr" href="#"></a></li>
                        <li><a class="googleplus" href="#"></a></li>
                        <li><a class="dribbble" href="#"></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <!---->
</div>
</body>
</html>
