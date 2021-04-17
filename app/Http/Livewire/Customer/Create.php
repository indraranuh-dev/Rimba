<?php

namespace App\Http\Livewire\Customer;

use App\Constants\DiscountType;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Customer\Entities\Customer;

class Create extends Component
{
    use WithFileUploads;

    public $name, $contact, $email, $address, $discount, $discount_type = '', $ktp, $image;

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'contact' => 'required',
            'email' => 'required|email|min:4|max:191|' . Rule::unique('customers', 'email'),
            'address' => 'required|min:10',
            'discount' => 'nullable|integer|min:1|max:99',
            'discount_type' => 'nullable',
            'ktp' => 'required|size:16',
            'image' => 'required|max:512|mimes:png,jpg,jpeg,webp|image',
        ];
    }

    public function createCustomer()
    {
        $this->validate();

        Customer::create([
            'id' => Str::uuid()->getHex(),
            'name' => $this->name,
            'contact' => $this->contact,
            'email' => $this->email,
            'address' => $this->address,
            'discount' => $this->discount ? $this->discount : 0,
            'discount_type' => $this->discount_type ? $this->discount_type : '-',
            'ktp' => $this->ktp,
            'image_path' => $this->image->store('images/customers', 'public'),
        ]);

        $this->dispatchBrowserEvent('created', 'Pelanggan berhasil ditambahkan !');
        $this->emitTo('customer.table', 'refreshTable');
        $this->reset();
    }

    public function render(DiscountType $discountType)
    {
        return view('livewire.customer.create', [
            'discount_types' => $discountType->getAll(),
        ]);
    }
}