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
    public function render()
    {
        return view('livewire.article-update');
    }
    public function showArticle($article)
    {
        $this->title = $article['title'];
        $this->description = $article['description'];
        $this->articleId = $article['id'];
    }

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
