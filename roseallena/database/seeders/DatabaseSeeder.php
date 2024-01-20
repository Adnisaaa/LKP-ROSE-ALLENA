<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Backdrop;
use App\Models\Kursus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            User::create([
                'role_id' => 1,
                'username' => 'owner',
                'email' => 'owner@gmail.com',
                'password' => Hash::make('owner123')
            ]);
            User::create([
                'role_id' => 2,
                'username' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('admin123'),
                'nama_lengkap' => 'ADMIN 1',
                'alamat' => 'Tangerang',
                'no_hp' => '0812345678',
            ]);
            User::create([
                'role_id' => 3,
                'username' => 'aistuvwxyz',
                'email' => 'adnisa@gmail.com',
                'password' => Hash::make('adnisa123'),
                'nama_lengkap' => 'Adnisa Sabina',
                'alamat' => 'Jl. Pondok Belimbing, Pondok Aren, Jurang Mangu Barat, Tangerang Selatan.',
                'no_hp' => '081316447367',
            ]);
            User::create([
                'role_id' => 3,
                'username' => 'zahnan',
                'email' => 'zahrine@gmail.com',
                'password' => Hash::make('zahrine123'),
                'nama_lengkap' => 'Zahrine Hanani',
                'alamat' => 'Pekayon, Jakarta Timur.',
                'no_hp' => '085225019098',
            ]);
            Role::create([
                'name' => 'owner'
            ]);
            Role::create([
                'name' => 'admin'
            ]);
            Role::create([
                'name' => 'pegunjung'
            ]);
            Backdrop::create([
                'nama_model' => 'Desain U',
            ]);
            Backdrop::create([
                'nama_model' => 'Desain V',
            ]);
            Kursus::create([
                'paket' => 'Paket 1',
                'harga' => 8000000,
                'spesifikasi' => 'Ilmu teori, Tradisional 3, Praktek 10 pertemuan, pinjaman kostum, Aksesoris, Hijab do, Makan siang, Foto sesi akhir, FREE Sertifikat Uji Kompeten, FREE Biaya Pendaftaran',
            ]);
            Kursus::create([
                'paket' => 'Paket 2',
                'harga' => 5000000,
                'spesifikasi' => 'Ilmu teori, Tradisional 1, Praktek 10 pertemuan, pinjaman kostum, Aksesoris, Hijab do, Foto sesi akhir',
            ]);
        
    }
}
