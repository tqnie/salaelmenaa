<?php

namespace App\Livewire\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Posts extends Component
{
    use WithPagination;
    public Category $category;

    #[Url]
    public $search = '';
    public function mount(?Category $category) {}
    public function posts()
    {
        return Post::search($this->search)->latest()->paginate(10);
    }
    public function render()
    {
        return view('livewire.post.posts', ['posts' => $this->posts()]);
    }
}
