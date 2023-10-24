<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spots</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $spot->name }}
        </h1>
        @foreach($spot->reviews as $review)
                <div>{{ $review->comment }}</div>
        @endforeach
        <form action="/spots" method="POST">
            @csrf
            <div class="title">
                <h2>レビュー</h2>
                <input type="text" name="spot[comment]" placeholder="コメント"/>
            </div>
            <input type="hidden" value="{{ $spot->id }}" name="spot[spot_id]"/>
            <input type="submit" value="投稿"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>