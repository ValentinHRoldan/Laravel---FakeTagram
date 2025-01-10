<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostLike extends Component
{
    public $post;


    public function like(){
        if($this->post->checkLike(Auth::user())){
            $this->post->user()->likes()->where('post_id', $this->post->id)->delete();
        }
        else{
            $this->post->likes()->create([
                'user_id' => Auth::user()->id,
                'post_id' => $this->post->id,
            ]);
                
        }
    }

    public function render()
    {
        return view('livewire.post-like');
    }
}
