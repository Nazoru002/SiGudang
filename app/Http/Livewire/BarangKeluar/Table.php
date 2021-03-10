<?php

namespace App\Http\Livewire\BarangKeluar;

use App\Stuff;
use Livewire\Component;

class Table extends Component
{
  public $data = [];
  public $barang = null;
  public $qty = 1;
  public $cart = [];

    public function render()
    {
        return view('livewire.barang-keluar.table');
    }

    public function mount()
    {
      $data = Stuff::orderBy('name', 'ASC')->get();
      $this->data = $data;
    }

    public function masukanArray()
    {
      try {
        $cek = Stuff::findOrFail($this->barang);
        
        $this->cart[$this->barang] = [
          'id' => $this->barang,
          'name' => $cek->name,
          'qty' => $this->qty
        ];
      } catch (\Exception $e) {
        dd($e);
      }
    }

    public function hapusCart($id)
    {
      if (isset($this->cart[$id])) {
        unset($this->cart[$id]);
      }
    }
}
