<div>
    <h6 class="card-title">Daftar Pelanggan</h6>
    <div class="row">
        <div class="col-md-3 mb-3 ml-auto">
            <fieldset class="form-group">
                <label for="search">Pencarian</label>
                <input type="text" wire:model.debounce.250ms="search" placeholder="Cari disini" class="form-control">
            </fieldset>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. KTP</th>
                            <th>Telp.</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                        <tr>
                            <td class="text-center">
                                <img width="80" src="{{url($customer->image_path)}}" alt="">
                            </td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->ktp}}</td>
                            <td>{{$customer->contact}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" data-toggle="modal" data-target="#updateModal"
                                        class="btn btn-light text-secondary px-2 py-1"
                                        wire:click="find('{{$customer->id}}')" title="Edit Pelanggan">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-light text-secondary px-2 py-1"
                                        title="Hapus Pelanggan" data-target="#deleteModal" data-toggle="modal"
                                        wire:click="$set('deleteID', '{{$customer->id}}')">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6"><b>Pelanggan tidak ditemukan</b></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{$customers->links('livewire::simple-bootstrap')}}
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" wire:click="destroyCustomer">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>