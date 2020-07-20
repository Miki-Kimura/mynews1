<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\News;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        
        if (count($posts) >0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        // news/index.blade.php ファイルを渡している
        // また　Viewテンプレートに headline、posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
