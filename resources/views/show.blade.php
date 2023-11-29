<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spots</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            h1{
                padding: 18px;
                
            }
            .box28 {
                position: relative;
                margin: 2em 0;
                padding: 25px 10px 7px;
                width: 90%;
                border: solid 2px #FFC107;
            }
            .box28 .box-title {
                position: absolute;
                display: inline-block;
                top: -2px;
                left: -2px;
                padding: 0 9px;
                height: 25px;
                line-height: 25px;
                font-size: 17px;
                background: #FFC107;
                color: #ffffff;
                font-weight: bold;
            }
            .box28 p {
                margin: 0; 
                padding: 0;
            }
        </style>
    </head>
    <body class="space-x-4">
        <h1 class="text-2xl">
            {{ $spot->name }}
        </h1>
        <form action="/spot/review" method="POST">
            @csrf
            <div class="title">
                <h2>レビューを投稿</h2>
                <input type="text" name="comment" placeholder="コメント"/>
            </div>
            <input type="hidden" value="{{ $spot->id }}" name="spot_id"/>
            <input type="submit" class="text-blue-600" value="投稿"/>
        </form>
        <div class="box28">
            <span class="box-title">レビュー</span>
            <p>
                @foreach($spot->reviews as $review)
                        <div class="mb-4">{{ $review->comment }}</div>
                
                @if(auth()->user())
                
                            <td class="px-6 py-4 text-right">
                                <form action="/review/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button" onclick="deleteSpot({{ $review->id }})">delete</button> 
                                </form>
                            </td>
            
                    @endif
                    @endforeach
                    
            </p>
        </div>
        <div class="footer">
            <a href="/" class="no-underline">戻る</a>
        </div>
        <script>
        function deleteSpot(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
    </body>
</html>