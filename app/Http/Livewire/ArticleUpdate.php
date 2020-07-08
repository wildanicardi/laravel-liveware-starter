<?php

namespace App\Http\Livewire;

use App\Article;
use Livewire\Component;

class ArticleUpdate extends Component
{
    public $title;
    public $description;
    public $articleId;
    protected $listeners = [
        'getArticle' => 'showArticle'
    ];
    /**
     * Render view article update
     */
    public function render()
    {
        return view('livewire.article-update');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return event listeners
     */
    public function showArticle($article)
    {
        $this->title = $article['title'];
        $this->description = $article['description'];
        $this->articleId = $article['id'];
    }
    /**
     * update the newly created article resource in storage..
     * @return event listeners
     */
    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required|min:5',
        ]);
        if ($this->articleId) {
            $article = Article::findOrFail($this->articleId);
            $article->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            $this->resetInput();
            $this->emit('articleUpdate', $article);
        }
    }
    /**
     * Reset form input.
     */
    public function resetInput()
    {
        $this->title = null;
        $this->description = null;
    }
}
