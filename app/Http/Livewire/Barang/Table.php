<?php

namespace App\Http\Livewire\Barang;

use App\Category;
use App\Stuff;
use Livewire\Component;

class Table extends Component
{
    public $data = [];

    public $data_category = [];

    protected $listeners = [
        'refresh-table' => 'getData',
    ];

    public function mount()
    {
        $this->getData();
        $data_category = Category::get();
        $this->data_category = $data_category;
    }

    public function render()
    {
        return view('livewire.barang.table');
    }

    public function getData()
    {
        try {
            $data = Stuff::orderBy('created_at', 'DESC')->get();
            $this->data = $data;

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function hapusData($id)
    {
        try {
            $data = Stuff::findOrFail($id);
            $data->delete();
            $this->getData();

        } catch (\Exception $e) {
            dd($e);
        }
    }
}
