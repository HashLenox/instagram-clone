<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    public $posts;


   #[On('post-created')]

    function postCreated($id)
    {
        $post= Post::find($id);

        $this->posts=$this->posts->prepend($post);
    }



    function mount()
    {
        $this->posts = Post::latest()->get(); // Fetch 20 random posts
    }


    public function render()
    {
        return view('livewire.home');
    }
}
