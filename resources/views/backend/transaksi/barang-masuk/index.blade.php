@extends('backend.layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            Master Barang Masuk
        </div>
        
        <div class="card-body p-0">
            @livewire('barang-masuk.table')
        </div>
    </div>
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