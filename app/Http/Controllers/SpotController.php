<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;
use App\Models\Post;
use App\Models\PriceRange;
use App\Models\Category;
use App\Models\SpotReview;

class SpotController extends Controller
{
    public function index(Request $request, Post $post)
    {
        //検索フォームに入力された値を取得
        $price_range = $request->input('price_range');
        $category = $request->input('category');
        $keyword = $request->input('keyword');

        $query = Spot::query();
        $query->select('spots.id as spot_id', 'price_range', 'category', 'name', 'user_id');
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
        $posts = $post->get();
        //dd($posts);

        $price_ranges_list = PriceRange::all();
        $categories_list = Category::all();

        return view('welcome', compact('items', 'keyword', 'price_range', 'category', 'price_ranges_list', 'categories_list', 'posts'));
    }
    public function index2() {

        return view('spot.index');

    }

    public function list() {

        return \App\Spot::with('reviews.user')->get();

    }

    public function review(Request $request,SpotReview $review) {


        // バリデーション
        $request->validate([
            'spot_id' => [
                'required',
                'exists:spots,id',
                function($attribute, $value, $fail) use($request) {
                    }
                    
            ],
            'comment' => 'required'
        ]);

        $review->spot_id = $request->spot_id;
        $review->comment = $request->comment;
        $review->save();
        return redirect('/spots/' . $review->spot_id);

    }
    
    public function show(Spot $spot)
    {
        return view('show')->with(['spot' => $spot]);
    //'spot'はbladeファイルで使う変数。中身は$spotはid=1のSpotインスタンス。
    }
    
    public function create(PriceRange $price_range, Category $category)
    {
        return view('posts.new_spot')->with(['categories'=>$category->get(),'price_ranges'=>$price_range->get()]);
    }
    public function store(Request $request, Spot $spot)
    {
        $input = $request['spot'];
        $input += ['user_id' => \Auth::id()];
        $spot->fill($input)->save();
        return redirect('/spots/' . $spot->id);
    }
    public function delete(Spot $spot)
    {
        $spot->delete();
        return redirect('/');
    }
    
}
