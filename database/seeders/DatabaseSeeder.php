<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $games = [
            [
                'id' => 1,
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'releaseDate' => '2017-03-03',
                'metascore' => 97,
                'description' => 'Olvida todo lo que sabes acerca de los juegos de la serie The Legend of Zelda. Explora y descubre un mundo lleno de aventuras en The Legend of Zelda: Breath of the Wild, una nueva saga que rompe los esquemas de la aclamada serie. Viaja a través de praderas y bosques, y alcanza cimas de montañas mientras descubres cómo cayó en la ruina el reino de Hyrule en esta emocionante aventura al aire libre. Ahora con Nintendo Switch, tu aventura será más libre y extensa que nunca. Lleva tu consola y vive una gran aventura como Link de la manera que más te guste.',
                'imageUrl' => 'https://upload.wikimedia.org/wikipedia/en/c/c6/The_Legend_of_Zelda_Breath_of_the_Wild.jpg',
                'hours' => 90,
                'genres' => ['juego de rol'],
                'trailer' => 'zw47_q9wbBE',
            ],
            [
                'id' => 2,
                'title' => 'Elden Ring',
                'releaseDate' => '2022-02-25',
                'metascore' => 96,
                'description' => 'Álzate, Sinluz, y que la gracia te guíe para abrazar el poder del Círculo de Elden y encumbrarte como señor del Círculo en las Tierras Intermedias.  En las Tierras Intermedias gobernadas por la Reina Márika, la Eterna, el Círculo de Elden, origen del Árbol Áureo, ha sido destruido.  Los descendientes de Márika, todos semidioses, reclamaron los fragmentos del Círculo de Elden conocidos como Grandes Runas. Fue entonces cuando la demencial corrupción de su renovada fuerza provocó una guerra: la Devastación.  Una guerra que supuso el abandono de la Voluntad Mayor. Y ahora, la gracia que nos guía recaerá sobre el Sinluz desdeñado por la gracia del oro y exiliado de las Tierras Intermedias. Tú que has muerto, pero vives, con tu gracia tiempo ha perdida, recorre la senda hacia las Tierras Intermedias más allá del neblinoso mar para postrarte ante el Círculo de Elden.',
                'imageUrl' => 'https://m.media-amazon.com/images/I/6110RSDn3PL._AC_UF1000,1000_QL80_.jpg',
                'hours' => 100,
                'genres' => ['juego de rol'],
                'trailer' => 'E3Huy2cdih0',
            ],
            [
                'id' => 3,
                'title' => 'Animal Well',
                'releaseDate' => '2024-05-09',
                'metascore' => 91,
                'description' => 'Explora un laberinto complejo e interconectado y descubre todos sus secretos. Durante tu aventura, encontrarás objetos con los que manipular el entorno de maneras significativas y sorprendentes, y también conocerás criaturas hermosas pero perturbadoras. Sobrevive a lo que acecha en la oscuridad.',
                'imageUrl' => 'https://upload.wikimedia.org/wikipedia/en/6/65/Animal_Well_Cover_Art.jpg',
                'hours' => 10,
                'genres' => ['Aventura', 'Puzzles'],
                'trailer' => 'lwCcSEN3GEc',
            ],
            [
                'id' => 4,
                'title' => 'Metaphor: ReFantazio',
                'releaseDate' => '2024-10-11',
                'metascore' => 94,
                'description' => 'De los creadores de Persona 3, 4 y 5 llega Metaphor: ReFantazio, un original mundo de fantasía donde el protagonista emprenderá un viaje en compañía del hada Gallica para disipar la maldición que recae sobre el príncipe. Decide tu destino, afronta tus miedos y despierta los poderes del arquetipo que yace en tu interior. Despertar un arquetipo te otorgará la capacidad de canalizar y combinar las destrezas de clases únicas. Fortalece tus vínculos y forma un grupo para derrotar a poderosos enemigos y desvelar la verdadera naturaleza del reino.',
                'imageUrl' => 'https://upload.wikimedia.org/wikipedia/en/4/4d/Metaphor_Refantazio_Cover_Art.png',
                'hours' => 65,
                'genres' => ['Rol', 'Combate por turnos'],
                'trailer' => 'SjbgJaYi4NE',
            ],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}

