<div>
    <div class="row">
      <div class="col-lg-5 col-xl-5">
        <div class="form-group">
          <label for="">Barang : </label>
          <select wire:model="barang" class="form-control" name="barang" id="barang">
            <option value="">- PILIH -</option>
            @foreach ($data as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-lg-3 col-xl-3">
        <div class="form-group">
          <label for="">QTY : </label>
          <input wire:model="qty" type="number" name="qty" id="qty" class="form-control" placeholder="Ex.0">
        </div>
      </div>

      <div class="col-lg-4 col-xl-4">
        <div class="form-group">
          <label for="" class="d-none d-lg-block d-xl-block">&ensp;</label>
          <button type="button" class="btn btn-success btn-block mt-2" wire:click="masukanArray()">
            Tambah Data
          </button>
        </div>
      </div>
    </div>

    <div class="col-lg-12 col-xl-12">
      <hr>
      <h5>Data Barang Keluar</h5>
    </div>

    <div class="col-lg-12 col-xl-12">
      <table class="table table-bordered m-0" style="border-rad">
        <thead>
          <tr>
            <th>No</th>
            <th>Barang</th>
            <th>QTY</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($cart as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item['name'] }}</td>
              <td>{{ $item['qty'] }}</td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-danger" wire:click="hapusCart('{{ $item['id'] }}')">
                  Hapus
                </button>
                <input type="hidden" name="stuff_id[]" value="{{ $item['id'] }}">
                <input type="hidden" name="qty[]" value="{{ $item['qty'] }}">
              </td>
            </tr>
          @empty
            <tr>
              <td class="text-center" colspan="4">Tidak Ada Data...</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
</div>
