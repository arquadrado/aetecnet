<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
use Faker\Factory as Faker;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        DB::table('users')->insert([
            'name' => 'António Quadrado',
            'email' => 'arq.quadrado@gmail.com',
            'password' => bcrypt('1234567'),
        ]);
    	foreach (range(1,10) as $index) {
	        DB::table('members')->insert([
	            'name' => $faker->name,
	            'function' => 'Architect',
                'image' => 'img/placeholder.jpg',
	        ]);
        }
        DB::table('companies')->insert(['name' => 'Aetec-mo']);
        DB::table('companies')->insert(['name' => 'Stepaetec']);

        DB::table('categories')->insert([
            'name' => 'housing',
            'company_id' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'housing',
            'company_id' => 2
        ]);
    }
}
