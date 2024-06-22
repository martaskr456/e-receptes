<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziņas - e-Receptes</title>
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <div class="container">
        <h1>Ziņas</h1>
        @if($messages->isEmpty())
            <p>Nav ziņu.</p>
        @else
            <ul class="messages-list">
                @foreach($messages as $message)
                    <li class="message-item {{ $message->is_read ? 'read' : 'unread' }}">
                        <div class="message-header">
                            <strong>{{ $message->name }} ({{ $message->email }})</strong>
                            <span>{{ $message->created_at }}</span>
                        </div>
                        <p>{{ $message->message }}</p>
                        <div class="message-actions">
                            @if($message->is_read)
                                <span class="read-status">Izlasīts</span>
                            @else
                                <a href="{{ route('admin.markMessageAsRead', $message->id) }}" class="mark-read-btn">Atzīmēt kā izlasītu</a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <footer>
        <p>
          &copy; <span id="info">2024 <br></span>
          <span class="footer-logo">TT2 eksāmena darbs - </span>
          <strong><i>"E-receptes" </i></strong><br>
          Autors: <ins>Marta Karīna Skrastiņa (ms23123) & Ivo Aļļēns (ia23031)</ins>
        </p>
    </footer>

</body>
</html>
