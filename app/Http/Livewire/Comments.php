<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;

class Comments extends Component
{
    public $newComment;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, ['newComment'=> 'required'] );
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
       
        session()->flash('message', 'Comment Deleted successfully  ');

        // dd($comment);
    }

    public function addComment()
    {
        $this->validate(['newComment'=> 'required|max:255']);
        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => 1]);
        $this->newComment = "";

        session()->flash('message', 'Comment Send successfully  😇');
    }

    public function render()
    {
        return view('livewire.comments' , ['comments' => Comment::latest()->paginate(2)]);
    }
}
