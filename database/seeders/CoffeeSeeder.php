<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen(__DIR__ . '/coffeeData.csv', 'r')) !== false) {
        while (($data = fgetcsv($handle))) {
            if (!empty($data[0])) {
                DB::table('coffees')->insert([
                    // 'id' => $data[0],    //LaravelのEloquentモデルの主キーは自動インクリメントされるため，明示的に指定しなくて良い．
                    'bitter' => $data[1],
                    'acidity' => $data[2],
                    'rich' => $data[3],
                    'sweet' => $data[4],
                    'smell' => $data[5],
                    'roasted' => $data[6],
                    'name' => $data[7],
                    'area_name' => $data[8],
                    'species_name' => $data[9],
                    'image' => $data[10],
                    'shop_name' => $data[11],
                    'shop_url' => $data[12],
                    'map' => $data[13],
                    'official_url' => $data[14],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),   //DateTime()ではなく，Carbon()を使用して，formatを明示的に指定．
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
        fclose($handle);
    }
    }
}
