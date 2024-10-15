<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Fizio Element</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Početna</a></li>
                <li><a href="{{ url('/about') }}">O nama</a></li>
                <li><a href="{{ url('/services') }}">Usluge</a></li>
                <li><a href="{{ url('/schedule') }}">Zakažite termin</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Prijava</a></li>
                @else
                    <li><a href="{{ route('patients.index') }}">Dashboard</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Odjava
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Fizio Element. Sva prava zadržana.</p>
    </footer>
</body>

</html>
