<?php

namespace Database\Factories;

use App\Models\RoomStatus;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $view =array(
            'Enjoy our elegant 40 m² guest rooms, designed in warm beige tones and tailored to the needs of private and business travelers alike,this room have a large marble bathroom, a double bed, air conditioning, an additional work area with free internet access and a walk-in closet,Our superior rooms impress with a wonderful view of the city and the adjacent park.',
            ' Les Templiers is set in Berrias Et Casteljau and offers a restaurant, a garden and barbecue facilities. The accommodation is 43 km from Uzès, and guests benefit from complimentary WiFi and private parking available on site.The holiday home has 3 bedrooms, a flat-screen TV, an equipped kitchen with a dishwasher and a microwave, a washing machine, and 1 bathroom with a shower. For added convenience, the property can provide towels,electric heating consumption payable, wood for the fireplace bed linen for an extra charge.The holiday home offers a terrace. Guests at Les Templiers can enjoy table tennis on site, or hiking in the surroundings.Montélimar is 47 km from the accommodation, while Vallon-Pont-d’Arc is 15 km from the property. The nearest airport is Nîmes Alès Camargue Cévennes Airport, 70 km from Les Templiers.',
            'Boasting accommodation with a private pool, pool view and a terrace, Domaine de BERRE is situated in Berrias Et Casteljau. The property is 45 km from Uzès and free private parking is offered.The villa has 6 bedrooms, a flat-screen TV, an equipped kitchen with a dishwasher and a microwave, a washing machine, and 1 bathroom with a bidet. Towels and bed linen are available.Montélimar is 48 km from the villa, while Vallon-Pont-dʼArc is 16 km from the property. The nearest airport is Nîmes Alès Camargue Cévennes Airport, 71 km from Domaine de BERRE.',
            'Featuring a garden, a seasonal outdoor pool and pool views, Gîte de charme Jas de Berrias Ardèche du Sud Piscine is set in Berrias Et Casteljau. The air-conditioned accommodation is 44 km from Uzès, and guests benefit from complimentary WiFi and private parking available on site.The holiday home is located on the ground floor and is fitted with 1 bedroom, a flat-screen TV with satellite channels and a fully equipped kitchenette that provides guests with a dishwasher, a microwave, a washing machine, a fridge and an oven. Towels and bed linen are featured.A terrace is available for guests at the holiday home to use.',
            ' This property is 15 minutes walk from the beach. Boasting air-conditioned accommodation with a private pool, Location avec piscine Sud Ardèche is situated in Berrias Et Casteljau. The property is 46 km from Uzès, and complimentary private parking is available.The holiday home features 3 bedrooms, a flat-screen TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge and an oven. Towels and bed linen are featured in this accommodation.In addition to a seasonal outdoor pool, the holiday home also features a sun terrace.Montélimar is 47 km from Location avec piscine Sud Ardèche, while Vallon-Pont-d Arc is 15 km from the property. The nearest airport is Nîmes Alès Camargue Cévennes Airport, 73 km from the accommodation.',
            'Featuring a garden, a seasonal outdoor pool and pool views, Gîte de charme Jas de Berrias Ardèche du Sud Piscine is set in Berrias Et Casteljau. The air-conditioned accommodation is 44 km from Uzès, and guests benefit from complimentary WiFi and private parking available on site.The holiday home is located on the ground floor and is fitted with 1 bedroom, a flat-screen TV with satellite channels and a fully equipped kitchenette that provides guests with a dishwasher, a microwave, a washing machine, a fridge and an oven. Towels and bed linen are featured.A terrace is available for guests at the holiday home to use.',
            'Boasting a seasonal outdoor pool and a fitness room, Chambres d hôtes l Antre de Pierres offers accommodation set in Berrias Et Casteljau, 44 km from Uzès.All units feature air conditioning and a flat-screen TV. There is a fully equipped private bathroom with shower and a hairdryer.A buffet breakfast is available every morning at the bed and breakfast.Chambres d hôtes l Antre de Pierres offers a terrace.After a day of hiking or cycling, guests can relax in the shared lounge area.',
            'Maison avec SPA Ardèche-Cévennes is located in Banne and offers a garden and a terrace. The air-conditioned accommodation is 26 km from Alès.The holiday home features 2 bedrooms, a flat-screen TV, an equipped kitchen with a dishwasher and a microwave, a washing machine, and 1 bathroom with a shower.Vallon-Pont-dʼArc is 19 km from the holiday home, while Uzès is 43 km away. The nearest airport is Nîmes Alès Camargue Cévennes Airport, 69 km from Maison avec SPA Ardèche-Cévennes.',    
        );
        $price = array(
            1000,
            5000,
            6500,
            7000,
            8500,
            9500,
            12000,
            15000,
            17500,
            20000,
        );
        static $nbr = 1;
        return [
            'type_id' => Type::all()->random()->id,
            'room_status_id' => RoomStatus::all()->random()->id,
            'number' => $nbr++,
            'capacity' => $this->faker->numberBetween(1,8),
            'price' => $this->faker->randomElement($price),
            'view' => $this->faker->randomElement($view),
            
        ];
    }
}
