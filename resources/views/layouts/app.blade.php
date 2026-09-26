<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'TaskFlow')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
    font-family: Arial, Helvetica, sans-serif;

    background-color: #05070b;
    background-image:
        linear-gradient(rgba(3, 5, 20, 0.55), rgba(3, 5, 20, 0.75)),
        url('/images/background.png');
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;

    color: #ffffff;
    min-height: 100vh;
}
body::before {
    content: "";
    position: fixed;
    inset: 0;
    background:
        linear-gradient(rgba(3, 5, 20, 0.55), rgba(3, 5, 20, 0.75)),
        url('/images/background.png') center / cover no-repeat;
    z-index: -1;
    pointer-events: none;
}

        /* NAVIGATION */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;

            height: 72px;
            padding: 0 40px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: rgba(5, 7, 11, 0.85);
            backdrop-filter: blur(15px);

            border-bottom: 1px solid rgba(0, 140, 255, 0.25);

            box-shadow:
                0 5px 30px rgba(0, 110, 255, 0.08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
            display: block;

            filter:
                drop-shadow(0 0 6px rgba(0, 120, 255, 0.7))
                drop-shadow(0 0 14px rgba(0, 120, 255, 0.25));

            transition: 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.08);

            filter:
                drop-shadow(0 0 8px rgba(0, 140, 255, 0.9))
                drop-shadow(0 0 20px rgba(0, 140, 255, 0.4));
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #ffffff;
        }

        .logo span {
            color: #008cff;
            text-shadow: 0 0 15px rgba(0, 140, 255, 0.8);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-links a {
            color: #aeb9c8;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;

            transition: 0.25s ease;
        }

        .nav-links a:hover {
            color: #ffffff;
            background: rgba(0, 140, 255, 0.10);
            box-shadow: 0 0 15px rgba(0, 140, 255, 0.12);
        }

        .nav-links .add-btn {
            color: #ffffff;
            background: #0078ff;
            box-shadow: 0 0 18px rgba(0, 120, 255, 0.35);
        }

        .nav-links .add-btn:hover {
            background: #008cff;
            box-shadow: 0 0 25px rgba(0, 140, 255, 0.55);
            transform: translateY(-1px);
        }

        /* MAIN */

        .container {
            width: min(1200px, 92%);
            margin: 45px auto;
        }

        .page-title {
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 34px;
            margin-bottom: 8px;
        }

        .page-title p {
            color: #7f8b9b;
        }

        /* CARDS */

        .card {
            background: rgba(13, 18, 27, 0.85);
            border: 1px solid rgba(0, 140, 255, 0.18);
            border-radius: 14px;
            padding: 25px;

            box-shadow:
                0 10px 35px rgba(0, 0, 0, 0.35),
                inset 0 0 25px rgba(0, 110, 255, 0.025);

            transition: 0.3s ease;
        }

        .card:hover {
            border-color: rgba(0, 140, 255, 0.4);
            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.4),
                0 0 25px rgba(0, 110, 255, 0.08);
        }

        /* BUTTONS */

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;

            text-decoration: none;
            cursor: pointer;

            font-size: 14px;
            font-weight: 600;

            transition: 0.25s ease;
        }

        .btn-primary {
            background: #0078ff;
            color: white;
            box-shadow: 0 0 15px rgba(0, 120, 255, 0.25);
        }

        .btn-primary:hover {
            background: #008cff;
            box-shadow: 0 0 25px rgba(0, 140, 255, 0.5);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #151c27;
            color: #c8d2df;
            border: 1px solid #273344;
        }

        .btn-secondary:hover {
            border-color: #008cff;
            color: white;
        }

        /* FORMS */

        label {
            display: block;
            margin-bottom: 8px;
            color: #c8d2df;
            font-size: 14px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 14px;

            background: #080d14;
            color: white;

            border: 1px solid #263344;
            border-radius: 8px;

            outline: none;

            transition: 0.25s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #008cff;

            box-shadow:
                0 0 0 2px rgba(0, 140, 255, 0.08),
                0 0 18px rgba(0, 140, 255, 0.12);
        }

        textarea {
            resize: vertical;
        }

        /* MESSAGES */

        .success {
            margin-bottom: 20px;
            padding: 14px 16px;

            color: #8fffc1;
            background: rgba(0, 200, 120, 0.08);

            border: 1px solid rgba(0, 220, 130, 0.25);
            border-radius: 8px;
        }

        .error {
            margin-bottom: 20px;
            padding: 14px 16px;

            color: #ff9b9b;
            background: rgba(255, 50, 50, 0.08);

            border: 1px solid rgba(255, 70, 70, 0.25);
            border-radius: 8px;
        }

        /* MOBILE */

        @media (max-width: 700px) {

            .navbar {
                padding: 0 18px;
            }

            .logo {
                font-size: 18px;
            }

            .nav-links {
                gap: 3px;
            }

            .nav-links a {
                padding: 8px 9px;
                font-size: 13px;
            }

            .container {
                width: 94%;
                margin: 30px auto;
            }

            .page-title h1 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

    <div class="logo">
        CEC <span>TASK FLOW</span>
    </div>


        <div class="nav-links">

            <a href="{{ route('tasks.dashboard', [], false) }}">
                Dashboard
            </a>

            <a href="{{ route('tasks.index', [], false) }}">
                My Tasks
            </a>

            <a href="{{ route('tasks.create', [], false) }}" class="add-btn">
                + Add Task
            </a>

        </div>

    </nav>

    <main class="container">

        @yield('content')

    </main>

</body>
</html>

