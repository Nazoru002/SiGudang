<?php

namespace App\Http\Livewire\Kategori;

use App\Category;
use Livewire\Component;

class Edit extends Component
{
    protected $listeners = [
        'edit-data' => 'editData'
    ];

    public $data = [];

    public function render()
    {
        return view('livewire.kategori.edit');
    }

    public function editData($id)
    {
        try {
            $edit = Category::findOrFail($id);
            $this->data = $edit->toArray();

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function simpanData()
    {
        try {
            $simpan = Category::findOrFail($this->data['id']);

            $simpan->update([
                'name' => $this->data['name']
            ]);

            $this->emit('refresh-table');
            $this->emit('tutup-edit');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
