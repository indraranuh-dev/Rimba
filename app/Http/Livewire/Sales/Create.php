<?php

namespace App\Http\Livewire\Sales;

use App\Traits\TransactionCode;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Customer\Entities\Customer;
use Modules\Sales\Entities\Sale;

class Create extends Component
{
    use TransactionCode;

    public $transactionCode, $transaction_date, $customer, $details = [];

    protected function rules()
    {
        return [
            'transaction_date' => 'required|min:3|max:191',
            'customer' => 'required',
            'details' => 'required',
        ];
    }

    public function mount()
    {
        $this->transaction_date = now()->toDateTimeString();
    }

    public function createCustomer()
    {
        $this->validate();

        Sale::create([
            'id' => Str::uuid()->getHex(),
            'transactionCode' => $this->getCode(),
            'transaction_date' => $this->transaction_date,
            'details' => $this->details,
            'customers_id' => $this->customer,
        ]);

        $this->dispatchBrowserEvent('created', 'Transaksi berhasil ditambahkan !');
        $this->emitTo('customer.table', 'refreshTable');
        $this->reset();
    }

    public function render(Customer $customer)
    {
        return view('livewire.sales.create', [
            'customers' => $customer->getOnlyIdAndName(),
        ]);
    }
}