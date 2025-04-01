<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FDWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = 'CREATE EXTENSION postgres_fdw;';
        $sql .= 'CREATE SERVER sistfd FOREIGN DATA WRAPPER postgres_fdw OPTIONS (host \'localhost\', dbname \'ses.core\');';
        $sql .= 'CREATE USER MAPPING FOR postgres SERVER sistfd OPTIONS (user \'postgres\', password \'postgres\');';
        $sql .= 'IMPORT FOREIGN SCHEMA public LIMIT TO (users,password_reset_tokens,sessions,personal_access_tokens,permissions,roles,model_has_permissions,model_has_roles,role_has_permissions) FROM SERVER sistfd INTO public;';
        DB::unprepared($sql);
    }
}
