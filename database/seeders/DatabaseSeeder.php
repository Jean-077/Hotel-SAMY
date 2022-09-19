<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Habitacione;
use App\Models\Piso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

       Categoria::factory(20)->create();
       
       $piso=new Piso();
       $piso->numpiso=1;
       $piso->save();

       $piso2=new Piso();
       $piso2->numpiso=2;
       $piso2->save();

       $piso3=new Piso();
       $piso3->numpiso=3;
       $piso3->save();
       

       
       $hab = new Habitacione();
       $hab->idPiso=1;
       $hab->idCategoria=3;
       $hab->precio=250;
       $hab->estado='disponible';
        $hab->save();

        $hab2 = new Habitacione();
       $hab2->idPiso=2;
       $hab2->idCategoria=5;
       $hab2->precio=250;
       $hab2->estado='disponible';
        $hab2->save();

        $hab3 = new Habitacione();
       $hab3->idPiso=2;
       $hab3->idCategoria=10;
       $hab3->precio=50;
       $hab3->estado='limpieza';
        $hab3->save();
    

    }
}
