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

        return view('articles.index', [
            'articles' => Articles::latest()->paginate(3)
        ]);
    }

    public function show(Articles $article) {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    public function create() {
        $this->authorize('create', Articles::class);
        return view('articles.create', [
            'tags' => Tag::all()
        ]);

    }

    public function store() {

        $this->authorize('create', Articles::class);
        // Articles::create($this->validateArticle());

        $article = new Articles($this->validateArticle());
        $article->user_id = Auth::user()->id;
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
        $this->authorize('update', $article);

        $article->update($this->validateArticle());
        $article->tags()->detach(Tag::all());
        $article->tags()->attach(request('tags'));
        return redirect(route('articles.show', $article));
    }

    public function destroy(Articles $article){
        $article->delete();

        return redirect(route('articles.index'));
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
