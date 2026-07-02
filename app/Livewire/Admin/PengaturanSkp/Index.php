<?php

namespace App\Livewire\Admin\PengaturanSkp;

use App\Models\Unsur;
use App\Models\SkpDetail;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.user-layout')]
#[Title('Pengaturan SKP')]
class Index extends Component
{
   public ?int $selectedUnsurId = 1;

   // Inline edit
   public ?int $editingSkpDetailId = null;
   public ?int $editingBobot = null;

   // ─── Navigation ──────────────────────────────────────────────────

   public function selectUnsur(int $id): void
   {
      if ($this->selectedUnsurId === $id) {
         $this->selectedUnsurId = null;
         $this->cancelEdit();
         return;
      }
      $this->selectedUnsurId = $id;
      $this->cancelEdit();
   }

   // ─── Inline Edit ─────────────────────────────────────────────────

   public function startEdit(int $id, int $bobot): void
   {
      $this->editingSkpDetailId = $id;
      $this->editingBobot = $bobot;
   }

   public function cancelEdit(): void
   {
      $this->editingSkpDetailId = null;
      $this->editingBobot = null;
   }

   public function saveBobot(): void
   {
      $this->validate([
         'editingBobot' => ['required', 'integer', 'min:0', 'max:9999'],
      ]);

      SkpDetail::findOrFail($this->editingSkpDetailId)->update(['bobot' => $this->editingBobot]);

      $this->cancelEdit();
   }

   // ─── Render ──────────────────────────────────────────────────────

   public function render()
   {
      $unsurs = Unsur::orderBy('name')->get();
      $selectedUnsur = $this->selectedUnsurId ? Unsur::find($this->selectedUnsurId) : null;

      $skpDetails = $this->selectedUnsurId
         ? SkpDetail::with(['subUnsur', 'tingkat', 'partisipasi'])
            ->where('unsur_id', $this->selectedUnsurId)
            ->orderBy('id')
            ->get()
         : collect();

      return view(
         'livewire.admin.pengaturan-skp.index',
         compact('unsurs', 'selectedUnsur', 'skpDetails'),
      );
   }
}
