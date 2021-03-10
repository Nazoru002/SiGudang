@extends('backend.layouts.master')

@section('content')
<div class="col-12">
  <form action="{{ route('backend.barang-keluar-create') }}" method="post">
    <div class="card">
      <div class="card-header">
          Master Barang Keluar
          <div class="float-right">
              <button type="submit" class="btn btn-sm btn-success">Selesai Transaksi</button>
          </div>
      </div>

      <div class="card-body">
        @csrf
        <div class="row">
          <div class="col-lg-3 col-xl-3">
            <div class="form-group">
              <label for="">Tgl Barang Keluar : </label>
              <input class="form-control" type="date" name="date" id="date" value="{{ date('Y-m-d') }}" readonly>
            </div>
          </div>

          <div class="col-lg-3 col-xl-3">
            <div class="form-group">
              <label for="">Penginput : </label>
              <input type="text" name="penginput" id="penginput" value="{{ auth()->user()->name }}" class="form-control" readonly>
            </div>
          </div>

          <div class="col-lg-6 col-xl-6">
            <div class="form-group">
              <label for="">Tujuan Barang : </label>
              <input type="text" name="tujuan_keluar" id="tujuan_keluar" placeholder="Masukkan Tujuan Barang..." class="form-control" autofocus="" required>
            </div>
          </div>
        </div>
        @livewire('barang-keluar.table')
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