<div>
    <form wire:submit.prevent="simpanData()" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Kategori : </label>
                                <input wire:model.lazy="nama_kategori" type="text" class="form-control" placeholder="Masukkan Nama Kategori..." required>
                            </div>
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
