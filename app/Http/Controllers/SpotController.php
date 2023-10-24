<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;
use App\Models\PriceRange;
use App\Models\Category;
use App\Models\SpotReview;

class SpotController extends Controller
{
    public function index(Request $request)
    {
        //検索フォームに入力された値を取得
        $price_range = $request->input('price_range');
        $category = $request->input('category');
        $keyword = $request->input('keyword');

        $query = Spot::query();
        $query->select('spots.id as spot_id', 'price_range', 'category', 'name');
        //テーブル結合
        $query->join('price_ranges', function ($query) use ($request) {
            $query->on('spots.price_range_id', '=', 'price_ranges.id');
        })->join('categories', function ($query) use ($request) {
            $query->on('spots.category_id', '=', 'categories.id');
        });

        if(!empty($price_range)) {
            $query->where('price_range', 'LIKE', $price_range);
        }

        if(!empty($category)) {
            $query->where('category', 'LIKE', $category);
        }

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();

        $price_ranges_list = PriceRange::all();
        $categories_list = Category::all();

        return view('welcome', compact('items', 'keyword', 'price_range', 'category', 'price_ranges_list', 'categories_list'));
    }
    public function index2() {

        return view('spot.index');

    }

    public function list() {

        return \App\Spot::with('reviews.user')->get();

    }

    public function review(Request $request) {

        $result = false;

        // バリデーション
        $request->validate([
            'spot_id' => [
                'required',
                'exists:spots,id',
                function($attribute, $value, $fail) use($request) {
                    }
                    
            ],
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        $review = new \App\SpotReview();
        $review->spot_id = $request->spot_id;
        $review->stars = $request->stars;
        $review->comment = $request->comment;
        $result = $review->save();
        return ['result' => $result];

    }
    
    public function show(Spot $spot)
    {
        return view('show')->with(['spot' => $spot]);
    //'spot'はbladeファイルで使う変数。中身は$spotはid=1のSpotインスタンス。
    }
    
    public function store(Request $request, SpotReview $review)
    {
        $input = $request['spot'];
        $review->fill($input)->save();
        return redirect('/spots/' . $input['spot_id']);
    }
    
}
