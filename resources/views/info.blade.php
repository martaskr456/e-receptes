<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par mums - Recepšu e-grāmata</title>
    <link rel="stylesheet" href="{{ asset('css/styles_par_kon.css') }}">
    <style>
        .content_info {
            margin: 20px;
        }
        .language-switcher {
            margin-top: 10px;
        }
        .language-switcher a {
            text-decoration: none;
            margin: 0 10px;
            color: #FF8C00;
            font-weight: bold;
            cursor: pointer;
        }
        .lang-lv, .lang-en {
            display: none;
        }
        .lang-lv.active, .lang-en.active {
            display: block;
        }
    </style>
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <div class="content_info">
        <section id="about" class="lang-lv active">
            <h2>Par mums</h2>
            <p>Recepšu e-grāmata ir vieta, kur mēs kopīgojam savas labākās un autentiskākās receptes no dažādām pasaules virtuvēm.</p>
            <p>Mūsu mērķis ir dalīties ar mūsu kulināro pieredzi.</p>
            <p>Mēs cenšamies nodrošināt, ka mūsu receptes ir viegli sasniedzamas un saprotamas, neatkarīgi no jūsu gatavošanas pieredzes līmeņa.</p>
            <p>Ja jums ir jautājumi vai ierosinājumi, lūdzu, sazinieties ar mums, izmantojot mūsu kontaktinformāciju.</p>
        </section>
        <section id="about" class="lang-en">
            <h2>About Us</h2>
            <p>The e-Recipe Book is a place where we share our best and most authentic recipes from various world cuisines.</p>
            <p>Our goal is to share our culinary experience.</p>
            <p>We strive to ensure that our recipes are easily accessible and understandable, regardless of your cooking experience level.</p>
            <p>If you have any questions or suggestions, please contact us using our contact information.</p>
        </section>
    </div>

    <footer>
        <p>
            &copy; <span id="info">2024 <br></span>
            <span class="footer-logo">TT2 eksāmena darbs - </span>
            <strong><i>"E-receptes" </i></strong><br>
            Autors: <ins>Marta Karīna Skrastiņa (ms23123) & Ivo Aļļēns (ia23031)</ins>
        </p>
        <div class="language-switcher">
            <a id="switch-en">EN</a> | 
            <a id="switch-lv">LV</a>
        </div>
    </footer>

    <script>
        document.getElementById('switch-en').addEventListener('click', function() {
            document.querySelector('.lang-lv').classList.remove('active');
            document.querySelector('.lang-en').classList.add('active');
        });

        document.getElementById('switch-lv').addEventListener('click', function() {
            document.querySelector('.lang-en').classList.remove('active');
            document.querySelector('.lang-lv').classList.add('active');
        });
    </script>
</body>
</html>
