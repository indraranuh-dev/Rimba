<div>
    <div class="modal fade" wire:ignore.self id="updateModal" tabindex="-1" role="dialog"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="updateItem">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            @if ($oldImage)
                            <div class="col-6 col-md-4 mb-3 mx-auto">
                                <div class="card shadow-none">
                                    <img class="w-100 rounded-lg"
                                        src="{{$image ? $image->temporaryUrl() : url($oldImage)}}" alt="">
                                </div>
                            </div>
                            @endif

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-6 col-md-8 mb-3">
                                        <label for="name">Nama Barang</label>
                                        <input type="text" class="form-control" wire:model.defer="name">
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <label>Pilih Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" id="image" class="custom-file-input" accept="image/*"
                                                class="file-upload-default" wire:model.defer="image">
                                            <label class="custom-file-label"
                                                for="image">{{$image ? $image->getClientOriginalName() : 'Tidak ada file'}}</label>
                                        </div>
                                        @error('image')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-6 col-md-4 mb-3">
                                        <label for="stock">Stok</label>
                                        <input type="text" data-inputmask class="form-control" wire:model.defer="stock">
                                        @error('stock')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class=" col-6 col-md-4 mb-3 mb-md-0">
                                        <label for="unit">Unit</label>
                                        <select class="form-control" wire:model.defer="unit">
                                            <option value="">Pilih unit</option>
                                            @foreach ($units as $unit)
                                            <option value="{{$unit['slug_name']}}">{{$unit['name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('unit')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="price">Harga <sub>(Dalam Rupiah)</sub></label>
                                        <input type="text" data-inputmask class="form-control" wire:model.defer="price">
                                        @error('price')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="isDraft-"
                                            wire:model.defer="isDraft">

                                        <label for="isDraft-" class="custom-control-label" style="line-height: 2;">
                                            Simpan sebagai draft ?
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="isNew-"
                                            wire:model.defer="isNew">

                                        <label for="isNew-" class="custom-control-label" style="line-height: 2;">
                                            Produk ini baru ?
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="showInCatalogue-"
                                            wire:model.defer="showInCatalogue">

                                        <label for="showInCatalogue-" class="custom-control-label"
                                            style="line-height: 2;">
                                            Tampilkan di katalog ?
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary">
                            Simpan
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                wire:loading="createItem"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
