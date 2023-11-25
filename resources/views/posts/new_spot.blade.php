<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>施設登録</title>
    </head>
    <body>
        <h1>施設</h1>
        <form action="/spots/create" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="spot[name]" placeholder="タイトル" value="{{ old('spot.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('spot.name') }}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="spot[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="category">
                <h2>PriceRange</h2>
                <select name="spot[price_range_id]">
                    @foreach($price_ranges as $price_range)
                        <option value="{{ $price_range->id }}">{{ $price_range->price_range }}</option>
                    @endforeach
                </select>
            </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>