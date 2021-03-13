@extends('backend.layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            Master Data Barang
            <div class="float-right">
                <a href="{{ route('backend.barang-print') }}" target="_blank" class="btn btn-sm btn-info">Print Data Barang</a>

                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            @livewire('barang.table')
        </div>
    </div>
</div>

@livewire('barang.create')
@livewire('barang.edit')

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