<?php

namespace App\Http\Livewire;

use App\Article;
use Livewire\Component;

class ArticleCreate extends Component
{
    public $title;
    public $description;
     /**
     * Render view article create
     */
    public function render()
    {
        return view('livewire.article-create');
    }
     /**
     * Save the newly created article resource in storage..
     * @return event listeners
     */
    public function store()
    {
        $this->validate([
            'title' => 'required|max:8',
            'description' => 'required|min:5',
        ]);
        $article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);
        $this->resetInput();
        $this->emit('articleStored', $article);
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
