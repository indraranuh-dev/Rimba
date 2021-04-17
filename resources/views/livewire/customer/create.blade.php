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

                            @if ($image)
                            <div class="col-6 col-md-4 mb-3 mx-auto">
                                <div class="card shadow-none">
                                    <img class="w-100 rounded-lg" src="{{$image ? $image->temporaryUrl() : ''}}" alt="">
                                </div>
                            </div>
                            @endif

                            <div class="col-12">

                                <div class="form-group row">
                                    <div class=" col-12 col-md-8 mb-3 mb-md-0">
                                        <label for="name">Nama Pelanggan</label>
                                        <input type="text" class="form-control" wire:model.defer="name">
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
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

                                    <div class="col-md-4 mb-3">
                                        <label for="ktp">No. KTP</label>
                                        <input type="text" data-inputmask class="form-control" wire:model.defer="ktp">
                                        @error('ktp')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" wire:model.defer="email">
                                        @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="contact">No. Telp</label>
                                        <input type="text" data-inputmask class="form-control"
                                            wire:model.defer="contact">
                                        @error('contact')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea class="form-control" wire:model.defer="address"></textarea>
                                    @error('address')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-3 col-md-2 mb-3">
                                        <label for="discount">Diskon</label>
                                        <input type="text" data-inputmask class="form-control"
                                            wire:model.defer="discount">
                                        @error('discount')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class=" col-6 col-md-4 mb-3 mb-md-0">
                                        <label for="discount_type">Jenis Diskon</label>
                                        <select class="form-control" wire:model.defer="discount_type">
                                            <option value="">Pilih Jenis Diskon</option>
                                            @foreach ($discount_types as $discount_type)
                                            <option value="{{$discount_type['slug_name']}}">{{$discount_type['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('discount_type')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
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
                                wire:loading="createCustomer"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>