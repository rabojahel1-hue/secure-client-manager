<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Secure Client Manager')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="app-layout">

        <aside class="sidebar">

            <div class="brand">
                <div class="brand-icon">◈</div>

                <div>
                    <strong>Secure Client</strong>
                    <span>Manager</span>
                </div>
            </div>

            <nav class="sidebar-nav">

                <a href="/" class="nav-item">
                    <span class="nav-icon">⌂</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('requests.index') }}" class="nav-item">
                    <span class="nav-icon">▣</span>
                    <span>Client Requests</span>
                </a>
                <a href="{{ route('requests.trash') }}" class="nav-item">
                    <span class="nav-icon">🗑</span>
                    <span>Trash</span>
                </a>

            </nav>

            <div class="sidebar-footer">
                <div class="security-mark">◇</div>

                <p>
                    Built for safer<br>
                    digital work.
                </p>
            </div>

        </aside>


        <div class="main-area">

            <header class="topbar">

                <div class="topbar-title">
                    Secure workspace
                </div>

                <div class="topbar-actions">

                    <div class="profile">

                        <div class="profile-avatar">R</div>

                        <div class="profile-info">
                            <strong>Reem</strong>
                            <span>Administrator</span>
                        </div>

                    </div>


                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button type="submit" class="logout-btn">
                            Logout
                        </button>

                    </form>

                </div>

            </header>


            <main class="content-area">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
