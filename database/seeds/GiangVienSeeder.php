<?php

use Illuminate\Database\Seeder;

class GiangVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('giangvien')->insert([
				[
				'hoten' => 'Bành Thị Quỳnh Mai',
				'email' => 'maibtq@soict.hust.edu.vn',
				'password' => bcrypt('12345'),
				'chucvu' => 'Giảng Viên Hướng Dẫn',
				'phone'=>'0913541514'
				// 'created_at'=>new DateTime(),	
				],
				[
				'hoten' => 'Bành Thị Quỳnh Mai',
				'email' => 'maibtq@soict.hust.edu.vn',
				'password' => bcrypt('12345'),
				'chucvu' => 'Giảng Viên Hướng Dẫn',
				'phone'=>'0913541514'
				// 'created_at'=>new DateTime(),
				],
				[
				'hoten' => 'Bành Thị Quỳnh Mai',
				'email' => 'maibtq@soict.hust.edu.vn',
				'password' => bcrypt('12345'),
				'chucvu' => 'Giảng Viên Hướng Dẫn',
				'phone'=>'0913541514'
				// 'created_at'=>new DateTime(),
				],
				[
				'hoten' => 'Bành Thị Quỳnh Mai',
				'email' => 'maibtq@soict.hust.edu.vn',
				'password' => bcrypt('12345'),
				'chucvu' => 'Giảng Viên Hướng Dẫn',
				'phone'=>'0913541514'
				// 'created_at'=>new DateTime(),
				],
				[
				'hoten' => 'Bành Thị Quỳnh Mai',
				'email' => 'maibtq@soict.hust.edu.vn',
				'password' => bcrypt('12345'),
				'chucvu' => 'Giảng Viên Hướng Dẫn',
				'phone'=>'0913541514'
				// 'created_at'=>new DateTime(),
				],
				[
				'hoten' => 'Bành Thị Quỳnh Mai',
				'email' => 'maibtq@soict.hust.edu.vn',
				'password' => bcrypt('12345'),
				'chucvu' => 'Giảng Viên Hướng Dẫn',
				'phone'=>'0913541514'
				// 'created_at'=>new DateTime(),
				],
				[
				'hoten' => 'Bành Thị Quỳnh Mai',
				'email' => 'maibtq@soict.hust.edu.vn',
				'password' => bcrypt('12345'),
				'chucvu' => 'Giảng Viên Hướng Dẫn',
				'phone'=>'0913541514'
				// 'created_at'=>new DateTime(),
				],
        	]  
        	);  
        }
    
}
