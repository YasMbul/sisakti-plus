<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.user-layout')]
#[Title('Verifikasi SKP')]
class VerifikasiSkp extends Component
{
    public function render()
    {
        return view('livewire.admin.verifikasi-skp');
    }
}
