<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class PostShow extends Component
{
    public Post $post;
    public function mount(Post $post){

    }
    public function render()
    {
        return view('livewire.post.post-show');
    }
}
