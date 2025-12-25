<!DOCTYPE html>
<html>
<head>
    <title>Passport Auth</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .box {
            width: 100%;
            max-width: 380px;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h3 {
            text-align: center;
            color: #1e3c72;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #2a5298;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 6px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        button:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(42, 82, 152, 0.4);
        }

        .toggle {
            text-align: center;
            margin-top: 15px;
            color: #2a5298;
            cursor: pointer;
            font-size: 14px;
        }

        .toggle:hover {
            text-decoration: underline;
        }

        .hidden {
            display: none;
        }

        .msg {
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
            color: #d63031;
        }
        .error-box {
            background: #ffe6e6;
            border-left: 4px solid #e74c3c;
            color: #c0392b;
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            margin-top: 10px;
        }

        .input-error {
            border-color: #e74c3c !important;
        }

        @media (max-width: 480px) {
            .box {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="box">
    <h3 id="title">Login</h3>

    <!-- LOGIN -->
    <form id="loginForm">
        <input type="email" id="loginEmail" placeholder="Email">
        <input type="password" id="loginPassword" placeholder="Password">
        <button>Login</button>
    </form>
    <div id="loginError" class="error-box hidden"></div>


    <!-- REGISTER -->
    <form id="registerForm" class="hidden">
        <input type="text" id="regName" placeholder="Name">
        <input type="email" id="regEmail" placeholder="Email">
        <input type="password" id="regPassword" placeholder="Password">
        <input type="password" id="regPasswordConfirm" placeholder="Confirm Password">
        <button>Register</button>
    </form>
    <div id="registerError" class="error-box hidden"></div>


    <button id="logoutBtn" class="hidden">Logout</button>

    <div class="toggle" id="toggle">Create account</div>
    <div class="msg" id="msg"></div>
</div>

<script>
const API = "http://127.0.0.1:8000/api";
let token = localStorage.getItem('token');

const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const toggle = document.getElementById('toggle');
const title = document.getElementById('title');
const msg = document.getElementById('msg');
const logoutBtn = document.getElementById('logoutBtn');

/* Toggle */
toggle.onclick = () => {
    loginForm.classList.toggle('hidden');
    registerForm.classList.toggle('hidden');
    title.innerText = loginForm.classList.contains('hidden') ? 'Register' : 'Login';
    toggle.innerText = title.innerText === 'Login'
        ? 'Create account'
        : 'Already have account? Login';
};

/* Register */
registerForm.onsubmit = async e => {
    e.preventDefault();

    const errorBox = document.getElementById('registerError');
    errorBox.classList.add('hidden');
    errorBox.innerHTML = '';

    const res = await fetch(API + '/register', {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            name: regName.value,
            email: regEmail.value,
            password: regPassword.value,
            password_confirmation: regPasswordConfirm.value
        })
    });

    const data = await res.json();

    if (res.status === 422) {
        let errorsHtml = '';
        for (let field in data.errors) {
            errorsHtml += `<div>• ${data.errors[field][0]}</div>`;
        }
        errorBox.innerHTML = errorsHtml;
        errorBox.classList.remove('hidden');

        // ✅ auto hide after 5 seconds
        autoHideError('registerError');

        return;
    }

    msg.innerText = data.message || 'Registered successfully. Please login.';
};


/* Login */
loginForm.onsubmit = async e => {
    e.preventDefault();

    document.getElementById('loginError').classList.add('hidden');
    loginEmail.classList.remove('input-error');
    loginPassword.classList.remove('input-error');

    const res = await fetch(API + '/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            email: loginEmail.value,
            password: loginPassword.value
        })
    });

    const data = await res.json();

    if (res.status === 401 || res.status === 422) {
        const errorBox = document.getElementById('loginError');

        errorBox.innerText =
            data.message || 'Invalid email or password';
        errorBox.classList.remove('hidden');

        loginEmail.classList.add('input-error');
        loginPassword.classList.add('input-error');

        // ✅ auto hide after 5 seconds
        autoHideError('loginError');

        return;
    }

    if (data.access_token) {
        localStorage.setItem('access_token', data.access_token);
        window.location.href = '/api/dashboard';
    }
};


/* Logout */
logoutBtn.onclick = async () => {
    await fetch(API + '/logout', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token
        }
    });

    localStorage.removeItem('token');
    msg.innerText = 'Logged out';
    logoutBtn.classList.add('hidden');
};

function autoHideError(elementId, time = 5000) {
    setTimeout(() => {
        const el = document.getElementById(elementId);
        if (el) el.classList.add('hidden');
    }, time);
}

</script>

</body>
</html>
