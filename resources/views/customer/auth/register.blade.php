<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Customer</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .box {
            width: 100%;
            max-width: 380px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #2c3e50;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 93%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #bbb;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #00c853;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #009e41;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #006eff;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Register Customer</h2>

    <form action="{{ route('customer.auth.register') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email..." required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password..." required>

        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" placeholder="Ulangi password..." required>

        <button type="submit">Daftar</button>
    </form>

    <a href="{{ route('customer.auth.login') }}">Sudah punya akun? Login</a>
</div>

</body>
</html>
