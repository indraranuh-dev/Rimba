<div>
    <div class="modal fade" wire:ignore.self id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="createCustomer">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambahkan Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">

                                <div class="form-group row">
                                    <div class=" col-12 col-md-6 mb-3 mb-md-0">
                                        <label for="transaction_date">Tanggal Transaksi</label>
                                        <input type="text" class="form-control bg-white"
                                            wire:model.defer="transaction_date" readonly>
                                        @error('transaction_date')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class=" col-12 col-md-6 mb-3 mb-md-0">
                                        <label for="name">Nama Pelanggan</label>
                                        <select class="form-control" wire:model.defer="customer">
                                            <option value="">Pilih pelanggan</option>
                                            @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                </div>

                                @livewire('sales.create-detail')

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary">
                            Simpan
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                wire:loading="createCustomer"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
