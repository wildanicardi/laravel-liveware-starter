<?php

namespace App\Http\Livewire;

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
}
