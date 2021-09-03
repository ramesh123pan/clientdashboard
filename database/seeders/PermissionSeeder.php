<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Permission;
	use Spatie\Permission\Models\Role;
    use App\Models\Admin;
    
    class PermissionSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $permissions = [
                //'role-list','role-create','role-edit','role-delete',
                //'admin-list','admin-create','admin-edit','admin-delete',			
			];
			
			
			foreach ($permissions as $permission) {
				Permission::create(['guard_name' => 'admin','name' => $permission]);
			}
			
			$role = Role::create(['guard_name' => 'admin', 'name' => 'Superadmin']);
			$role->givePermissionTo(Permission::all());
            
            // $role = Role::findByName('Superadmin');
            // $users=Admin::all();            
            // $role->users()->attach($users);
        }
        
        //php artisan db:seed --class=PermissionSeeder
    }
