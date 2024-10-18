<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<body>
    <nav class="navbar">
        <div class="logo">EasyTrip.com</div>
        <ul>
    
                <li>
            <!-- Sesuaikan route login -->
            <a href="{{ route('pages.login') }}" style="color: #fff;">Login</a>
        </li>
        <li>
            <!-- Sesuaikan route manage-account.index -->
            <a href="{{ route('manage-account.index') }}" style="color: #fff;">Account Management</a>
        </li>
        <li>
            <!-- Sesuaikan route booking.index -->
            <a href="{{ route('booking.index') }}" style="color: #fff;">Booking</a>
</li>


        </ul>
       
   
    </nav>

    @yield('content')
</body>
</html>
<style>
        /* Styling Navbar */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #005eb8; /* Tiket.com blue */
            padding: 15px 20px;
        }
        .navbar .logo {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }
        .navbar ul {
            list-style-type: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        .navbar ul li {
            margin: 0 15px;
            position: relative;
        }
        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 15px;
        }
        .navbar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        /* Dropdown */
        .navbar ul li:hover .dropdown {
            display: block;
        }
        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            z-index: 1;
        }
        .dropdown a {
            color: #333;
            padding: 10px 20px;
            display: block;
            white-space: nowrap;
        }
        .dropdown a:hover {
            background-color: #f5f5f5;
        }
        /* Search bar */
        .search-container {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 20px;
            padding: 5px 10px;
        }
        .search-container input {
            border: none;
            padding: 8px;
            font-size: 14px;
            outline: none;
            border-radius: 20px;
        }
        .search-container button {
            background-color: #ffa300; 
            border: none;
            padding: 8px 15px;
            color: white;
            border-radius: 20px;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #e08a00;
        }
        /* User profile button */
        .profile-btn {
            background-color: #ffa300;
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
        .profile-btn:hover {
            background-color: #e08a00;
        }
    </style>