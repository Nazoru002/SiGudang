<?php

namespace App\Http\Livewire\Barang;

use App\Category;
use App\Stock;
use App\Stuff;
use Livewire\Component;

class Create extends Component
{
    public $name = null;
    public $desc = null;
    public $category_id = null;
    public $stock_modal = 0;

    public $data_category = [];

    public function mount()
    {
        $data_category = Category::get();
        $this->data_category = $data_category;
    }

    protected $listeners = [
        'reset-variable' => 'resetVariable',
    ];

    public function render()
    {
        return view('livewire.barang.create');
    }

    public function simpanData()
    {
        try {
            $tambah = Stuff::firstOrCreate([
                'name' => $this->name,
                'description' => $this->desc,
                'category_id' => $this->category_id
            ]);
            
            $stok = Stock::firstOrCreate([
                'stuff_id' => $tambah->id,
                'stock_cap' => $this->stock_modal,
                'stock_date' => date('Y-m-d')
            ]);

            $this->emit('refresh-table');
            $this->emit('tutup-create');
            
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function resetVariable()
    {
        $this->reset([
            'name',
            'desc',
            'category_id',
            'stock_modal'
        ]);
    }
}
