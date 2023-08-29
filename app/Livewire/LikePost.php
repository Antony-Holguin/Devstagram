<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;

    public $isLiked;

    public $likes;

    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->like->count();
    }



    public function like()
    {
        if($this->post->checklike(auth()->user())){
           $this->post->like()->where('post_id', $this->post->id)->delete();
           $this->isLiked = true;
           $this->likes--;
           
        }else{
            $this->post->like()->create([
                'user_id' => auth()->user()->id,
            ]);

            $this->isLiked = false;
            $this->likes++;
            
        }
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}
