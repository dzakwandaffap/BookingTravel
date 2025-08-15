<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — EasyTrip</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins',sans-serif; background-image:linear-gradient(to right,#005eb8,#0366d6);
               display:flex; justify-content:center; align-items:center; min-height:100vh; margin:0; }

        .container { background:#fff; padding:40px; border-radius:20px; width:700px;
                     box-shadow:0 5px 15px rgba(0,0,0,.2); }

        .input-field { width:100%; padding:10px; margin:10px 0; border:1px solid #e1e4e8;
                       border-radius:6px; background:#fafbfc; color:#24292e; font-size:14px; outline:none; }

        .btn { width:100%; padding:10px; margin:20px 0; background:#0366d6; border:none; border-radius:6px;
               font-size:16px; font-weight:700; cursor:pointer; color:#fff; transition:.3s; }

        .btn:hover { background:#005eb8; }

        .alert { padding:10px 12px; border-radius:6px; margin-bottom:12px; font-size:14px; }

        .alert-danger  { background:#fde7e9; color:#b02a37; border:1px solid #f5c2c7; }

        .link { color:#0366d6; text-decoration:none; font-size:14px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="margin-top:0;">Create your EasyTrip account</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0 0 0 20px;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('account.store') }}" method="POST">
            @csrf
            <input type="text" class="input-field" name="name" placeholder="Username" value="{{ old('name') }}" required>
            <input type="email" class="input-field" name="email" placeholder="Email" value="{{ old('email') }}" required>

            <select name="role" class="input-field" required>
                <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select role</option>
                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                @endif
                
            </select>

            <input type="password" class="input-field" name="password" placeholder="Password (min 8 chars)" required>

            <button type="submit" class="btn">Create Account</button>
        </form>
        @if(!Auth::check())
        <p style="text-align:center;">Already have an account? <a class="link" href="{{ route('login') }}">Sign in</a></p>
        @endif
    </div>
</body>
</html>
