<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostLike extends Component
{
    public $post;
    public $likeCheck;
    public $likeCount;

    public function mount(){
        $this->likeCheck = $this->post->checkLike(Auth::user());
        $this->likeCount = $this->post->likes->count();
    }

    public function like(){
        if($this->likeCheck){
            $this->post->user->likes()->where('post_id', $this->post->id)->delete();
            $this->likeCheck = false;
            $this->likeCount--;
        }
        else{
            $this->post->likes()->create([
                'user_id' => Auth::user()->id,
                'post_id' => $this->post->id,
            ]);
            $this->likeCheck = true;
            $this->likeCount++;
        }
    }

    public function render()
    {
        return view('livewire.post-like');
    }
}
