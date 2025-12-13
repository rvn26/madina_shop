<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Customer</title>

    <style>
        body {
            font-family: "Poppins", Arial, sans-serif;
            background: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            width: 380px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.5s ease-in-out;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px  0 12px 12px ;
            margin-top: 6px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: all 0.2s;
        }

        input:focus {
            border-color: #0077ff;
            box-shadow: 0 0 5px rgba(0, 119, 255, 0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #0077ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }

        button:hover {
            background: #005fd4;
        }

        .register-link {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        .register-link a {
            color: #005fd4;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

</head>

<body>

    <div class="login-box">
        <h2>Login Customer</h2>

        <form action="{{ route('customer.auth.login') }}" method="POST">
            @csrf

            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button type="submit">Masuk</button>
        </form>

        <p class="register-link">
            Belum punya akun?  
            <a href="{{ route('customer.auth.register') }}">Daftar</a>
        </p>
    </div>

</body>

</html>
