<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Articles;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function index() {
        if(request('tag')) {
            $tag = Tag::where('name', request('tag'))->firstOr(function () {
                $tag = request('tag');
            });
            if($tag) {
                $articles = $tag->articles;
            } else {
                $articles = [];
            }
        } else {
            $articles = Articles::latest()->get();
        }

        return view('articles', [
            'articles' => $articles
        ]);
    }

    public function show(Articles $article) {
        return view('articles.show', [
            'article' => $article,
            'user' => User::where('id', $article->user_id)
        ]);
    }

    public function create() {
        return view('articles.create');
    }

    public function store() {

        // Articles::create($this->validateArticle());

        $article = new Articles($this->validateArticle());
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));
        return redirect(route('articles.index'));

    }

    public function edit(Articles $article) {
        return view('articles.edit', [
            'article' => $article,
            'tags' => Tag::all()
        ]);
    }

    public function update(Articles $article) {
        $article->update($this->validateArticle());
        $article->tags()->detach(Tag::all());
        $article->tags()->attach(request('tags'));
        return redirect(route('articles.show', $article));
    }

    protected function validateArticle() {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
