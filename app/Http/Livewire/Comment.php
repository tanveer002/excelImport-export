<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;


class Comment extends Component
{
    public $newComment;
    public $comments = [];

    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|max:255'
        ]);
    }
    public function addComment()
    {
        $this->validate([
            'newComment' => 'required'
        ]);
        $createComment = Comments::create([
            'comment' => $this->newComment,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $this->comments->prepend($createComment);
        $this->newComments = '';
        session()->flash('message', 'Comment Added Successfully');
    }

    public function mount()
    {
        $initailComments = Comments::latest()->get();
        $this->comments = $initailComments;
       
    }

    public function remove($commentId)
    {
        $comment = Comments::find($commentId);
        $comment->delete();
        $this->comments = $this->comments->except($commentId);
        session()->flash('message', 'Comment Deleted Successfully');
    }

    public function render()
    {
        
        return view('livewire.comment');
    }
}
