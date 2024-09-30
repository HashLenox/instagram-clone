<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    public $posts;

    #[On('closeModal')]
    function reverUrl()
    {
        $this->js("history.replaceState({},'','/')");
    }



   #[On('post-created')]

    function postCreated($id)
    {
        $post= Post::find($id);

        $this->posts=$this->posts->prepend($post);
    }



    function mount()
    {
        $this->posts = Post::with('comments')->latest()->get();

    }


    public function render()
    {
        return view('livewire.home');
    }
}
