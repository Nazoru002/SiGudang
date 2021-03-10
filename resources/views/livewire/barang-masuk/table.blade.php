<div>
    <div class="row p-5">
        <div class="col-lg-5 col-xl-5" wire:ignore>
            <div class="form-group">
                <label for="">Tgl Barang Masuk : </label>
                <input type="date" class="form-control" value={{ date('Y-m-d') }} readonly>
            </div>
        </div>

        <div class="col-lg-3 col-xl-3">
            <div class="form-group">
                <label for="">Asal Barang : </label>
                <input type="text" name="asal_barang" id="asal_barang" class="form-control">
                <span class="invalid-feedback">
                    {{ $errors->first('asal_barang') }}
                </span>
            </div>
        </div>
        
        <div class="col-lg-2 col-xl-2">
            <div class="form-group">
                <label for="">Penginput : </label>
                <input wire:model="penginput" type="text" name="penginput" class="form-control {{ $errors->has('penginput') ? 'is-invalid':'' }}" value="{{ auth()->user()->name }}" readonly>
                <span class="invalid-feedback">
                    {{ $errors->first('penginput') }}
                </span>
            </div>
        </div>

        <div class="col-lg-2 col-xl-1">
            <div class="form-group">
                <label for="" class="d-none d-lg-block d-xl-block">&ensp;</label>
                <button type="button" class="btn btn-success btn-block mt-2" wire:click="tambahData()">
                    Add
                    <span class="fa fa-plus"></span>
                </button>
            </div>
        </div>

        <div class="col-lg-5 col-xl-5" wire:ignore>
            <div class="form-group">
                <label for="">Nama Barang Masuk : </label>
                <select class="form-control" name="" id="">
                    <option value=""></option>
                </select>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12">
            <hr>
            <h5>Data Barang Masuk</h5>
        </div>

        <div class="col-lg-12 col-xl-12">
            <table class="table table-bordered m-0" style="border-rad">
                <thead>
                    <tr>
                        <th>Tgl Barang Masuk</th>
                        <th>Asal Barang</th>
                        <th>Penginput</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
