<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('player')->insert([
            [
                'nama' => 'Alisson Becker',
                'posisi' => 'Goalkeeper',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p116535.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Caoimhín Kelleher',
                'posisi' => 'Goalkeeper',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p200720.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Virgil van Dijk',
                'posisi' => 'Defender',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p97032.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Ibrahima Konaté',
                'posisi' => 'Defender',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p204716.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Joe Gomez',
                'posisi' => 'Defender',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p171287.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Andy Robertson',
                'posisi' => 'Defender',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p122798.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Trent Alexander-Arnold',
                'posisi' => 'Defender',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p169187.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Jarell Quansah',
                'posisi' => 'Defender',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p441428.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Alexis Mac Allister',
                'posisi' => 'Midfielder',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p243016.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Dominik Szoboszlai',
                'posisi' => 'Midfielder',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p424876.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Curtis Jones',
                'posisi' => 'Midfielder',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p206915.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Wataru Endo',
                'posisi' => 'Midfielder',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p158983.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Ryan Gravenberch',
                'posisi' => 'Midfielder',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p441266.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Harvey Elliott',
                'posisi' => 'Midfielder',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p444884.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Mohamed Salah',
                'posisi' => 'Forward',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/250x250/p118748.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Darwin Núñez',
                'posisi' => 'Forward',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p447203.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Luis Díaz',
                'posisi' => 'Forward',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p244731.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Cody Gakpo',
                'posisi' => 'Forward',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p243298.png',
                'Authorization' => ''
            ],
            [
                'nama' => 'Diogo Jota',
                'posisi' => 'Forward',
                'foto' => 'https://resources.premierleague.com/premierleague/photos/players/110x140/p194634.png',
                'Authorization' => ''
            ]
        ]);
    }
}
