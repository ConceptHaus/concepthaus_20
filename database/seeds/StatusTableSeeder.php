<?php

use Illuminate\Database\Seeder;
use App\Status;
use App\MedioContacto;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $status = [
            ['status' => 'Recibido'],
            ['status' => 'Socio'],
            ['status' => 'No viable'],
            ['status' => 'Cotizado'],
            ['status' => 'En Proceso'],
        ];

        Status::insert($status);
    }
}



class MediosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $medios = [
            ['medio' => 'Correo'],
            ['medio' => 'Llamada'],
            ['medio' => 'Whatsapp'],
        ];

        MedioContacto::insert($medios);
    }
}
