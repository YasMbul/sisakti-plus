<?php

namespace App\Livewire\Admin\KelolaAkun;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.user-layout')]
#[Title('Tambah Akun')]
class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.kelola-akun.create');
    }
}
