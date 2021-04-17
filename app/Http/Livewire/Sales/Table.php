<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.sales.table', [
            'sales',
        ]);
    }
}