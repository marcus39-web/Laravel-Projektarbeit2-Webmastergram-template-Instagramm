<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webmastergram</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <style>
    .schriftzug-webmastergram {
        font-family: 'Montserrat', sans-serif;
        font-size: 4.5rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        color: #7c2944;
        text-align: center;
        margin-top: 2rem;
        margin-bottom: 2rem;
        text-shadow: 2px 2px 12px #e0cfd4;
    }
    </style>
    <style>
        body {
            background: linear-gradient(120deg, #ff2d20 0%, #18181b 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            color: #222;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .logo {
            width: 120px;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #fff;
            margin-bottom: 30px;
            text-shadow: 0 2px 8px #0008;
        }
        .actions {
            display: flex;
            gap: 2rem;
            margin-top: 20px;
        }
        .actions a {
            padding: 12px 32px;
            border-radius: 6px;
            background: #fff;
            color: #ff2d20;
            font-weight: 700;
            text-decoration: none;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px #0002;
            transition: background 0.2s, color 0.2s;
        }
        .actions a:hover {
            background: #ff2d20;
            color: #fff;
        }
    </style>
</head>
<body>
        <!-- Pinnwand mit echten Naturbildern -->
        <div style="position: relative; width: 600px; height: 350px; margin-bottom: 2rem;">
            <div style="position: absolute; left: 0; top: 0; width: 600px; height: 350px; background: #fff; border: 6px solid #7c2944; border-radius: 32px; box-shadow: 0 8px 32px #7c294488;"></div>
          
            <img src='/pinboard/winter1.jpg' alt='Winter Allgäu 1' style='position:absolute; left:40px; top:40px; width:170px; height:120px; object-fit:cover; border:4px solid #e0cfd4; border-radius:14px; box-shadow:2px 4px 16px #0002; transform:rotate(-4deg);'>
            <img src='/pinboard/winter2.jpg' alt='Winter Allgäu 2' style='position:absolute; left:240px; top:60px; width:140px; height:90px; object-fit:cover; border:4px solid #ffe5ec; border-radius:12px; box-shadow:2px 4px 16px #0002; transform:rotate(3deg);'>
            <img src='/pinboard/winter3.jpg' alt='Winter Allgäu 3' style='position:absolute; left:420px; top:30px; width:140px; height:110px; object-fit:cover; border:4px solid #e0cfd4; border-radius:14px; box-shadow:2px 4px 16px #0002; transform:rotate(-6deg);'>
            <img src='/pinboard/winter4.jpg' alt='Winter Allgäu 4' style='position:absolute; left:90px; top:190px; width:130px; height:90px; object-fit:cover; border:4px solid #ffe5ec; border-radius:12px; box-shadow:2px 4px 16px #0002; transform:rotate(5deg);'>
            <img src='/pinboard/winter5.jpg' alt='Winter Allgäu 5' style='position:absolute; left:270px; top:210px; width:210px; height:110px; object-fit:cover; border:4px solid #e0cfd4; border-radius:14px; box-shadow:2px 4px 16px #0002; transform:rotate(-2deg);'>
        </div>
    <div class="schriftzug-webmastergram" style="font-size:6rem; font-weight:900; letter-spacing:0.16em; color:#7c2944; text-shadow: 0 4px 24px #fff8, 0 2px 8px #7c2944aa; margin-bottom:2.5rem;">Webmastergram</div>
    <div class="actions">
        <a href="{{ route('login') }}">Log in</a>
        <a href="{{ route('register') }}">Registrieren</a>
    </div>
</body>
<footer>
    <p>&copy; 2026 Marcus. Alle Rechte vorbehalten.</p>
</footer>
</html>
