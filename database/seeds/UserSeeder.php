<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
            'name' => 'Ninh Mạnh Dũng',
            'email'=>'20111291@student.hust.edu.vn',
            'password' => bcrypt('20111291'),
            'id_doituong'=>1,
            'created_at'=>new DateTime(),
        	],[
            'name' => 'Bành Thị Bành Mai',
            'email'=>'maibtq@soict.hust.edu.vn',
            'password' => bcrypt('12345'),
            'id_doituong'=>2,
            'created_at'=>new DateTime(),
        	],
        	[
            'name' => 'Vũ Thị Hương Giang',
            'email'=>'giangvth@soict.hust.edu.vn',
            'password' => bcrypt('12345'),
            'id_doituong'=>3,
            'created_at'=>new DateTime(),
        	],
        	[
            'name' => 'Vietel Lạng Sơn',
            'email'=>'vietells@gmail.com',
            'password' => bcrypt('12345'),
            'id_doituong'=>4,
            'created_at'=>new DateTime(),
        	],
        	[
            'name' => 'Nguyễn Cơ Tuấn',
            'email'=>'tuannoob@gmail.com',
            'password' => bcrypt('12345'),
            'id_doituong'=>5,
            'created_at'=>new DateTime(),
        	],[
            'name' => 'admin',
            'email'=>'admin',
            'password' => bcrypt('123'),
            'id_doituong'=>6,
            'created_at'=>new DateTime(),
        	]

        	]
        );
    }
}
