<?php

namespace App\Http\Livewire\Item;

use App\Constants\Unit;
use App\Traits\FileHandler;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Item\Entities\Item;

class Edit extends Component
{
    use WithFileUploads, FileHandler;

    public $itemID, $name, $image, $oldImage, $unit = '', $stock, $price, $isDraft, $isNew, $showInCatalogue;

    protected $listeners = [
        'getID' => 'findItem',
    ];

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:191|' . Rule::unique('items', 'item_name')->ignore($this->itemID),
            'image' => 'nullable|max:512|mimes:png,jpg,jpeg,webp|image',
            'unit' => 'required|',
            'stock' => 'required|integer|min:1|max:99',
            'price' => 'required|min:3|max:191',
            'isDraft' => 'nullable|boolean',
            'isNew' => 'nullable|boolean',
            'showInCatalogue' => 'nullable|boolean',
        ];
    }

    public function findItem($id)
    {
        $item = Item::find($id);
        $this->itemID = $item->id;
        $this->name = $item->item_name;
        $this->oldImage = $item->image_path;
        $this->unit = $item->unit;
        $this->stock = $item->stock;
        $this->price = $item->unit_price;
        $this->isDraft = $item->is_draft;
        $this->isNew = $item->is_new;
        $this->showInCatalogue = $item->show_in_catalogue;
    }

    public function updateItem()
    {
        $this->validate();

        $item = Item::findOrFail($this->itemID);
        $item->item_name = $this->name;
        $item->item_slug_name = Str::slug($this->name);
        $item->unit = $this->unit;

        if ($this->image) {
            $item->image_path = $this->image->store('images/items', 'public');
            $this->deleteMedia(explode('/', $this->oldImage)[2], 'items');
        }

        $item->stock = $this->stock;
        $item->unit_price = $this->price;
        $item->is_draft = $this->isDraft ? 1 : 0;
        $item->is_new = $this->isNew ? 1 : 0;
        $item->show_in_catalogue = $this->showInCatalogue ? 1 : 0;
        $item->save();

        $this->dispatchBrowserEvent('updated', 'Barang berhasil diperbarui !');
        $this->emitTo('item.table', 'refreshTable');
        $this->reset();
    }

    public function render(Unit $unit)
    {
        return view('livewire.item.edit', [
            'units' => $unit->getAll(),
        ]);
    }
}