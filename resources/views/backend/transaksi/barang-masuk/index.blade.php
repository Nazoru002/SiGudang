@extends('backend.layouts.master')

@section('content')
<div class="col-12">
  <form action="{{ route('backend.barang-masuk-create') }}" method="post">
    <div class="card">
        <div class="card-header">
            Master Barang Masuk
            <div class="float-right">
              <button type="submit" class="btn btn-sm btn-success">Selesai Transaksi</button>
            </div>
        </div>
        
        <div class="card-body">
            @csrf
            <div class="row">
              <div class="col-lg-3 col-xl-3">
                <div class="form-group">
                  <label for="">Tgl Barang Masuk : </label>
                  <input class="form-control" type="date" name="tgl_brg_masuk" id="tgl_brg_masuk" value="{{ date('Y-m-d') }}" readonly>
                </div>
              </div>

              <div class="col-lg-3 col-xl-3">
                <div class="form-group">
                  <label for="">Penginput : </label>
                  <input class="form-control" type="text" name="penginput" id="penginput" value="{{ auth()->user()->name }}" readonly>
                </div>
              </div>

              <div class="col-lg-6 col-xl-6">
                <div class="form-group">
                  <label for="">Asal Barang : </label>
                  <input type="text" name="asal_barang" id="asal_barang" placeholder="Masukkan Asal Barang..." class="form-control" autofocus="" required>
                </div>
              </div>
            </div>
            @livewire('barang-masuk.table')
          </div>
      </div>
  </form>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            window.livewire.on('tutup-create', () => {
                $('#exampleModal').modal('hide');
            });
            
            window.livewire.on('tutup-edit', () => {
                $('#editModal').modal('hide');   
            });

            $('#exampleModal').on('hidden.bs.modal', function () {
                window.livewire.emit('reset-variable');
            });
        });
    </script>
@endsection