<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // Uncomment the lines below to seed libraries

        // $this->call(StatusSeeder::class);
        // $this->call(RolesSeeder::class);
        // $this->call(AdministratorSeeder::class);
        // $this->call(RoleAdminSeeder::class);
        // $this->call(SeederFacilityPropertiesCategory::class);
        $this->call(InfrastructureSeeder::class);
        // $this->call(ServiceCategorySeeder::class);
        // $this->call(LogStatusSeeder::class);
        // $this->call(RatingSeeder::class);
        // $this->call(EmailLogCategorySeeder::class);
        // $this->call(StatusMaintenanceSeeder::class);
        // $this->call(ScheduleCategoriesSeeder::class);

    }
}
    