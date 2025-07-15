<?php
namespace Database\Seeders;



use App\Models\StokLahan;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stok_lahans')->delete();

        StokLahan::create([
            'jenis_kendaraan' => 'Motor',
            'total_slot'      => '90',
        ]);

        StokLahan::create([
            'jenis_kendaraan' => 'Mobil',
            'total_slot'      => '20',
        ]);

    }
}
