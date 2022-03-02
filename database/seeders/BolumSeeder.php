<?php

namespace Database\Seeders;

use App\Models\Bolum;
use Illuminate\Database\Seeder;

class BolumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $muhendislik=['Yazılım Mühendisliği','Bilgisayar Mühendisliği','Makine Mühendisliği','Mekatronik Mühendisliği','Biyomühendislik Mühendisliği','Jeoloji Mühendisliği'];

        foreach ($muhendislik as $muh){
            Bolum::create([
                'bolum_adi'=>$muh,
                'fakulte_id'=>1
            ]);
        }
        $teknoloji=['Yazılım Mühendisliği','Bilgisayar Mühendisliği','Makine Mühendisliği','Mekatronik Mühendisliği','Adli-Bilişim Mühendisliği','Jeoloji Mühendisliği','Endüstri Mühendisliği'];

        foreach ($teknoloji as $tek){
            Bolum::create([
                'bolum_adi'=>$tek,
                'fakulte_id'=>2
            ]);
        }

        $egitim=['Rehberlik ve Psikolojik Danışmanlık','Sosyal Bilgiler Öğretmenliği','Türkçe Öğretmenliği'];

        foreach ($egitim as $egi) {
            Bolum::create([
                'bolum_adi' => $egi,
                'fakulte_id' => 3
            ]);
        }

        $fen=['Moleküler Biyoloji ve Genetik','Biyoloji','Kimya'];

        foreach ($fen as $f) {
            Bolum::create([
                'bolum_adi' => $f,
                'fakulte_id' => 4
            ]);
        }


        $iletisim=['Radyo, Televizyon ve Sinema','Halkla İlişkiler ve Tanıtım','Gazetecilik'];

        foreach ($iletisim as $ilet) {
            Bolum::create([
                'bolum_adi' => $ilet,
                'fakulte_id' => 5
            ]);

        }



    }
}
