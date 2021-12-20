<?php

namespace Database\Seeders;

use App\Models\Config;
use App\Models\ContactType;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Official;
use App\Models\Role;
use App\Models\Policy;
use App\Models\Profile;
use App\Models\Sector;
use App\Models\SectorContact;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ContactType::create([               //Telepon
            'type' => 'Telepon',
            'icon' => 'images/icons/telephone.png',
        ]);
        ContactType::create([               //Instagram
            'type' => 'Instagram',
            'icon' => 'images/icons/instagram.png',
        ]);
        ContactType::create([               //Facebook
            'type' => 'Facebook',
            'icon' => 'images/icons/facebook.png',
        ]);
        ContactType::create([               //YouTube
            'type' => 'YouTube',
            'icon' => 'images/icons/youtube.png',
        ]);

        Role::create([                      //admin
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'role admin'
        ]);
        Role::create([                      //uadmin
            'name' => 'User Admin',
            'slug' => 'uadmin',
            'description' => 'role uadmin'
        ]);
        Role::create([                      //usector
            'name' => 'User Sector',
            'slug' => 'usector',
            'description' => 'role usector'
        ]);
        Role::create([                      //usector
            'name' => 'Satuan Tugas',
            'slug' => 'task-force',
            'description' => 'role usector'
        ]);

        // sectors
        Sector::factory(2)->create();        
        
        // sector_contact

        User::create([                      //alzidni2000@gmail.com
            'address'   => 'BTN GRAHA MANDIRI PERMAI BLOK K/7, Punggolaka, Puuwatu, Kendari, Sulawesi Tenggara 93115',
            'email'     => 'alzidni2000@gmail.com',
            'image'     => 'images/users/zidni.png',
            'name'      => 'Al Zidni Kasim',
            'password'  => \bcrypt('alzidni'),
            'phone'     => '081232578168',
            'role_id'   => 1,
            'sector_id' => 1,
        ]);
        User::create([                      //uadmin@gmail.com
            'address'   => 'Jalan',
            'email'     => 'uadmin@gmail.com',
            'image'     => 'images/users/user.jpg',
            'name'      => 'User Admin',
            'password'  => \bcrypt('uadmin'),
            'phone'     => '081234567890',
            'role_id'   => 2,
            'sector_id' => 1,
        ]);
        User::create([                      //usector@gmail.com
            'address'   => 'Jalan',
            'email'     => 'usector@gmail.com',
            'image'     => 'images/users/user.jpg',
            'name'      => 'User Sector',
            'password'  => \bcrypt('usector'),
            'phone'     => '081234567890',
            'role_id'   => 3,
            'sector_id' => 2,
        ]);

        // profil kabid pr
        Config::create([
            'shortcode' => 'NM-KBD-PR',
            'field'     => 'Nama Kabid. Penataan Ruang',
            'value'     => 'SEKO KAIMUDDIN HARIS, ST.,M.PW',
        ]);
        Config::create([
            'shortcode' => 'NIP-KBD-PR',
            'field'     => 'NIP Kabid. Penataan Ruang',
            'value'     => '19791017 200604 1 016',
        ]);
        Config::create([
            'shortcode' => 'TTD-KBD-PR',
            'field'     => 'TTD Kabid. Penataan Ruang',
            'value'     => 'images/configs/ttd.png',
        ]);

        // profil dinas pu
        Config::create([
            'shortcode' => 'VS-MS',
            'field'     => 'Visi dan Misi',
            'value'     => 'public/uploads/configs/visi-misi.html',
        ]);
        Config::create([
            'shortcode' => 'TGS-FGS',
            'field'     => 'Tugas dan Fungsi',
            'value'     => 'public/uploads/configs/tugas-fungsi.html',
        ]);
        Config::create([
            'shortcode' => 'MT-LBG',
            'field'     => 'Motto dan Lambang',
            'value'     => 'public/uploads/configs/motto-lambang.html',
        ]);
        Config::create([
            'shortcode' => 'STR-ORG',
            'field'     => 'Struktur Organisasi',
            'value'     => 'images/configs/structure.png',
        ]);

        // silde beranda
        Config::create([
            'shortcode' => 'SLD-1',
            'field'     => 'Slide 1',
            'value'     => 'images/configs/slide-1.png',
        ]);
        Config::create([
            'shortcode' => 'SLD-2',
            'field'     => 'Slide 2',
            'value'     => 'images/configs/slide-2.png',
        ]);
        Config::create([
            'shortcode' => 'SLD-3',
            'field'     => 'Slide 3',
            'value'     => 'images/configs/slide-3.png',
        ]);

        // video beranda
        Config::create([
            'shortcode' => 'VD',
            'field'     => 'Pedestrian Kota Kendari',
            'value'     => 'uploads/videos/Pedestrian Kota Kendari.mp4',
        ]);
        Config::create([
            'shortcode' => 'VD',
            'field'     => 'Taman Cinta Kendari',
            'value'     => 'uploads/videos/Taman Cinta Kendari.mp4',
        ]);

        // type infrastruktur
        Config::create([
            'shortcode' => 'TP-INF',
            'field'     => 'jalan',
            'value'     => 'Jalan',
        ]);
        Config::create([
            'shortcode' => 'TP-INF',
            'field'     => 'jembatan',
            'value'     => 'Jembatan',
        ]);
        Config::create([
            'shortcode' => 'TP-INF',
            'field'     => 'taman',
            'value'     => 'Taman',
        ]);

    }
}
