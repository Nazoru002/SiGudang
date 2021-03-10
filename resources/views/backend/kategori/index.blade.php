@extends('backend.layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            Master Data Kategori
            <div class="float-right">
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            @livewire('kategori.table')
        </div>
    </div>
</div>

@livewire('kategori.create')
@livewire('kategori.edit')

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