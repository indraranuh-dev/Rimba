<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use Modules\Item\Entities\Item;

class CreateDetail extends Component
{
    public $details = [];

    public function mount()
    {
        $this->push();
    }

    public function push()
    {
        $arr = [
            'id' => count($this->details) + 1,
            'item' => null,
            'qty' => null,
            'subTotal' => null,
            'isComplete' => false,
        ];

        $a = 1;
        for ($i = 0; $i < $a; $i++) {
            array_push($this->details, $arr);
        }
    }

    public function updatedDetails()
    {
        foreach ($this->details as $i => $detail) {
            if ($detail['item'] && $detail['qty']) {

                $item = Item::find($detail['item']);
                $detail = [
                    'id' => $i + 1,
                    'item' => $detail['item'],
                    'qty' => $detail['qty'],
                    'subTotal' => $item->unit_price * $detail['qty'],
                    'isComplete' => true,
                ];

                array_pop($this->details);
                array_push($this->details, $detail);
            }
        }
    }

    public function addRow()
    {
        $this->push();
    }

    public function deleteRow($id)
    {
        array_splice($this->details, $id, 1);
    }

    public function render(Item $item)
    {
        return view('livewire.sales.create-detail', [
            'items' => $item->orderBy('item_name')->get(),
        ]);
    }
}