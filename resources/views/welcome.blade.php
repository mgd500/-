<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <h1>　WorkSpot　　　　　　　　　　　ワークスペース検索サイト</h1>
        <iframe src="https://www.google.com/maps/d/embed?mid=10_-rDI5XFMmpxuJ4ia9TRmWojmTM84E&ehbc=2E312F&noprof=1" width="1436" height="600"></iframe>
    {{--検索機能ここから --}}
    <div class="search">
        <form action="{{ route('index') }}" method="GET">
            @csrf

            <div class="form-group">
                <div>
                    <label for="">キーワード
                    <div>
                        <input type="text" name="keyword">
                    </div>
                    </label>
                </div>

                <div>
                    <label for="">価格帯
                    <div>
                        <select name="price_range" data-toggle="select">
                            <option value="">全て</option>
                            @foreach ($price_ranges_list as $price_ranges_item)
                                <option value="{{ $price_ranges_item->price_range }}" @if($price_range=='{{ $price_ranges_item->price_range }}') selected @endif>{{ $price_ranges_item->price_range }}</option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>

                <div>
                    <label for="">施設タイプ
                    <div>
                        <select name="category" data-toggle="select">
                            <option value="">全て</option>
                            @foreach ($categories_list as $categories_item)
                                <option value="{{ $categories_item->category }}" @if($category=='{{ $categories_item->category }}') selected @endif>{{ $categories_item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>

                <div>
                    <input type="submit" class="btn" value="検索">
                </div>
            </div>
        </form>
    </div>
    {{-- 検索機能ここまで --}}

    <table>
        <tr>
            <th>スポット名</th>
            <th>価格帯</th>
            <th>施設タイプ</th>
        </tr>

        @foreach ($items as $item)
        <tr>
        
            <td><a href="/spots/{{ $item->spot_id }}">{{ $item->name }}</a></td>
            <td>{{ $item->price_range }}</td>
            <td>{{ $item->category }}</td>
            {{--price_rangesテーブルとcategoriesテーブルを結合しているので、この記述でアクセスできる--}}
        </tr>

</script>
        @endforeach
        
    </table>
    </body>
</html>
