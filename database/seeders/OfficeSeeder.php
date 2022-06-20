<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            "id" => Str::uuid(),
            "name" => "Cikurut Office",
            "address" => "Jl. Cikurut No. 4, Cikurut, Kota Bandung, Jawa Barat 40133",
            "contactName" => "Anton Surya",
            "phone" => "089614568833",
            "image" => 'office11.jpg',
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Cikutra Office",
            "address" => "Jl. Cikutra No. 1, Cikutra, Kota Bandung, Jawa Barat 40132",
            "contactName" => "Jaya Kusuma",
            "phone" => "089614568840",
            "image" => 'office1.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Ciputra Office",
            "address" => "Jl. Ciputra No. 1, Ciputra, Jakarta Barat, DKI Jakarta 11432",
            "contactName" => "Budi Andri",
            "phone" => "081808188888",
            "image" => 'office2.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "BSD Office",
            "address" => "Jl. BSD No. 1, Serpong, Tangerang Selatan, Banten 21311",
            "contactName" => "Kesuma",
            "phone" => "082233333333",
            "image" => 'office3.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Pluit Office",
            "address" => "Jl. Pluit Raya No. 2, Pluit, Jakarta Utara, DKI Jakarta 31231",
            "contactName" => "Kolawit",
            "phone" => "082123134567",
            "image" => 'office4.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Percetakan Office",
            "address" => "Jl. Percetakan Negara 1 No. 3, Cempaka Putih, Jakarta Pusat, DKI Jakarta 12345",
            "contactName" => "Ronald",
            "phone" => "081212122133",
            "image" => 'office5.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Kemang Office",
            "address" => "Jl. Kemang Raya No. 4, Kemang, Jakarta Selatan, DKI Jakarta 21322",
            "contactName" => "Ariana",
            "phone" => "082245678901",
            "image" => 'office6.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Bungur Office",
            "address" => "Jl. Bungur No. 3, Mampang, Jakarta Selatan, DKI Jakarta 21322",
            "contactName" => "Chandra",
            "phone" => "081825409876",
            "image" => 'office7.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Foresta 1 Office",
            "address" => "Jl. Pagedangan No. 3, Pagedangan, Tangerang, Banten 21311",
            "contactName" => "Siti",
            "phone" => "082345678910",
            "image" => 'office8.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Foresta 2 Office",
            "address" => "Jl. Pagedangan No. 6, Pagedangan, Tangerang, Banten 21311",
            "contactName" => "Nur Azizah",
            "phone" => "085678904568",
            "image" => 'office9.jpg'
        ]);

        Office::create([
            "id" => Str::uuid(),
            "name" => "Menara Office",
            "address" => "Jl. M.H. Thamrin No. 1, Tanah Abang, Jakarta Pusat, DKI Jakarta 12346",
            "contactName" => "Kesuma",
            "phone" => "082233333333",
            "image" => 'office10.jpg'
        ]);

        Office::factory(20)->create();
    }
}
