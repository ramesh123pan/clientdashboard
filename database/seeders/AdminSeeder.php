<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\Admin;
	use Spatie\Permission\Models\Role;

    class AdminSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            // Admin::create([
	            // 'first_name' => "Ramesh",
	            // 'last_name' => "Kumar",
	            // 'email' => "rameshkumar.kumar72@gmail.com",
	            // 'password' => bcrypt("abcd1234"),
	            // 'status' => 1
	        // ]);
            
            $users=Admin::create([
	            'first_name' => "Test",
	            'last_name' => "User",
	            'email' => "demo@virtuxient.com",
	            'password' => bcrypt("admin1234"),
	            'status' => 1
	        ]);
			
			$role = Role::findByName('Admin','admin');          
            $role->users()->attach($users);
        }
        
        //php artisan db:seed --class=AdminSeeder
    }
