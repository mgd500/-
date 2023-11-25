<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <iframe src="https://www.google.com/maps/d/embed?mid=10_-rDI5XFMmpxuJ4ia9TRmWojmTM84E&ehbc=2E312F&noprof=1" width="1436" height="600"></iframe>
    {{--検索機能ここから --}}
    <div class="search">
        <form action="{{ route('index') }}" method="GET">
            @csrf

            <div class="form-group flex flex-row mt-5 space-x-4">
                <div class="ml-8">
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
                    <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6" value="検索">
                </div>
            </div>
        </form>
    </div>
    {{-- 検索機能ここまで --}}
<div class="flex">
    <div class="relative overflow-x-auto shadow-md mt-8 w-[80%]">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <div class="color">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        施設名
                    </th>
                    <th scope="col" class="px-6 py-3">
                        価格帯
                    </th>
                    <th scope="col" class="px-6 py-3">
                        施設タイプ
                    </th>
                </tr>
                </div>
            </thead>
            @foreach ($items as $item)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a class="text-blue-400 underline" href="/spots/{{ $item->spot_id }}">{{ $item->name }}</a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->price_range }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->category }}
                    </td>
                    @if(auth()->user())
                        @if($item->user_id == auth()->id())
                            <td class="px-6 py-4 text-right">
                                <form action="/spots/{{ $item->spot_id }}" id="form_{{ $item->spot_id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button" onclick="deleteSpot({{ $item->spot_id }})">delete</button> 
                                </form>
                            </td>
                        @endif
                    @endif
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
<div class="w-[40%] mt-8">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        関連記事
                    </th>
                </tr>
            </thead>
            @foreach ($posts as $post)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4"><a class="text-blue-400 underline" href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
                </tr>
            </tbody>
            @endforeach
</div>
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
