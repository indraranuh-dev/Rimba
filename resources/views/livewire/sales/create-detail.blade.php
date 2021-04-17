<div>
    <div class="table-responsive my-3">

        <table class="table">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Barang</td>
                    <td>Qty</td>
                    <td>Sub Total</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $i => $detail)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td width="40%">
                        <select class="form-control" wire:model="details.{{$i}}.item">
                            <option value="">Pilih barang</option>
                            @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->item_name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="15%">
                        <input type="text" class="form-control" wire:model="details.{{$i}}.qty">
                    </td>
                    <td>
                        <input type="text" class="form-control bg-white" readonly wire:model="details.{{$i}}.subTotal">
                    </td>
                    <td>
                        @if ($details[$i]['isComplete'])
                        <button type="button" class="btn px-2 py-1 btn-light">
                            <i class="mdi mdi-plus" wire:click="addRow"></i>
                        </button>
                        @endif
                        @if (!$loop->first)
                        <button type="button" class="btn px-2 py-1 btn-danger" wire:click="deleteRow({{$i}})"><i
                                class="mdi mdi-delete"></i></button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
