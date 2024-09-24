<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $url = $this->getUrl('post');
        $mime= $this->getMime($url);


        return [
            'url'=>$url,
            'mime'=>$mime,
            'mediable_id'=>Post::factory(),
            'mediable_type'=>function(array $attributes){
                return Post::find($attributes['mediable_id'])->getMorphClass();
            }
        ];
    }


    function getUrl(  $type = 'post' ): string
    {
        switch ($type) {
        case 'post':
            $urls = [

                'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4',
                'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4',
                'https://images.unsplash.com/photo-1727112184202-ad5d9a803579?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHw0fHx8ZW58MHx8fHx8',
                'https://images.unsplash.com/photo-1726835479857-68943bccbf94?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwyNXx8fGVufDB8fHx8fA%3D%3D'


            ];
            return $this->faker->randomElement(array : $urls);
            break;


        case 'reel':
            $urls = [

                'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
                'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4'

            ];
            return $this->faker->randomElement(array : $urls);
            break;


        default:
        # code...
        break;
        }
    }


    function getMime ($url) : string
    {
        if (str()->contains ($url,'gtv-videos-bucket')) {
            return 'video';
        } else if(str()->contains ($url,'images.unsplash.com')) {
            return 'image';
        }

    }


    function reel() : Factory
    {
        $url = $this->getUrl('reel');
        $mime= $this->getMime($url);

        return  $this->state (state: function(array $attributes) use( $url,$mime){

            return [
                'url'=>$url,
                'mime'=>$mime,
            ];

        });
    }

    function post() : Factory
    {
        $url = $this->getUrl('post');
        $mime= $this->getMime($url);

        return  $this->state (state: function(array $attributes) use( $url,$mime){

            return [
                'url'=>$url,
                'mime'=>$mime,
            ];

        });
    }
}
