<?php

use App\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $cities = array(
            'ANTIOQUIA' =>  'ABEJORRAL' ,
            'NORTE DE SANTANDER' =>  'ABREGO'   ,
            'CUNDINAMARCA' =>  'AGUA DE DIOS' ,
            'ARAUCA' =>    'ARAUCA'   ,
            'QUINDIO' =>   'ARMENIA'  ,
            'ATLANTICO' =>  'BARRANQUILLA' ,
            'SANTAFE DE BOGOTA' =>              'BOGOTA D.C.' ,
            'SANTANDER' =>  'BUCARAMANGA' ,
            'VALLE DEL CAUCA' =>                'CALI' ,
            'BOLIVAR' =>   'CARTAGENA' ,
            'NORTE DE SANTANDER' =>             'CUCUTA'   ,
            'CAQUETA' =>   'FLORENCIA' ,
            'TOLIMA' =>    'IBAGUE'   ,
            'GUAINIA' =>   'INIRIDA'  ,
            'AMAZONAS' =>  'LETICIA'  ,
            'CALDAS' =>    'MANIZALES' ,
            'ANTIOQUIA' =>  'MEDELLIN' ,
            'VAUPES' =>    'MITU'     ,
            'PUTUMAYO' =>  'MOCOA'    ,
            'CORDOBA' =>   'MONTERIA' ,
            'HUILA' =>     'NEIVA'    ,
            'NARIÑO' =>    'PASTO'    ,
            'RISARALDA' =>  'PEREIRA'  ,
            'CAUCA' =>     'POPAYAN'  ,
            'VICHADA' =>   'PUERTO CARREÑO' ,
            'CHOCO' =>     'QUIBDO'   ,
            'LA GUAJIRA' =>    'RIOHACHA' ,
            'ARCHIPIELAGO DE SAN ANDRES' =>     'SAN ANDRES' ,
            'GUAVIARE' =>  'SAN JOSE DEL GUAVIARE' ,
            'MAGDALENA' =>  'SANTA MARTA' ,
            'SUCRE' =>     'SINCELEJO' ,
            'BOYACA' =>    'TUNJA' ,
            'CESAR' =>     'VALLEDUPAR' ,
            'META' =>      'VILLAVICENCIO' ,
            'CASANARE' =>  'YOPAL'

            
        );

        foreach($cities as $key => $city) { 
            City::create([
                'name' => $city,
                'state' => $key,
            ]);
        }
    }
}
