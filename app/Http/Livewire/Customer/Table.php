<?php

namespace App\Http\Livewire\Customer;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Customer\Entities\Customer;

class Table extends Component
{
    use WithPagination, FileHandler;

    public $search = '', $deleteID;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function getAll($keyword)
    {
        $customer = Customer::orderBy('created_at', 'desc');

        if ($keyword !== '') {
            $customer->where(function ($query) use ($keyword) {
                $query->where('id', 'like', '%' . $keyword . '%')
                    ->orWhere('name', 'like', '%' . $keyword . '%')
                    ->orWhere('contact', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('address', 'like', '%' . $keyword . '%')
                    ->orWhere('discount', 'like', '%' . $keyword . '%')
                    ->orWhere('discount_type', 'like', '%' . $keyword . '%')
                    ->orWhere('identity_card', 'like', '%' . $keyword . '%');
            });
        }

        return $customer->simplePaginate(10);
    }

    public function find($id)
    {
        $this->emitTo('customer.edit', 'getID', $id);
    }

    public function destroyCustomer()
    {
        $customer = Customer::findOrFail($this->deleteID);

        if ($customer->image_path) {
            $this->deleteMedia('customers/' . $customer->image_path);
        }

        $customer->delete();

        $this->dispatchBrowserEvent('deleted', 'Barang berhasil dihapus !');
        $this->reset('deleteID');
    }

    public function render()
    {
        return view('livewire.customer.table', [
            'customers' => $this->getAll($this->search),
        ]);
    }
}