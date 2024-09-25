<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{

    public $posts;

    function mount()
    {
        $this->posts = Post::inRandomOrder()->take(20)->get(); // Fetch 20 random posts
    }


    public function render()
    {
        return view('livewire.home');
    }
}
