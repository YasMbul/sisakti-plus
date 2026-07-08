<?php

namespace App\Livewire\Admin\VerifikasiSkp;

use App\Models\Skp;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.user-layout')]
#[Title('Detail Sertifikat SKP')]
class Detail extends Component
{
   public int $user_id;
   public int $skp_id;
   public string $errorMessage = '';

   public function mount(int $user_id, int $skp_id)
   {
      $this->user_id = $user_id;
      $this->skp_id = $skp_id;
   }

   public bool $showRejectModal = false;

   public function rejectSkp()
   {
      $this->dispatch('check-reject-comment');
   }

   #[On('reject-comment-valid')]
   public function proceedReject()
   {
      $skp = Skp::findOrFail($this->skp_id);
      $skp->update(['status' => 'rejected']);

      session()->flash('success', 'SKP berhasil ditolak.');
      $this->redirect(route('admin.verifikasi-skp.show', $this->user_id));
   }

   #[On('reject-comment-invalid')]
   public function cancelReject()
   {
      $this->dispatch('set-chat-error');
   }

   public function acceptSkp()
   {
      $skp = Skp::findOrFail($this->skp_id);

      if ($skp->status !== 'pending') {
         return redirect()->back()->with('error', 'SKP ini sudah diproses sebelumnya.');
      }

      $skp->update(['status' => 'approved']);

      return redirect(route('admin.verifikasi-skp.show', $this->user_id))->with(
         'success',
         'SKP berhasil disetujui.',
      );
   }

   public function render()
   {
      $skp = Skp::with(['skpDetail', 'semester', 'comments'])->findOrFail($this->skp_id);

      return view('livewire.admin.verifikasi-skp.detail', compact('skp'));
   }
}
