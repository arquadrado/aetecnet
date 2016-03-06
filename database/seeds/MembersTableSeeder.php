<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'name' => 'Maria José Freitas',
            'function' => 'Architect Manager',
            'image' => 'public/img/mjf.jpg',
        ]);
        DB::table('members')->insert([
            'name' => 'Ana Carina Costa',
            'function' => 'Senior Architect',
            'image' => 'public/img/acc.jpg',
        ]); 
        DB::table('members')->insert([
            'name' => 'Ana Mafalda Matos',
            'function' => 'Senior Architect/Urban Planner',
            'image' => 'public/img/amm.jpg',
        ]); 
        DB::table('members')->insert([
            'name' => 'Angelo Branquinho',
            'function' => 'Senior Architect',
            'image' => 'public/img/ab.jpg',
        ]);
        DB::table('members')->insert([
            'name' => 'António Quadrado',
            'function' => 'Architect',
            'image' => 'public/img/aq.jpg',
        ]);
        DB::table('members')->insert([
            'name' => 'Bruno P. Males',
            'function' => 'Senior Architect',
            'image' => 'public/img/bpm.jpg',
        ]);
        DB::table('members')->insert([
            'name' => 'Guilherme Martins',
            'function' => 'BSC Architect',
            'image' => 'public/img/gm.jpg',
        ]);
        DB::table('members')->insert([
            'name' => 'Isabel Lúcio',
            'function' => 'Senior Landscape Architect',
            'image' => 'public/img/il.jpg',
        ]);
        DB::table('members')->insert([
            'name' => 'João Faria',
            'function' => 'Senior Architect',
            'image' => 'public/img/jf.jpg',
        ]);
        DB::table('members')->insert([
            'name' => 'João Xavier',
            'function' => 'Senior Architect',
            'image' => 'public/img/jx.jpg',
        ]);
        DB::table('members')->insert([
            'name' => 'Lou Chon Pan (Martin Lou)',
            'function' => 'Architect',
            'image' => 'public/img/ml.jpg',
        ]);

    }
}
