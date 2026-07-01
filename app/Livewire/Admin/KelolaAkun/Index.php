<?php

namespace App\Livewire\Admin\KelolaAkun;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.user-layout')]
#[Title('Kelola Akun')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.kelola-akun.index');
    }
}
