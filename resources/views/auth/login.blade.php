<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Login - Secure Client Manager</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body class="login-page">


<div class="login-container">

    <div class="login-brand">

        <div class="login-icon">
            ◈
        </div>

        <h1>Secure Client Manager</h1>

        <p>Secure workspace for managing client requests.</p>

    </div>


    <div class="login-card">

        <span class="eyebrow">SECURE ACCESS</span>

        <h2>Welcome back</h2>

        <p class="login-subtitle">
            Sign in to access your workspace.
        </p>


        @if ($errors->any())

            <div class="error-message">

                {{ $errors->first() }}

            </div>

        @endif


        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="admin@example.com"
                    required
                    autofocus
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

            </div>


            <button type="submit" class="login-btn">
                Sign In
            </button>

        </form>

    </div>


    <p class="login-footer">
        Secure Client Manager · Protected Workspace
    </p>

</div>


</body>
</html>
