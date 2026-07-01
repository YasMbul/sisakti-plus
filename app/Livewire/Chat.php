<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;

class Chat extends Component
{
   public int $skpId;
   public string $message = '';
   public ?int $replyToId = null;
   public $comments;

   public function mount(int $skpId)
   {
      $this->skpId = $skpId;
      $this->loadComments();
   }

   public function loadComments()
   {
      $this->comments = Comment::where('skp_id', $this->skpId)
         ->whereNull('parent_id')
         ->with(['user', 'replies.user'])
         ->oldest()
         ->get();
   }

   public function sendMessage()
   {
      $this->validate([
         'message' => 'required|min:3',
      ]);

      $this->dispatch('reject-data');
      
      Comment::create([
         'skp_id' => $this->skpId,
         'user_id' => auth()->user()->id,
         'body' => trim($this->message),
         'parent_id' => $this->replyToId,
      ]);

      $this->message = '';
      $this->replyToId = null;
      $this->loadComments();
   }

   public function setReply(int $commentId)
   {
      $this->replyToId = $commentId;
   }

   public function cancelReply()
   {
      $this->replyToId = null;
   }

   public function closeChat()
   {
      $this->reset(['skpId', 'message', 'replyToId']);
      $this->dispatch('closeChat');
   }

   #[On('skp-rejected')]
   public function refresh()
   {
      $this->loadComments();
   }

   public function render()
   {
      return view('livewire.chat');
   }
}
