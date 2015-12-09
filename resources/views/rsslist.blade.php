<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <header id="header">
                <div class="title">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="meta">
                    <a href="{{ $link }}" target="_blank">{{ $link }}</a> - <span>{{ $date }}</span>
                </div>
                <div class="description">
                    <h3>{{ $description }}</h3>
                </div>
            </header>
            <div class="content">
                <div class="items">
                    <div class="arrow arrow-left" data-dir="-1"></div>
                    <div class="arrow arrow-right" data-dir="1"></div>
                    @foreach ($items as $item)
                        <div class="item">
                            <p class="meta">{{ $item->pubDate }}, às {{ $item->pubTime }}</p>
                            <h2><a href="{{ $item->link }}">{{ $item->title }}</a></h2>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- SCRIPTS -->
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="{{ URL::asset('js/script.js') }}"></script>
    </body>
</html>
