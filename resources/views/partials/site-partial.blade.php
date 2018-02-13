<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 15/11/2017
 * Time: 4:52 PM
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>
        EverythngFashion&trade; an E-Commerce online Fashion Shopping Platform| Home ::
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{--<meta name="keywords" content="Fashionpress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,--}}
{{--Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />--}}
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="{{ asset("front-end/css/bootstrap.css") }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="{{ asset("front-end/css/style.css") }}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{ asset("front-end/js/jquery-1.11.1.min.js") }}"></script>
    <script src="{{ asset("front-end/js/responsiveslides.min.js") }}"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset("front-end/js/hover_pack.js") }}"></script>
    @yield('site-assets')
</head>
<body>
<div class="header">
    <div class="header_top">
        <div class="container">
            <div class="logo">
                <a href="/"><img src="{{ asset("front-end/images/logo.png") }}" alt=""/></a>
            </div>
            <ul class="shopping_grid">
                <a href="/access/signup"><li>Join</li></a>
                <a href="/access/signin"><li>Sign In</li></a>
                <a href="/shopping-bag">
                    <li>
                        <span class="m_1">Shopping Bag</span>&nbsp;&nbsp;(0) &nbsp;
                        <img src="{{ asset("front-end/images/bag.png") }}" alt=""/>
                    </li>
                </a>
                <div class="clearfix"> </div>
            </ul>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="h_menu4"><!-- start h_menu4 -->
        <div class="container">
            <a class="toggleMenu" href="#">Menu</a>
            <ul class="nav">
                <li class="active"><a href="index.html" data-hover="Home">Home</a></li>
                {{--<li><a href="/about" data-hover="About Us">About Us</a></li>--}}
                {{--<li><a href="/careers" data-hover="Careers">Careers</a></li>--}}
                <li><a href="/contact" data-hover="Contact Us">Contact Us</a></li>
                {{--<li><a href="/profile" data-hover="Company Profile">Company Profile</a></li>--}}
                <li><a href="/merchant/signup" data-hover="Company Registration">Merchant Registration</a></li>
                <li><a href="/listings" data-hover="Wish List">Product List</a></li>
                <li><a href="/wishlist" data-hover="Wish List">Wish List</a></li>
            </ul>
            <script type="text/javascript" src="{{ asset("front-end/js/nav.js") }}"></script>
        </div><!-- end h_menu4 -->
    </div>
</div>
<div class="slider">
    @yield('slider')
</div>
<div class="column_center">
    <div class="container">
        <div class="search">
            <div class="stay">Search Product</div>
            <div class="stay_right">
                <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                <input type="submit" value="">
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="main">
    @yield('content')
</div>
<div class="footer_bg">
</div>
<div class="footer">
    <div class="container">
        <div class="col-md-3 f_grid1">
            <h3>About</h3>
            <a href="#"><img src="{{ asset("front-end/images/logo.png") }}" alt=""/></a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
        </div>
        <div class="col-md-3 f_grid1 f_grid2">
            <h3>Follow Us</h3>
            <ul class="social">
                <li><a href=""> <i class="fb"> </i><p class="m_3">Facebook</p><div class="clearfix"> </div></a></li>
                <li><a href=""><i class="tw"> </i><p class="m_3">Twittter</p><div class="clearfix"> </div></a></li>
                <li><a href=""><i class="google"> </i><p class="m_3">Google</p><div class="clearfix"> </div></a></li>
                <li><a href=""><i class="instagram"> </i><p class="m_3">Instagram</p><div class="clearfix"> </div></a></li>
            </ul>
        </div>
        <div class="col-md-6 f_grid3">
            <h3>Contact Info</h3>
            <ul class="list">
                <li><p>Phone : 1.800.254.5487</p></li>
                <li><p>Fax : 1.800.254.2548</p></li>
                <li><p>Email : <a href="mailto:info(at)fashionpress.com"> info(at)fashionpress.com</a></p></li>
            </ul>
            <ul class="list1">
                <li><p>Aliquam augue a bibendum ipsum diam, semper porttitor libero elit egestas gravida, ut quam, nunc taciti</p></li>
            </ul>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="footer_bottom">
    <div class="container">
        <div class="cssmenu">
            <ul>
                <li class="active"><a href="login.html">Privacy Policy</a></li> .
                <li><a href="checkout.html">Terms of Service</a></li> .
                <li><a href="checkout.html">Creative Rights Policy</a></li> .
                <li><a href="login.html">Contact Us</a></li> .
                <li><a href="register.html">Support & FAQ</a></li>
            </ul>
        </div>
        <div class="copy">
            <p>&copy;  2015 Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a></p>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>


@yield('scripts')
</body>
</html>