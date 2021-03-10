<div>
    <form wire:submit.prevent="simpanData()" method="POST">
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Barang : </label>
                                <input wire:model.lazy="data.name" type="text" class="form-control" placeholder="Masukkan Nama Barang..." required>
                            </div>

                            <div class="form-group">
                                <label for="">Deskripsi : </label>
                                <textarea wire:model.lazy="data.description" class="form-control" placeholder="Masukkan Deskripsi Jika Di-perlukan ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">ID Kategori : </label>
                                <select wire:model="data.category_id" class="form-control" name="category_id" id="category_id">
                                    <option value="">- PILIH -</option>
                                    @foreach ($data_category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
