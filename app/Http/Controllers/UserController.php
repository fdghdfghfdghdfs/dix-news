<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function users(User $model)
    {
      return view('pages.users.manage', [ 'users' => $model->all() ]);
    }

    public function user($user)
    {
      return view('pages.users.update', [ 'updateUser' => User::find($user) ]);
    }

    public function create_view()
    {
      return view('pages.users.add');
    }

    public function create(Request $request)
    {
      User::create([
            'name' => $request::post()['name'],
            'email' => $request::post()['email'],
            'password' => Hash::make($request::post()['password'])
          ]);
      return redirect('/users');
    }

    public function delete_view($user)
    {
      return view('pages.users.delete', [ 'deleteUser' => User::find($user) ]);
    }

    public function delete(Request $request)
    {
      User::find($request::post()['id'])->delete();
      return redirect('/users');
    }

    public function update(Request $request)
    {
      User::where('id', $request::post()['id'])
          ->update([
            'name' => $request::post()['name'],
            'email' => $request::post()['email']
          ]);
      return redirect('/users');
    }

    public function news(User $model)
    {
      $news = News::where('user_id', auth()->user()->id)->get();
      return view('pages.news.news', [ 'news' => $news ]);
    }

    public function newsSearch($search)
    {
      $news = News::where('user_id', auth()->user()->id)
                  ->where('title', 'LIKE', '%'.$search.'%')
                  ->orWhere('content', 'LIKE', '%'.$search.'%')
                  ->where('user_id', auth()->user()->id)
                  ->get();
      return view('pages.news.news', [ 'news' => $news, 'searchValue' => $search ]);
    }

}
