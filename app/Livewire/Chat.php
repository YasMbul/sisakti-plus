<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;

class Chat extends Component
{
   public ?int $skpId = null;
   public string $chat = '';
   public ?int $replyToId = null;
   public $comments;
   public string $bubbleClass = 'max-h-100 min-h-40';
   public string $containerClass = '';

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
         'chat' => 'required|min:3',
      ]);

      $this->dispatch('reject-data');

      Comment::create([
         'skp_id' => $this->skpId,
         'user_id' => auth()->user()->id,
         'body' => trim($this->chat),
         'parent_id' => $this->replyToId,
      ]);

      $this->chat = '';
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
      // $this->reset(['skpId', 'chat', 'replyToId']);
      $this->dispatch('closeChat');
   }

   #[On('skp-rejected')]
   public function refresh()
   {
      $this->loadComments();
   }

   #[On('check-reject-comment')]
   public function checkRejectComment()
   {
      $this->resetErrorBag('chat');
      if (!$this->skpId) {
         $this->dispatch('reject-comment-invalid');
         return;
      }
      if (empty(trim($this->chat))) {
         $hasAdminComment = Comment::where('skp_id', $this->skpId)
            ->where('user_id', auth()->id())
            ->exists();

         if (!$hasAdminComment) {
            $this->dispatch('reject-comment-invalid');
            return;
         }
      }

      if (!empty(trim($this->chat))) {
         $this->sendMessage();
      }

      $this->dispatch('reject-comment-valid');
   }

   #[On('set-chat-error')]
   public function setChatError()
   {
      $this->addError('chat', 'Tulis alasan penolakan terlebih dahulu.');
   }

   public function render()
   {
      return view('livewire.chat');
   }
}
