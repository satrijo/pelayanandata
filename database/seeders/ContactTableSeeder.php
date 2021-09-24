<?php

namespace Database\Seeders;

use App\Models\Contact;


use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = Contact::create([
            'kontak' => 'BMKG Pusat',
            'latlon' => '-6.156027,106.84159',
            'alamat' => 'Jl. Angkasa 1 No.2, RW.10, Gn. Sahari Sel., Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10610',
            'telp'   => '082111119138',
            'email'  => 'stryuw@gmail.com',

        ]);
    }
}
