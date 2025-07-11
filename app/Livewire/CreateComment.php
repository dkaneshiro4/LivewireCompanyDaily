<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateComment extends Component
{
    public Post $post;

    #[Validate('required|min:3|max:255')]
    public string $body = '';

    public function save(): void
    {
        $this->validate();

        $this->post->comments()->create([
            'body' => $this->body,
        ]);

        $this->dispatch('comment-added');

        $this->reset('body');
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}
