<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class PostShow extends Component
{
    public Post $post;
    public function mount(Post $post){
        SEOMeta::setTitle($post->title);
    }
    public function render()
    {
        return view('livewire.post.post-show');
    }
}
