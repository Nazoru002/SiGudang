<?php

namespace App\Http\Livewire\Kategori;

use App\Category;
use Livewire\Component;

class Table extends Component
{
    public $data = [];

    protected $listeners = [
        'refresh-table' => 'getData',
    ];
    
    public function mount()
    {
        $this->getData();
    }
    
    public function render()
    {
        return view('livewire.kategori.table');
    }

    public function getData()
    {
        try {
            $data = Category::orderBy('created_at', 'DESC')->get();
            $this->data = $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function editData($id)
    {
        
    }

    public function hapusData($id)
    {
        try {
            $data = Category::findOrFail($id);
            $data->delete();
            $this->getData();

        } catch (\Exception $e) {
            dd($e);
        }
    }
}
