<!-- resources/views/info.blade.php -->

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
        <nav id="navbar">
            <ul>
                <li class="brand">e-Receptes</li>
                <li><a href="{{ route('home') }}">Sākums</a></li>
                <li><a href="{{ route('info') }}">Par</a></li>
                <li><a href="{{ route('contact') }}">Kontakti</a></li>
            </ul>
        </nav>
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
        <!-- Jūsu kājenes saturs -->
    </footer>

</body>
</html>
