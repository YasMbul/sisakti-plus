<?php

namespace App\Livewire\Admin\VerifikasiSkp;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Layout('layouts.user-layout')]
#[Title('Verifikasi SKP')]
class Index extends Component
{
   use WithPagination;

   public $search = '';

   public function getAvatar(mixed $user)
   {
      return $user->picture
         ? asset('storage/' . $user->picture)
         : 'https://ui-avatars.com/api/?name=' .
               urlencode($user->name ?? 'User') .
               '&background=' .
               substr(md5($user->name ?? 'User'), 0, 6) .
               '&color=fff';
   }

   public function render()
   {
      $user = auth()->user();
      $twoYearsAgo = now()->subYears(2)->startOfYear();

      $query = $user->faculty
         ->users()
         ->with([
            'skps' => function ($q) use ($twoYearsAgo) {
               $q->where('status', 'pending')
                  ->where('start_date', '>=', $twoYearsAgo)
                  ->oldest('created_at');
            },
         ])
         ->where('faculty_id', $user->faculty_id)
         ->where('role', 'mahasiswa')
         ->whereHas('skps', function ($q) use ($twoYearsAgo) {
            $q->where('status', 'pending')->where('start_date', '>=', $twoYearsAgo);
         })
         ->withMin(
            [
               'skps' => function ($q) use ($twoYearsAgo) {
                  $q->where('status', 'pending')->where('start_date', '>=', $twoYearsAgo);
               },
            ],
            'created_at',
         );

      if ($this->search) {
         $query->where(function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')->orWhere(
               'nim',
               'like',
               '%' . $this->search . '%',
            );
         });
      }

      $users = $query->orderBy('skps_min_created_at')->paginate(10);
      return view('livewire.admin.verifikasi-skp.index', compact('users'));
   }
}
