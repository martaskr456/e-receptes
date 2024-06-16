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
        <nav id="navbar">
            <ul>
                <li class="brand">e-Receptes</li>
                <li><a href="{{ route('home') }}">Sākums</a></li>
                <li><a href="{{ route('info') }}">Par</a></li>
                <li><a href="{{ route('contact') }}">Kontakti</a></li>
            </ul>
        </nav>
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
        <!-- Jūsu kājenes saturs -->
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
