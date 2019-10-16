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
        DB::table('roles')->insert([
            'name' => "super_admin"]);
        DB::table('roles')->insert([
            'name' => "admin"]);
        DB::table('roles')->insert([
            'name' => "editor"]);
        DB::table('roles')->insert([
            'name' => "simple_user"]);
        DB::table('roles')->insert([
            'name' => "not_active"]);
    }
}
