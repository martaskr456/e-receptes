<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sākums - e-Receptes</title>
    <link rel="stylesheet" href="{{ asset('css/styles_auth.css') }}">
    <!-- Include any other CSS or JavaScript files -->
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <nav class="filters-nav">
        <div class="filters">
            <label for="sort">Kārtošana pēc:</label>
            <select id="sort">
                <option value="nosaukums">Nosaukums</option>
                <option value="laiks">Gatavošanas laiks</option>
            </select>
            <label for="category">Kategorija:</label>
            <select id="category">
                <option value="zupas">Zupas</option>
                <option value="kukas">Kūkas</option>
                <!-- Ielieciet citas kategorijas pēc vajadzības -->
            </select>
            <label for="vegetarian">Veģetārisks:</label>
            <input type="checkbox" id="vegetarian">
            <label for="gluten-free">Bezglutēna:</label>
            <input type="checkbox" id="gluten-free">
        </div>
        <button class="add-recipe-btn">Pievienot</button>
    </nav>

    <main>
        <aside>
            <h3>Ēdienreize</h3>
            <ul class="side-list">
                <li><a href="brokastis.html">Brokastis</a></li>
                <li><a href="pusdienas.html">Pusdienas</a></li>
                <li><a href="vakarinas.html">Vakariņas</a></li>
                <li><a href="uzkodas.html">Uzkodas</a></li>
                <li><a href="dzerieni.html">Dzērieni</a></li>
            </ul>
            <h3>Receptes</h3>
            <ul class="side-list">
                <li><a href="zupas.html">Zupas</a></li>
                <li><a href="salati.html">Salāti un uzkodas</a></li>
                <li><a href="pamatedieni.html">Pamatēdieni</a></li>
                <li><a href="merces.html">Mērces</a></li>
                <li><a href="kukas.html">Kūkas</a></li>
                <li><a href="deserti.html">Deserti</a></li>
                <li><a href="marinejumi.html">Marinējumi</a></li>
                <li><a href="pankukas.html">Pankūkas</a></li>
            </ul>
        </aside>
        <section>
            <article id="recipe1" class="recipe">
                <a href="recipe1.html">
                    <img src="images/pancake.jpg" alt="Food photo">
                </a>
                <div class="recipe-data">
                    <div class="recipe-title"> Biezās pankūkas</div>
                    <div class="recipe-time"> 30min</div>
                </div>
            </article>
            <article id="recipe2" class="recipe">
                <a href="recipe2.html">
                    <img src="images/patato_pancake.jpg" alt="Food photo">
                </a>
                <div class="recipe-data">
                    <div class="recipe-title"> Kartupeļu pankūkas</div>
                    <div class="recipe-time"> 30min</div>
                </div>
            </article>
            <article id="recipe3" class="recipe">
                <a href="recipe3.html">
                    <img src="images/pumkin.jpg" alt="Food photo">
                </a>
                <div class="recipe-data">
                    <div class="recipe-title"> Ķirbju krēmzupa</div>
                    <div class="recipe-time"> 30min</div>
                </div>
            </article>
        </section>
    </main>

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