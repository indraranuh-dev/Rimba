<?php

namespace App\Http\Livewire\Item;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Item\Entities\Item;

class Table extends Component
{
    use WithPagination, FileHandler;

    public $search = '', $deleteID;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function getAll($keyword)
    {
        $item = Item::orderBy('created_at', 'desc');

        if ($keyword !== '') {
            $item->where(function ($query) use ($keyword) {
                $query->where('item_name', 'like', '%' . $keyword . '%')
                    ->orWhere('item_slug_name', 'like', '%' . $keyword . '%')
                    ->orWhere('stock', 'like', '%' . $keyword . '%')
                    ->orWhere('unit_price', 'like', '%' . $keyword . '%');
            });
        }

        return $item->simplePaginate(10);
    }

    public function find($id)
    {
        $this->emitTo('item.edit', 'getID', $id);
    }

    public function destroyItem()
    {
        $item = Item::findOrFail($this->deleteID);

        if ($item->image_path) {
            $this->deleteMedia(explode('/', $item->image_path)[2], 'items');
        }

        $item->delete();

        $this->dispatchBrowserEvent('deleted', 'Barang berhasil dihapus !');
        $this->reset('deleteID');
    }

    public function render()
    {
        return view('livewire.item.table', [
            'items' => $this->getAll($this->search),
        ]);
    }
}