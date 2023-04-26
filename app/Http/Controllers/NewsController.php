<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Request;
class NewsController extends Controller
{
  public function create_view()
  {
    return view('pages.news.new');
  }

  public function view($newsId)
  {
    $news = News::find($newsId);
    $current = auth()->user()->id;
    if ($news && $news->user_id === $current) {
      News::find($newsId)->update([ 'hit' => $news->hit + 1 ]);
      return view('pages.news.view', [ 'news' => $news, 'can_view' => true]);
    } else {
      return view('pages.news.view', [ 'news' => null, 'can_view' => false]);
    }
  }

  public function create(Request $request)
  {
    News::create([
          'title' => $request::post()['title'],
          'content' => $request::post()['content'],
          'hit' => 0,
          'user_id' => $request::post()['user_id']
        ]);
    return redirect('/news');
  }

  public function delete_view($news)
  {
    return view('pages.news.delete', [ 'deleteNews' => News::find($news) ]);
  }

  public function delete(Request $request)
  {
    News::find($request::post()['id'])->delete();
    return redirect('/news');
  }

  public function update_view($news)
  {
    return view('pages.news.update', [ 'updateNews' => News::find($news) ]);
  }

  public function update(Request $request)
  {
    $news = News::find($request::post()['id']);
    $current = auth()->user()->id;
    if ($news->user_id === $current) {
      News::where('id', $request::post()['id'])
      ->update([
        'title' => $request::post()['title'],
        'content' => $request::post()['content']
      ]);
      return redirect('/news');
    } else {
      return redirect('/news');
    }
  }
}
