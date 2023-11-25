<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spots</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <h1 class="text-2xl">
            {{ $spot->name }}
        </h1>
        @foreach($spot->reviews as $review)
                <div class="mb-4">{{ $review->comment }}</div>
        @endforeach
        <form action="/spot/review" method="POST">
            @csrf
            <div class="title">
                <h2>レビューを投稿</h2>
                <input type="text" name="comment" placeholder="コメント"/>
            </div>
            <input type="hidden" value="{{ $spot->id }}" name="spot_id"/>
            <input type="submit" class="text-blue-600" value="投稿"/>
        </form>
        <div class="footer">
            <a href="/" class="no-underline">戻る</a>
        </div>
    </body>
</html>