<?php

namespace Database\Seeders;

use App\Models\Fakulte;
use Illuminate\Database\Seeder;

class FakulteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakulteler=['Mühendislik Fakültesi','Teknoloji Fakültesi','Eğitim Fakültesi','Fen Fakültesi','İletişim Fakültesi'];

        foreach ($fakulteler as $fakulte){
            Fakulte::create([
                'adi'=>$fakulte
            ]);
        }

    }
}
