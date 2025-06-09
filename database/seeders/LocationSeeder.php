<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: add address
        Location::create(([
            'name' => 'Yogyakarta',
            'photo_path' => 'ghostbumps_large.png',
            'address' => 'No. 20, Jalan P.B. Sudirman, Dauh Puri Kelod, Denpasar Barat, Denpasar, Bali, Indonesia',
            'description' => 'In Yogyakarta, Indonesia, an abandoned hospital is known as one of the region’s most haunted sites. Once a busy medical facility, it was shut down due to financial troubles and mysterious deaths. Locals believe the spirits of former patients and staff still roam its halls. Visitors report hearing ghostly cries, seeing shadowy figures, and feeling an eerie presence. Legends speak of a vanishing nurse, headless spirits, and an unseen force pushing intruders away. Despite redevelopment attempts, paranormal disturbances persist.',
            'short_description' => 'Experience horror with a hint of heritage and culture.',
        ]));
    
        // TODO: add address
        Location::create(([
            'name' => 'Surabaya',
            'photo_path' => 'ghostbumps_large.png',
            'address' => 'No. 20, Jalan P.B. Sudirman, Dauh Puri Kelod, Denpasar Barat, Denpasar, Bali, Indonesia',
            'description' => 'In Surabaya, Indonesia, the vintage European-styled abandoned house is shrouded in dark legends. A wealthy family allegedly made a supernatural pact for fortune but vanished after breaking it. Locals report eerie whispers, shadowy figures, and ghostly apparitions. Those who enter feel an overwhelming dread, with some experiencing misfortune afterward. Attempts to demolish the mansion mysteriously fail, fueling beliefs that restless spirits refuse to leave.',
            'short_description' => 'Go through the untold story of the lost souls from the unfortunate tragedy.',
        ]));

        Location::create(([
            'name' => 'Denpasar',
            'photo_path' => 'ghostbumps_large.png',
            'address' => 'No. 20, Jalan P.B. Sudirman, Dauh Puri Kelod, Denpasar Barat, Denpasar, Bali, Indonesia',
            'description' => 'In Denpasar, Bali, an abandoned hotel stands in eerie silence, surrounded by ghostly legends. Once meant to be a luxurious retreat, the project was mysteriously abandoned, rumored to be cursed for disturbing sacred land. Visitors report shadowy figures, echoing footsteps, and whispers in empty halls. Some claim to see a ghostly woman in white wandering the corridors. Locals believe the spirits are restless, forever trapped within the ruins.',
            'short_description' => 'Immerse in a tale of the unfinished project and the legends around the ruins.',
        ]));
    }
}
