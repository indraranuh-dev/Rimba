<div>
    <h5 class="card-title">Daftar Barang</h5>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="row justify-content-end">
                <div class="col-md-4 col-lg-3 mb-3 mb-md-0">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Cari disini .." wire:model="search">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="row">
                @forelse ($items as $item)
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        @if ($item->image_path)
                        <img class="w-100 mb-3 rounded-top " src="{{url($item->image_path)}}" alt="{{$item->title}}">
                        @endif
                        <div class="card-body">

                            @if ($item->is_new)
                            <small class="position-absolute px-2 py-1 bg-danger text-white text-capitalize rounded"
                                style="top: 1rem; right: 1rem">New
                                Arrival !</small>
                            @endif

                            <h4 class="text-capitalize mb-3">
                                {{$item->item_name}}
                            </h4>
                            <h6 class="text-muted">
                                Rp. {{number_format($item->unit_price,2,',','.')}}

                                <small
                                    class="float-right px-2 py-1 bg-dark text-white text-capitalize rounded">{{$item->stock . ' ' . $item->unit}}</small>
                            </h6>
                        </div>
                        <div class="card-footer text-right">
                            <div class="btn-group">
                                <button type="button" data-toggle="modal" data-target="#updateModal"
                                    class="btn btn-light text-secondary px-2 py-1" wire:click="find('{{$item->id}}')"
                                    title="Edit Barang">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-light text-secondary px-2 py-1"
                                    title="Hapus Barang" data-target="#deleteModal" data-toggle="modal"
                                    wire:click="$set('deleteID', '{{$item->id}}')">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center">
                        Data tidak ditemukan.
                    </p>
                </div>
                @endforelse
            </div>
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
                    <button class="btn btn-danger" wire:click="destroyItem">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>