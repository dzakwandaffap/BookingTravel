<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — EasyTrip</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins',sans-serif; background-image:linear-gradient(to right,#005eb8,#0366d6);
               display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
        .login-container { background:#fff; padding:60px; border-radius:20px; width:700px;
                           box-shadow:0 5px 15px rgba(0,0,0,.2); }
        .input-field { width:100%; padding:10px; margin:10px 0; border:1px solid #e1e4e8;
                       border-radius:6px; background:#fafbfc; color:#24292e; font-size:14px; outline:none; }
        .btn { width:100%; padding:10px; margin:20px 0; background:#0366d6; border:none; border-radius:6px;
               font-size:16px; font-weight:700; cursor:pointer; color:#fff; transition:.3s; }
        .btn:hover { background:#005eb8; }
        .link { color:#0366d6; text-decoration:none; font-size:14px; }
        .link:hover { text-decoration:underline; }
        .alert { padding:10px 12px; border-radius:6px; margin-bottom:12px; font-size:14px;    animation: fadeOut 2.5s forwards; }
        .alert-success { background:#e7f6ee; color:#146c43; border:1px solid #badbcc;   animation: fadeOut 2.5s forwards; }
        .alert-danger  { background:#fde7e9; color:#b02a37; border:1px solid #f5c2c7;   animation: fadeOut 2.5s forwards; }
        .fade-out {opacity: 0;transition: opacity 0.5s ease;}
        .label { color:#000; }
    </style>
</head>
<body>
    <div class="login-container">
        @if (session('success'))
            <div class="alert alert-success ">{{ session('success') }}</div>
        @endif
        @if (session('failed'))
            <div class="alert alert-danger">{{ session('failed') }}</div>
        @endif

        <h1 style="color:#000;font-size:32px;margin-top:0;">Hi, let's book your trip with <strong>EasyTrip</strong></h1>

        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <input type="text" class="input-field" name="name" placeholder="Username" value="{{ old('name') }}" required>
            <input type="password" class="input-field" name="password" placeholder="Password" required>

            <button type="submit" class="btn">Sign In</button>
        </form>

        <div style="text-align:center;">
            <p>Don't have an account yet?
                <a href="{{ route('account.create') }}" class="link">Create an account</a>
            </p>
        </div>
    </div>
</body>
</html>
<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => {
            el.classList.add('fade-out');
            setTimeout(() => el.remove(), 500); // hapus setelah animasi selesai
        });
    }, 2000);
</script>
