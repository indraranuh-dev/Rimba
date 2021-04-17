<?php

namespace App\Http\Livewire\Item;

use App\Constants\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Item\Entities\Item;

class Create extends Component
{
    use WithFileUploads;

    public $name, $image, $unit = '', $stock, $price, $isDraft, $isNew, $showInCatalogue;

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:191|' . Rule::unique('items', 'item_name'),
            'image' => 'required|max:512|mimes:png,jpg,jpeg,webp|image',
            'unit' => 'required|',
            'stock' => 'required|integer|min:1|max:99',
            'price' => 'required|min:3|max:191',
            'isDraft' => 'nullable|boolean',
            'isNew' => 'nullable|boolean',
            'showInCatalogue' => 'nullable|boolean',
        ];
    }

    public function createItem()
    {
        $this->validate();

        Item::create([
            'item_name' => $this->name,
            'item_slug_name' => Str::slug($this->name),
            'unit' => $this->unit,
            'image_path' => $this->image->store('images/items', 'public'),
            'stock' => $this->stock,
            'unit_price' => $this->price,
            'is_draft' => $this->isDraft ? 1 : 0,
            'is_new' => $this->isNew ? 1 : 0,
            'show_in_catalogue' => $this->showInCatalogue ? 1 : 0,
        ]);

        $this->dispatchBrowserEvent('created', 'Barang berhasil ditambahkan !');
        $this->emitTo('item.table', 'refreshTable');
        $this->reset();
    }

    public function render(Unit $unit)
    {
        return view('livewire.item.create', [
            'units' => $unit->getAll(),
        ]);
    }
}