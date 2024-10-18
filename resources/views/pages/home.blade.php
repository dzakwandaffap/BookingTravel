@extends('Layout.nav')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyTrip - Your Travel Companion</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #2ea44f;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?travel') no-repeat center center/cover;
            height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }
        .hero h1 {
            font-size: 48px;
            margin: 0;
        }
        .hero p {
            font-size: 24px;
            margin: 10px 0 20px;
        }
        .cta-button {
            background-color: #fff;
            color: #2ea44f;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
        }
        .section {
            padding: 60px 20px;
            text-align: center;
        }
        .section h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .section p {
            font-size: 18px;
            margin-bottom: 40px;
            line-height: 1.6;
        }
        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .feature {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            flex: 1;
            min-width: 300px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            background-color: #2ea44f;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>


<section class="hero" style="background-image:  url(https://images.pexels.com/photos/842711/pexels-photo-842711.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1); background-size: cover; background-position: center; height: 500px; display: flex; align-items: center; justify-content: center; width: 100%;">
<header style="background-color: transparent;">
    <h1 style="color: white;">Welcome to EasyTrip</h1>
</header>

<br><br>
<h1 style="color: white;">Your Adventure Awaits</h1>
    <p style="color: white;">Discover amazing places and book your trip with ease.</p>
    <a href="/booking" class="cta-button">Start Your Journey</a>
</section>

<section class="section">
    <h2>Why Choose EasyTrip?</h2>
    <p>We provide the best travel solutions tailored just for you. Our platform is designed to simplify your travel experience.</p>
</section>

<section class="section features">
    <div class="feature" style="border-radius: 8px; overflow: hidden;">
        <img width="100%" src="  https://plus.unsplash.com/premium_photo-1669748158379-b1460474807c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Travel Booking" style="object-fit: cover;">
        <h3 style="padding: 20px 20px 0;">Easy Booking</h3>
        <p style="padding: 0 20px 20px;">Book your flights, hotels, and activities in just a few clicks. Hassle-free and straightforward.</p>
    </div>
    <div class="feature" style="border-radius: 8px; overflow: hidden;">
        <img width="100%" src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Hotel Booking" style="object-fit: cover;">
        <h3 style="padding: 20px 20px 0;">Best Price Guarantee</h3>
        <p style="padding: 0 20px 20px;">We ensure that you get the best prices available in the market. Save more, travel more!</p>
    </div>
    <div class="feature" style="border-radius: 8px; overflow: hidden;">
        <img width="100%" src="https://plus.unsplash.com/premium_photo-1726783385210-a54e5cc47666?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Travel Support" style="object-fit: cover;">
        <h3 style="padding: 20px 20px 0;">24/7 Customer Support</h3>
        <p style="padding: 0 20px 20px;">Our dedicated team is here to help you anytime, anywhere. Your satisfaction is our priority.</p>
    </div>
</section>

<section class="section">
    <h2>Join the EasyTrip Family!</h2>
    <p>Sign up now and be part of a community of travelers who enjoy seamless trips and exclusive offers.</p>
    <a href="/" class="cta-button">Sign Up</a>
</section>


</body>
</html>

@endsection

