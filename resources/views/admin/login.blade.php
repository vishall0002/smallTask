<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            /* background-color: #111; */
            /* background-color: #f0f0f0; */
            background: rgb(2,0,36);
            background: radial-gradient(circle, rgba(2,0,36,0.9836309523809523) 0%, rgba(9,62,121,0.9640231092436975) 0%, rgba(0,146,255,1) 29%);
            /* background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,73,121,0.9640231092436975) 30%, rgba(0,212,255,1) 95%); */
            color: #fff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            /* background: #222; */
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,0.9836309523809523) 0%, rgba(9,62,121,0.9640231092436975) 47%, rgba(0,212,255,1) 95%);
            padding: 50px;
            width: 580PX;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .form-control {
            background: transparent;
            color: #fff;
            border: 1px solid #fff;
            border-radius: 8px;
            padding: 12px;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-group-text {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }

        .btn-primary {
            background: #fff;
            color: #111;
            border-radius: 8px;
            font-weight: 600;
            padding: 12px;
            border: none;
            transition: 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: #ccc;
            color: #111;
        }

        .forgot-password {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: 0.3s ease-in-out;
        }

        .forgot-password:hover {
            color: #fff;
        }

        .alert {
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Admin Login</h2>

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <form action="{{ route('admin.authenticate') }}" method="post">
            @csrf
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                @error('email')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                @error('password')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

            <?php /* 
                <div class="mt-3">
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            */ ?>
        </form>
    </div>

</body>
</html>
