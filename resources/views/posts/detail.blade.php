<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spots</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <style>
        body{
            padding-left: 18px;
        }
        h1 {
              padding: 0.4em 0.5em;/*文字の上下 左右の余白*/
              color: #494949;/*文字色*/
              background: #f4f4f4;/*背景色*/
              border-left: solid 5px #7db4e6;/*左線*/
              border-bottom: solid 3px #d7d7d7;/*下線*/
        }
    </style>
</head>
<body>
    <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        @if(auth()->user())
            @if($post->user_id == auth()->id())
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
            <td>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                </form>
            </td>
            @endif
        @endif
        </tr>

    <script>
        function deletePost(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</body>
</html>
