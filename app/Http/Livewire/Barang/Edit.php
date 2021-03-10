<?php

namespace App\Http\Livewire\Barang;

use App\Category;
use App\Stuff;
use Livewire\Component;

class Edit extends Component
{
    protected $listeners = [
        'edit-data' => 'editData'
    ];

    public $data = [];

    public $data_category = [];

    public function mount()
    {
        $data_category = Category::get();
        $this->data_category = $data_category;
    }

    public function render()
    {
        return view('livewire.barang.edit');
    }

    public function editData($id)
    {
        try {
            $edit = Stuff::findOrFail($id);
            $this->data = $edit->toArray();

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function simpanData()
    {
        try {
            $simpan = Stuff::findOrFail($this->data['id']);

            $simpan->update([
                'name' => $this->data['name'],
                'description' => $this->data['description'],
                'category_id' => $this->data['category_id'],
            ]);

            $this->emit('refresh-table');
            $this->emit('tutup-edit');
        } catch (\Exception $e) {
            dd($e);
        }

    }
}
