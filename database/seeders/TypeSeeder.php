<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $name = [
            'Standard Room',
            'Moderate Room',
            'Single Room',
            'Twin Room',
            'Double Room',
            'Triple Room',
            'Quad Room',
            'King Room',
            'Queen Room',
            'Suite Room',
            'DUPLEX Room',
            'EFFICIENCY Room',
            
        ];

        $information = [
            'includes all kinds of basic facilities such as a table, chair, desk, cupboard, dressing table, DVD player, television, telephone, coffee maker and a private bathroom.',
            'The Moderate Room offers a stunning view include the semi-double beds in the room. Each room of moderate room can be converted into a twin room with an extra bed. This room is designed to stay the extra number of people such as business or sightseeing travelers. The room is furnished with all luxury items such as television, telephone, AC, DVD player, table, chair, almirah, private stunning bathroom.',
            'A single room has one single bed for single occupancy. An additional bed (called an extra bed) may be added to this room at the request of a guest and charged accordingly.The size of the bed is normally 3 feet by 6 feet. However, the concept of single rooms is vanishing nowadays. Mostly, hotels have twin or double rooms, and the charge for a single room is occupied by one person.',
            'A twin room has two single beds for double occupancy. An extra bed may be added to this room at the request of a guest and charged accordingly. Here the bed size is normally 3 feet by 6 feet. These rooms are suitable for sharing accommodation among a group of delegates meeting.',
            'A double room has one double bed for double occupancy. An extra bed may be added to this room at the request of a guest and charged accordingly. The size of the double bed is generally 4.5 feet by 6 feet.',
            'A triple room has three separate single beds and can be occupied by three guests. This type of room is suitable for groups and delegates of meetings and conferences.',
            'A quad room has four separate single beds and can accommodate four persons together in the same room.',
            'A king room has a king-size bed. The size of the bed is 6 feet by 6 feet. An extra bed may be added to this room at the request of a guest and charged accordingly.',
            'A queen room has a queen-size bed. The size of the bed is 5 feet by 6 feet. An extra bed may be added to this room at the request of a guest and charged accordingly.',
            'A Suite room is comprised of more than one room. Occasionally, it can also be a single large room with clearly defined sleeping and sitting areas. The decor of such units is of very high standards, aimed to please the affluent guest who can afford the high tariffs of the room category.',
            'The duplex suite comprises two rooms situated on different floors, which are connected by an internal staircase. This suite is generally used by business guests who wish to use the lower level as an office and meeting place and the upper-level room as a bedroom. This type of room is quite expensive and only can be found in luxury hotels.',
            'An efficiency room has an attached kitchenette for guests preferring a longer duration of stay. Generally, this type of hotel room is found in holiday and health resorts where guests stay for a longer period of time.19. HOSPITALITY ROOM',
  
        ];

        for ($i = 0; $i < count($name); $i++) {
           
        DB::table('types')->insert([
            'name' =>  $name[$i],
            'description' =>  $information[$i]
        ]);
    }
    }
}
