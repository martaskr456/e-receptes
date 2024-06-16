<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakti - Recepšu e-grāmata</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <div class="content_contact">
        <section id="contact">
            <h2>Kontakti</h2>
            <p>Ja jums ir jautājumi, komentāri vai ierosinājumi, lūdzu, sazinieties ar mums, izmantojot zemāk norādīto informāciju:</p>

            <div class="contact-info">
                <p><strong>E-pasts:</strong> info@receptes.lv</p>
                <p><strong>Telefons:</strong> +371 12345678</p>
                <p><strong>Adrese:</strong> Brīvības iela 123, Rīga, Latvija</p>
            </div>

            <form action="{{ route('submit_contact_form') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Vārds:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-pasts:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Ziņojums:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit">Nosūtīt</button>
            </form>
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

        </section>
    </div>

    <footer>
        <!-- Jūsu kājenes saturs -->
    </footer>

</body>
</html>
