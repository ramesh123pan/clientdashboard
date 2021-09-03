<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\Admin;

    class AdminSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Admin::create([
	            'first_name' => "Ramesh",
	            'last_name' => "Kumar",
	            'email' => "rameshkumar.kumar72@gmail.com",
	            'password' => bcrypt("abcd1234"),
	            'status' => 1
	        ]);
            
            Admin::create([
	            'first_name' => "Test",
	            'last_name' => "User",
	            'email' => "info@virtuxient.com",
	            'password' => bcrypt("abcd1234"),
	            'status' => 1
	        ]);
        }
        
        //php artisan db:seed --class=AdminSeeder
    }
