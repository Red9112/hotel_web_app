<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $names = [
            'Occupied', 
            ' Stayover',
             'On-Change',
              'Do Not Disturb',
               'Sleep-out',
                'Skipper',
                 'Vacant and ready',
                  'Out of Order',
                   'Out of Service',
                    'Lockout',
                     'Vacant and Clean',
            
        ];

        $codes = [
            'OCC', 
            'ST',
             'ONC',
              'DND',
               'SO', 
               'SK',
                'VAR', 
                'OOO',
                 'OOS', 
                 'LO',
                  'VC',
              
        ];

        $informations = [
            'A guest is currently occupied in the room',
            ' The guest is not expected to check out today and will remain at least one more night.',
            'The guest has departed, but the room has not yet been cleaned and ready for sale.',
            'The guest has requested not to be disturbed',
            ' A guest is registered to the room, but the bed has not been used.',
            'The guest has left the hotel without making arrangements to settle his or her account.',
            'The room has been cleaned and inspected and is ready for an arriving guest.',
            'Rooms kept under out of order are not sellable and these rooms are deducted from the hotel inventory.',
             'Rooms kept under out of service are not deducted from the hotel inventory. This is a temporary blocking and reasons may be bulb fuse, TV remote not working, Kettle not working etc.',
            'The room has been locked so that the guest cannot re-enter until he or she is cleared by a hotel official.', 
            'Room is Vacant and Cleaned by the housekeeper.',
            
        ];
        
        for ($i = 0; $i < count($names); $i++) {
           
            DB::table('room_statuses')->insert([
                'name' =>  $names[$i],
                'code' =>  $codes[$i],
                'information' =>  $informations[$i]
            ]);
        }
    }
}
