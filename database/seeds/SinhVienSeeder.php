<?php

use Illuminate\Database\Seeder;

class SinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('sinhvien')->insert([
        	[
            'hoten' => 'Ninh Mạnh Dũng',
            'mssv'=>'20111291',
            'email' => '20111291@student.hust.edu.vn',
            'lop'=>'LTU12A',
            'created_at'=>new DateTime(),
        	],
        	[
            'hoten' => 'Ninh Mạnh Dũng',
            'mssv'=>'20111291',
            'email' => '20111291@student.hust.edu.vn',
            'lop'=>'LTU12A',
            'created_at'=>new DateTime(),
        	],
        	[
            'hoten' => 'Ninh Mạnh Dũng',
            'mssv'=>'20111291',
            'email' => '20111291@student.hust.edu.vn',
            'lop'=>'LTU12A',
            'created_at'=>new DateTime(),
        	],
        	[
            'hoten' => 'Ninh Mạnh Dũng',
            'mssv'=>'20111291',
            'email' => '20111291@student.hust.edu.vn',
            'lop'=>'LTU12A',
            'created_at'=>new DateTime(),
        	],
        	[
            'hoten' => 'Ninh Mạnh Dũng',
            'mssv'=>'20111291',
            'email' => '20111291@student.hust.edu.vn',
            'lop'=>'LTU12A',
            'created_at'=>new DateTime(),
        	],
        	[
            'hoten' => 'Ninh Mạnh Dũng',
            'mssv'=>'20111291',
            'email' => '20111291@student.hust.edu.vn',
            'lop'=>'LTU12A',
            'created_at'=>new DateTime(),
        	]

        	]  
        	);  
        }
}
