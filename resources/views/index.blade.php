<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spots</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body>
    <iframe src="https://www.google.com/maps/d/embed?mid=10_-rDI5XFMmpxuJ4ia9TRmWojmTM84E&ehbc=2E312F&noprof=1" width="1436" height="600"></iframe>
    {{--検索機能ここから --}}
    <div class="search">
        <form action="{{ route('index') }}" method="GET">
            @csrf

            <div class="form-group">
                <div>
                    <label for="">キーワード
                    <div>
                        <input type="text" name="keyword" value="{{ $keyword }}">
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
            <td>{{ $item->name }}</td>
            <td>{{ $item->price_range }}</td>
            <td>{{ $item->category }}</td>
            {{--price_rangesテーブルとcategoriesテーブルを結合しているので、この記述でアクセスできる--}}
        </tr>
        @endforeach
        
    </table>

</body>
</html>
