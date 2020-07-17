<?php

namespace App\Http\Livewire;

use App\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;
    public $statusUpdate = false;
    public $paginate = 5;
    public $search;
    protected $listeners = [
        'articleStored' => 'handleStored',
        'articleUpdate' => 'handleUpdate',
    ];
    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    /**
     * Render view article index
     */
    public function render()
    {
        return view('livewire.article-index', [
            'articles' => $this->search === null ? Article::latest()->paginate($this->paginate) : Article::where('title', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return event listeners
     */
    public function getArticle($id)
    {
        $this->statusUpdate = true;
        $article = Article::find($id);
        $this->emit('getArticle', $article);
    }
    /**
     * Destroy Article.
     *
     * @param  \App\Article  $id
     * @return message
     */
    public function destroy($id)
    {
        if ($id) {
            $article = Article::findOrFail($id);
            $article->delete();
            session()->flash('message', 'Article id ' . $id . ' was deleted! ');
        }
    }
    /**
     * Display message store success
     */
    public function handleStored($article)
    {
        session()->flash('message', 'Article ' . $article['title'] . ' was stored! ');
    }
    /**
     * Display message update success
     */
    public function handleUpdate($article)
    {
        session()->flash('message', 'Article ' . $article['title'] . ' was updated! ');
    }
}
