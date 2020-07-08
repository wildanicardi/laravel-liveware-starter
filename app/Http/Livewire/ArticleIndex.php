<?php

namespace App\Http\Livewire;

use App\Article;
use Livewire\Component;

class ArticleIndex extends Component
{
    public $articles;
    public $statusUpdate = false;
    protected $listeners = [
        'articleStored' => 'handleStored',
        'articleUpdate' => 'handleUpdate',
    ];
    /**
     * Render view article index
     */
    public function render()
    {
        $this->articles = Article::latest()->get();
        return view('livewire.article-index');
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