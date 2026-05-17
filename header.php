<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataran - Dining & Estate</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap');

        :root {
            --olive-bg: #898670;
            --olive-dark: #7a7a63;
            --cream-bg: #e5dfd2;
            --text-light: #ffffff;
            --text-dark: #333333;
            --gold-accent: #c4a661;
            --gold-hover: #b09557;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Inter', sans-serif;
        }

        body {
            font-family: var(--font-body);
            margin: 0;
            padding: 0;
            background-color: var(--olive-bg);
            color: var(--text-light);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* HEADER & NAVIGATION */
        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 2rem 4rem;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
        }

        .header-left,
        .header-right {
            display: flex;
            align-items: center;
            gap: 2rem;
            font-size: 0.85rem;
            letter-spacing: 1px;
            font-weight: 400;
        }

        .header-left span,
        .header-right span {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .header-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .header-center a {
            text-decoration: none;
            color: var(--text-light);
        }

        .logo-text {
            font-family: var(--font-heading);
            font-size: 2.5rem;
            font-style: italic;
            font-weight: 400;
            letter-spacing: 2px;
            margin: 0;
        }

        .btn-outline {
            border: 1px solid var(--text-light);
            padding: 0.6rem 1.5rem;
            text-decoration: none;
            color: var(--text-light);
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background-color: var(--text-light);
            color: var(--text-dark);
        }

        .btn-gold {
            background-color: var(--gold-accent);
            color: var(--text-light);
            border: none;
            padding: 0.8rem 2rem;
            text-decoration: none;
            font-family: var(--font-body);
            transition: background-color 0.3s;
            cursor: pointer;
            display: inline-block;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .btn-gold:hover {
            background-color: var(--gold-hover);
        }

        /* MAIN CONTENT STYLES */
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .page-content-wrapper {
            padding-top: 8rem;
            min-height: 60vh;
        }

        h2,
        h3 {
            font-family: var(--font-heading);
            font-weight: 400;
        }

        /* Bahasa Dropdown */
        .language-selector {
            position: relative;
            display: flex;
            align-items: center;
            height: 100%;
            padding-bottom: 0.5rem;
        }

        .language-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #ffffff;
            min-width: 220px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 101;
            border: 1px solid #e0e0e0;
        }

        .language-selector:hover .language-dropdown {
            display: block;
        }

        .dropdown-header {
            background-color: #1b63b8;
            color: #ffffff;
            padding: 12px 15px;
            font-family: var(--font-body);
            font-size: 0.9rem;
            text-align: center;
            letter-spacing: 1.5px;
        }

        .language-dropdown a {
            color: #333333;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            font-family: var(--font-body);
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: background-color 0.2s;
        }

        .language-dropdown a:hover {
            background-color: #f5f5f5;
            color: var(--gold-accent);
        }
    </style>
</head>

<body>

    <header>
        <div class="header-left">
            <span>&#9776; MENU</span>
            <div class="language-selector">
                <span>&or; ENGLISH</span>
                <div class="language-dropdown">
                    <div class="dropdown-header">SELECT LANGUAGE</div>
                    <a href="#">简体中文</a>
                    <a href="#">ENGLISH</a>
                    <a href="#">BAHASA INDONESIA</a>
                </div>
            </div>
        </div>
        <div class="header-center">
            <a href="index.php?p=home">
                <img src="logo-white.png" alt="Plataran" style="height: 65px; object-fit: contain;">
            </a>
        </div>
        <div class="header-right">
            <a href="index.php?p=admin" style="color: inherit; text-decoration: none;">ADMIN</a>
            <a href="index.php?p=contact" style="color: inherit; text-decoration: none;">CONTACT</a>
            <a href="index.php?p=reservasi" class="btn-outline">RESERVATIONS</a>
        </div>
    </header>

    <main>