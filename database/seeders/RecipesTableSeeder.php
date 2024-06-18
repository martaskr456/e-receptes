<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'title' => 'Biezās pankūkas',
                'cooking_time' => 30,
                'ingredients' => 'Milti, piena produkti, olas, cukurs, sāls, cepamais pulveris',
                'instructions' => 'Sajauc miltus ar piena produktiem, pievieno olas, cukuru, sāli un cepamo pulveri. Cep pankūkas uz vidējas uguns līdz tās ir zeltaini brūnas.',
                'category_id' => 1,
                'is_private' => false,
                'user_id' => 1,
                'image' => 'images/pancake.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kartupeļu pankūkas',
                'cooking_time' => 30,
                'ingredients' => 'Kartupeļi, olas, milti, sīpoli, sāls, pipari',
                'instructions' => 'Sarīvē kartupeļus, pievieno olas, miltus, sarīvētu sīpolu, sāli un piparus. Cep pankūkas uz vidējas uguns līdz tās ir zeltaini brūnas.',
                'category_id' => 2,
                'is_private' => false,
                'user_id' => 1,
                'image' => 'images/patato_pancake.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ķirbju krēmzupa',
                'cooking_time' => 30,
                'ingredients' => 'Ķirbis, buljons, sīpoli, ķiploki, krējums, sāls, pipari',
                'instructions' => 'Sautē sīpolus un ķiplokus līdz tie ir mīksti. Pievieno ķirbju gabaliņus un buljonu, vāra līdz ķirbis ir mīksts. Pieliec krējumu, sāli un piparus, blenderē līdz gludai konsistencei.',
                'category_id' => 3,
                'is_private' => false,
                'user_id' => 1,
                'image' => 'images/pumkin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
