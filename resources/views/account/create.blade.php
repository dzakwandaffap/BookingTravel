<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(to right, #005eb8, #0366d6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 60px;
            border-radius: 20px;
            width: 700px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
            background-color: #fafbfc;
            color: #24292e;
            font-size: 14px;
            outline: none;
        }
        .btn {
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            background-color: #0366d6;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: #ffffff;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #005eb8;
        }
        .checkbox-field {
            display: flex;
            align-items: center;
            margin: 15px 0;
            color: #ffffff;
            font-size: 14px;
        }
        .checkbox-field input {
            margin-right: 10px;
        }
        .additional-options {
            text-align: center;
        }
        .link {
            color: #0366d6;
            text-decoration: none;
            font-size: 14px;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        <h1 style="color: #000000; font-size: 36px;">Hi, Let's Book your trip with <h1 style="color: #000000; font-size: 36px;"> EasyTrip</h1> </h1>
        
        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <input type="text" class="input-field" name="username" placeholder="Username" required>
            <input type="password" class="input-field" name="password" placeholder="Password" required>
            
            <div class="checkbox-field">
                <input type="checkbox" name="remember" id="remember" style="accent-color: #000000">
                <label for="remember" style="color: #000000">Remember me</label>
            </div>
            
            <button type="submit" class="btn">Sign In</button>
        </form>
        
        <div class="additional-options">
            <p>Don't have an account yet? <a href="{{ route('manage-account.create') }}" class="link">Create an account</a></p>
        </div>
    </div>
</body>
</html>
