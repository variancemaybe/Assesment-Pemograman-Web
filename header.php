<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataran - Dining & Estate</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lora:wght@400;500&display=swap');

        :root {
            --bg-color: #1a1a1a;
            --text-color: #e8e2d2;
            --accent-color: #b89766;
            --nav-bg: #262420;
            --border-color: #3e3b33;
        }

        body {
            font-family: 'Lora', serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: var(--nav-bg);
            border-bottom: 2px solid var(--accent-color);
            padding: 2rem 0;
            text-align: center;
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            color: var(--accent-color);
            margin: 0 0 1rem 0;
            font-size: 3rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 2.5rem;
        }

        nav a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: color 0.3s ease;
            position: relative;
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -5px;
            left: 0;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }

        nav a:hover {
            color: var(--accent-color);
        }

        nav a:hover::after {
            width: 100%;
        }

        main {
            flex: 1;
            padding: 3rem 2rem;
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        h2, h3 {
            font-family: 'Playfair Display', serif;
            color: var(--accent-color);
            font-weight: 400;
            margin-top: 0;
        }
        
        .content-box {
            background-color: var(--nav-bg);
            border: 1px solid var(--border-color);
            padding: 2.5rem;
            border-radius: 4px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.4);
            line-height: 1.8;
        }
    </style>
</head>
<body>

<header>
    <h1>Plataran</h1>
    <nav>
        <ul>
            <li><a href="index.php?p=home">Home</a></li>
            <li><a href="index.php?p=reservasi">Reservasi</a></li>
            <li><a href="index.php?p=about">About</a></li>
        </ul>
    </nav>
</header>

<main>
