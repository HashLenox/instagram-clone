<?php

namespace App\Livewire\Post;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;


class Create extends ModalComponent
{
    use WithFileUploads;

    public $media=[];
    public $description;
    public $location;
    public $hide_like_view=false;
    public $allow_commenting=false;


    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    function submit()
    {

        // validate the uploaded data
        $this->validate([
            'media.*'=>'required|file|mimes:png,jpg,mp4,jpeg,mov|max:100000',
            'allow_commenting'=>'boolean',
            'hide_like_view'=>'boolean'
        ]);


        // determine the post is real or not
        $type= $this->getPostType($this->media);


        //create a post
        $post = Post::create([

            'user_id'=>Auth::user()->id,
            'description'=>$this->description,
            'location'=>$this->location,
            'allow_commenting'=>$this->allow_commenting,
            'hide_like_view'=>$this->hide_like_view,
            'type'=>$type

        ]);

        // add media to the post
        foreach ($this->media as $key => $media) {

            $mime = $this->getMime($media);

            $path= $media->store('media','public');

            $url= url(Storage::url($path));

            Media::create([
                'url'=>$url,
                'mime'=>$mime,
                'mediable_id'=>$post->id,
                'mediable_type'=>Post::class
            ]);

            $this->reset();
            $this->dispatch('close');
            $this->dispatch('post-created',$post->id);
        }
    }

    function getMime($media) : string
    {

        if (str()->contains($media->getMimeType(),'video')) {
            return 'video';
        } else {
            return 'image';
        }
    }

    function getPostType($media) :string
    {

        if (count($media)===1 && str()->contains($media[0]->getMimeType(),'video')) {
            return 'reel';
        } else {
            return 'post';
        }
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
