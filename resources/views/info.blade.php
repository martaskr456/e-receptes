<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par mums - Recepšu e-grāmata</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <div class="content_info">
        <section id="about">
            <h2>Par mums</h2>
            <p>Recepšu e-grāmata ir vieta, kur mēs kopīgojam savas labākās un autentiskākās receptes no dažādām pasaules virtuvēm.</p>
            <p>Mūsu mērķis ir dalīties ar mūsu kulināro pieredzi.</p>
            <p>Mēs cenšamies nodrošināt, ka mūsu receptes ir viegli sasniedzamas un saprotamas, neatkarīgi no jūsu gatavošanas pieredzes līmeņa.</p>
            <p>Ja jums ir jautājumi vai ierosinājumi, lūdzu, sazinieties ar mums, izmantojot mūsu kontaktinformāciju.</p>
        </section>
    </div>

    <footer>
        <p>
          &copy; <span id="info">2024 <br></span>
          <span class="footer-logo">TT2 eksāmena darbs - </span>
          <strong><i>"E-receptes" </i></strong><br>
          Autors: <ins>Marta Karīna Skrastiņa (mk23123) & Ivo Aļļēns (ia23031)</ins>
        </p>
    </footer>

</body>
</html>
