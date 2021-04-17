<?php

namespace App\Http\Livewire\Customer;

use App\Constants\DiscountType;
use App\Traits\FileHandler;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Customer\Entities\Customer;

class Edit extends Component
{
    use WithFileUploads, FileHandler;

    public $customerID, $name, $contact, $email, $address, $discount, $discountType = '', $ktp, $image, $oldImage;

    protected $listeners = [
        'getID' => 'findCustomer',
    ];

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'contact' => 'required',
            'email' => 'required|email|min:4|max:191|' . Rule::unique('customers', 'email')->ignore($this->customerID),
            'address' => 'required|min:10',
            'discount' => 'nullable|integer|min:1|max:99',
            'discountType' => 'nullable',
            'ktp' => 'required|size:16',
            'image' => 'nullable|max:512|mimes:png,jpg,jpeg,webp|image',
        ];
    }

    public function findCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $this->customerID = $customer->id;
        $this->name = $customer->name;
        $this->contact = $customer->contact;
        $this->email = $customer->email;
        $this->address = $customer->address;
        $this->discount = $customer->discount;
        $this->ktp = $customer->ktp;
        $this->discountType = $customer->discount_type;
        $this->oldImage = $customer->image_path;
    }

    public function updateCustomer()
    {
        $this->validate();

        $customer = Customer::findOrFail($this->customerID);
        $customer->name = $this->name;
        $customer->contact = $this->contact;
        $customer->email = $this->email;
        $customer->address = $this->address;
        $customer->discount = $this->discount;
        $customer->discount_type = $this->discountType;
        $customer->ktp = $this->ktp;

        if ($this->image) {
            $customer->image_path = $this->image->store('images/customers', 'public');
            $this->deleteMedia(explode('/', $this->oldImage)[2], 'customers');
        }

        $customer->save();

        $this->dispatchBrowserEvent('updated', 'Pelanggan berhasil diperbarui !');
        $this->emitTo('customer.table', 'refreshTable');
        $this->reset();
    }

    public function render(DiscountType $discountType)
    {
        return view('livewire.customer.edit', [
            'discount_types' => $discountType->getAll(),
        ]);
    }
}