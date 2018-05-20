<?php

use App\Models\Product;
use App\Models\Student;
	use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
	    /*$this->call([
	    	UsersTableSeeder::class,
	    ]);*/
	    
	    DB::table('sexes')->insert([
		    ['gender' => 'Male'],
		    ['gender' => 'Female']
	    ]);

	    factory(Student::class, 15)->create();
	    factory(Product::class, 10)->create();
    }
}