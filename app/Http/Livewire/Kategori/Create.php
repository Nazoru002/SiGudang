<?php

namespace App\Http\Livewire\Kategori;

use App\Category;
use Livewire\Component;

class Create extends Component
{
    public $nama_kategori = null;

    protected $listeners = [
        'reset-variable' => 'resetVariable',
    ];

    public function render()
    {
        return view('livewire.kategori.create');
    }

    public function simpanData()
    {
        try {
            $tambah = Category::firstOrCreate([
                'name' => $this->nama_kategori
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
            'nama_kategori',
        ]);
    }
}
