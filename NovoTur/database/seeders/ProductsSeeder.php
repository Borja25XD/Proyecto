<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Cubregrip - Bullpadel',
                'short_name' => 'CUBREGRIP',
                'description' => 'Para jugadores de todos los niveles que quieren mejorar la adherencia de su grip.
                
                Ideal para los jugadores de todos los niveles que quieren mejorar la adherencia de su grip.',
                'price' => 5,
                'category' => 'Accesories',
                'brand' => 'Bullpadel',
                'url' => 'cubregrip-bullpadel',
            ],
            [
                'name' => 'Desodorante de calzado',
                'short_name' => 'DESODORANTE',
                'description' => 'Este desodorante permite neutralizar eficazmente los malos olores del calzado deportivo.

                Puedes quitarte las zapatillasconfiadamente. El spray neutralizador BAMA no enmascara los olores, los elimina y deja un perfume fresco. MUY fácil de usar.',
                'price' => 6,
                'category' => 'Accesories',
                'brand' => 'Bama',
                'url' => 'desodorante-bama-calzado',
            ],
            [
                'name' => 'Gorra - Adidas',
                'short_name' => 'GORRA',
                'description' => 'Jugadores de Padel/Tenis que busquen una gorra con buena protección solar.

                Esta gorra deportiva Adidas te protegerá del sol y te aportará mucha comodidad gracias a su ligereza.',
                'price' => 17,
                'category' => 'Accesories',
                'brand' => 'Adidas',
                'url' => 'gorra-adidas',
            ],
            [
                'name' => 'Magnesio líquido',
                'short_name' => 'MAGNESIO',
                'description' => 'Nuestro equipo ha creado este magnesio para los escaladores que sudan poco en escalada pero quieren un magnesio con un poco de agarre sin demasiado alcohol.

                Con poco porcentaje de alcohol (30%) para cuidar la piel de las manos, seca menos las manos después de su uso. Se puede utilizar como complemento del magnesio en polvo.',
                'price' => 7,
                'category' => 'Accesories',
                'brand' => 'Simond',
                'url' => 'magnesioliquido-simond',
            ],
            [
                'name' => 'Munequeras - Adidas',
                'short_name' => 'MUNEQUERAS',
                'description' => 'Para la práctica de deportes de raqueta/pala con tiempo caluroso, también son adecuadas para otros deportes de raqueta/pala.

                Esta muñequera de deporte larga Adidas ofrece una absorción máxima del sudor. Detiene el chorreo a lo largo del brazo para facilitar el agarre de la raqueta/pala.',
                'price' => 12,
                'category' => 'Accesories',
                'brand' => 'Adidas',
                'url' => 'munequeras-adidas',
            ],
            [
                'name' => 'Venda de sujecion - Tarmaik',
                'short_name' => 'VENDA',
                'description' => 'Venda reutilizable de sujeción adaptada para vendar articulaciones o músculos durante la práctica deportiva.

                Venda de sujeción elástica y reutilizable 8 cm x 1,2 m. Útil con vendas autoadherentes para sujetar y proteger articulaciones y músculos.',
                'price' => 6,
                'category' => 'Accesories',
                'brand' => 'Tarmaik',
                'url' => 'vendasujecion-tarmaik',
            ],
            [
                'name' => 'Pelotas de padel - Babolat',
                'short_name' => 'PELOTASBAB',
                'description' => 'Jugadores de pádel en perfeccionamiento.

                Pelotas de pádel con presión, duraderas y vivas para los entrenamientos.',
                'price' => 5,
                'category' => 'Balls',
                'brand' => 'Babolat',
                'url' => 'pelota-de-padel-babolat',
            ],
            [
                'name' => 'Pelotas de padel - Head',
                'short_name' => 'PELOTASHEA',
                'description' => 'Ideal para jugadores que buscan una pelota viva para intercambios rápidos.

                La pelota Head Pro, en su versión S, tiene un núcleo totalmente nuevo, que le proporciona velocidad y dinamismo.',
                'price' => 5,
                'category' => 'Balls',
                'brand' => 'Head',
                'url' => 'pelota-de-padel-head',
            ],
            [
                'name' => 'Presurizador para pelotas - Kuikma',
                'short_name' => 'PRESURIZADORKUI',
                'description' => 'Mantiene la presión de las pelotas de pádel entre las dos partes para prolongar su vida útil',
                'price' => 20,
                'category' => 'Balls',
                'brand' => 'Kuikma',
                'url' => 'presurizador-padel-kuikma',
            ],
            [
                'name' => 'Presurizador para pelotas - Tuboplus',
                'short_name' => 'PRESURIZADORTUB',
                'description' => 'Presurizador de Pelotas, mantiene la presión de la pelota con el paso del tiempo, evitando que esta pierda bote en su uso',
                'price' => 20,
                'category' => 'Balls',
                'brand' => 'Tuboplus',
                'url' => 'presurizador-padel-tuboplus',
            ],
            [
                'name' => 'Pack de pelotas - Head',
                'short_name' => 'PACKHEA',
                'description' => 'Pack 3 botes Head Padel Profesional, para jugadores experimentados, las pelotas oficiales del circuito WTP',
                'price' => 21,
                'category' => 'Balls',
                'brand' => 'Head',
                'url' => 'tripack-pelota-padel-head',
            ],
            [
                'name' => 'Pack de pelotas - Kuikma',
                'short_name' => 'PACKKUI',
                'description' => 'Concebido para jugadores expertos que quieren una pelota que se mantiene dinámica en condiciones de juego lentas (temperatura moderada, nivel del mar, humedad)

                Ideal para jugadores de pádel expertos que quieren jugar con bola viva en condiciones de juego lentas (temperatura moderada, nivel del mar, humedad).',
                'price' => 13,
                'category' => 'Balls',
                'brand' => 'Kuikma',
                'url' => 'tripack-pelota-padel-kuikma',
            ],
            [
                'name' => 'Camiseta de nino - Artengo',
                'short_name' => 'CAMISETANINOART',
                'description' => 'Nuestros diseñadores han concebido esta camiseta para jóvenes jugadores de tenis que juegan con tiempo cálido, también adecuada para otros deportes de raqueta.

                Camiseta de tenis ligera y transpirable.Sus colores variados permiten combinarla con el short 500 de tu elección para lucir un estilo muy tendencia.',
                'price' => 12,
                'category' => 'Clothes',
                'brand' => 'Artengo',
                'url' => 'camiseta-artengo-nino',
            ],
            [
                'name' => 'Camiseta de hombre - Black Crown',
                'short_name' => 'CAMISETAHOMBREBLA',
                'description' => 'Fabricado con poliamida y elastano, fibras innovadoras que aportan ligereza, movilidad y comodidad. Son de secado rápido, absorben la humedad y están bien ventilados.',
                'price' => 32,
                'category' => 'Clothes',
                'brand' => 'Blackcrown',
                'url' => 'camiseta-blackcrown-hombre',
            ],
            [
                'name' => 'Camiseta de mujer - Black Crown',
                'short_name' => 'CAMISETAMUJERBLA',
                'description' => 'Es transpirable, absorbe la humedad y se seca rápidamente. Proporcionan ligereza, movilidad y comodidad. Con dos grandes bolsillos y cintura elástica.',
                'price' => 46,
                'category' => 'Clothes',
                'brand' => 'Blackcrown',
                'url' => 'camiseta-blackcrown-mujer',
            ],
            [
                'name' => 'Pantalon de hombre - Artengo',
                'short_name' => 'PANTALONHOMBREART',
                'description' => 'Nuestros equipos de desarrollo han creado este pantalón para que puedas iniciarte en los deportes de raqueta sin pasar calor.

                Pantalón corto de tenis para sentirse cómodo en la cancha. Ligero y con una buena libertad de movimientos, cómodo de llevar mientras se juega. Bolsillos grandes para guardar las pelotas sin molestias.',
                'price' => 6,
                'category' => 'Clothes',
                'brand' => 'Artengo',
                'url' => 'pantalon-artengo-hombre',
            ],
            [
                'name' => 'Pantalon de mujer - Artengo',
                'short_name' => 'PANTALONMUJERART',
                'description' => 'Nuestro equipo, apasionado por el tenis, ha concebido este short de tenis para partidos o entrenamientos.

                Con este short transpirable, ¡estas listo para una serie de intercambios o puntos! Bolsillos de diseno especial para guardar las pelotas.',
                'price' => 12,
                'category' => 'Clothes',
                'brand' => 'Artengo',
                'url' => 'pantalon-artengo-mujer',
            ],
            [
                'name' => 'Vestido de nina - Artengo',
                'short_name' => 'VESTIDONINAART',
                'description' => 'Nuestros disenadores han concebido este vestido para la practica del tenis, prenda tambien adecuada para otros deportes de raqueta.

                Vestido "gran estilo" ¡para que tu futura campeona gane con clase!',
                'price' => 20,
                'category' => 'Clothes',
                'brand' => 'Artengo',
                'url' => 'vestido-artengo-nina',
            ],
            [
                'name' => 'Pala de padel de nino - Artengo',
                'short_name' => 'PALANINOART',
                'description' => 'Ideal para jugadores de padel junior (de 9 a 11 anos) en iniciacion.

                Ideal para jugadores de padel de nivel iniciacion que buscan una pala que aune manejabilidad y control.',
                'price' => 25,
                'category' => 'Padelbat',
                'brand' => 'Artengo',
                'url' => 'pala-de-padel-artengo-nino',
            ],
            [
                'name' => 'Pala de padel - Babolat',
                'short_name' => 'PALABAB',
                'description' => 'Concebida para jugadores de pádel en perfeccionamiento.

                Pala de pádel polivalente en forma de lágrima, perfecta si está buscando potencia y control al mismo tiempo.',
                'price' => 85,
                'category' => 'Padelbat',
                'brand' => 'Babolat',
                'url' => 'pala-de-padel-babolat',
            ],
            [
                'name' => 'Pala de padel - Babolat',
                'short_name' => 'PALABAB2',
                'description' => 'Concebida para jugadores de pádel expertos.

                La Babolat Technical Viper es una pala de pádel para jugadores expertos que buscan potencia y precisión en los golpes de ataque.',
                'price' => 290,
                'category' => 'Padelbat',
                'brand' => 'Babolat',
                'url' => 'pala-de-padel-babolat2',
            ],
            [
                'name' => 'Pala de padel - Head',
                'short_name' => 'PALAHEA',
                'description' => 'Concebido para jugadores de pádel en perfeccionamiento.

                Ideal para jugadores de pádel en perfeccionamiento que buscan una pala de pádel potente.',
                'price' => 90,
                'category' => 'Padelbat',
                'brand' => 'Head',
                'url' => 'pala-de-padel-head',
            ],
            [
                'name' => 'Pala de padel - Head',
                'short_name' => 'PALAHEA2',
                'description' => 'Concebida para jugadores de pádel expertos.

                Mejora el toque, la precisión y la potencia con la PALA DE PÁDEL ALPHA ELITE, la pala más potente de una gama orientada al control.',
                'price' => 160,
                'category' => 'Padelbat',
                'brand' => 'Head',
                'url' => 'pala-de-padel-head2',
            ],
            [
                'name' => 'Pala de padel de nino - Kuikma',
                'short_name' => 'PALANINOKUI',
                'description' => '',
                'price' => 45,
                'category' => 'Padelbat',
                'brand' => 'Kuikma',
                'url' => 'pala-padel-kuikma-nino',
            ],
            [
                'name' => 'Paletero basico - Black Crown',
                'short_name' => 'PALETEROBLA',
                'description' => 'Zona térmica para 3 palas. Amplia zona central. Bolsillo inferior para los zapatos. Bolsillos para objetos personales. Correa ergonómica extraíble y ajustable. Asas acolchadas.',
                'price' => 74,
                'category' => 'Padelbatbag',
                'brand' => 'Blackcrown',
                'url' => 'paletero-blackcrown',
            ],
            [
                'name' => 'Paletero basico - Bullpadel',
                'short_name' => 'PALETEROBAB',
                'description' => 'Concebido para jugadoras de pádel en perfeccionamiento.

                Es ideal para jugadoras de pádel en perfeccionamiento que quieren transportar sus enseres y proteger las palas de pádel.',
                'price' => 35,
                'category' => 'Padelbatbag',
                'brand' => 'Bullpad',
                'url' => 'paletero-bullpadel',
            ],
            [
                'name' => 'Paletero mochila - Bullpadel',
                'short_name' => 'PALETEROBUL',
                'description' => 'Concebida para jugadores de pádel expertos.

                Mochila de pádel elegida por Juan Tello y Fede Chingotto (jugadores del WPT). Es ideal para jugadores de pádel expertos que quieren transportar sus enseres y proteger las palas de pádel.',
                'price' => 50,
                'category' => 'Padelbatbag',
                'brand' => 'Bullpad',
                'url' => 'paletero-bullpadelbag',
            ],
            [
                'name' => 'Paletero nextGen - Bullpadel',
                'short_name' => 'PALETERONEXBUL',
                'description' => 'Concebido para jugadores de pádel expertos.

                Paletero ideal para jugadores de pádel expertos que quieren transportar sus enseres y proteger las palas de pádel.',
                'price' => 73,
                'category' => 'Padelbatbag',
                'brand' => 'Bullpad',
                'url' => 'paletero-bullpadelnext',
            ],
            [
                'name' => 'Paletero basico - Head',
                'short_name' => 'PALETEROHEA',
                'description' => 'Concebido para jugadores de pádel de nivel iniciación.

                Pequeño paletero de pádel ideal para jugadores de pádel de nivel iniciación.',
                'price' => 35,
                'category' => 'Padelbatbag',
                'brand' => 'Head',
                'url' => 'paletero-head',
            ],
            [
                'name' => 'Paletero basico - Kuikma',
                'short_name' => 'PALETEROKUI',
                'description' => 'Jugadores de pádel expertos

                Mochila ideal para jugadores de pádel expertos que buscan una bolsa para transportar las palas de pádel y todo el conjunto.',
                'price' => 35,
                'category' => 'Padelbatbag',
                'brand' => 'Kuikma',
                'url' => 'paletero-kuikma',
            ],
            [
                'name' => 'Deportivas de mujer - Artengo',
                'short_name' => 'DEPORMUJERART',
                'description' => 'La práctica del pádel, de nivel experto.

                Estas zapatillas de pádel te aportarán la sujeción y la duración necesarias para los desplazamientos intensivos.',
                'price' => 40,
                'category' => 'Sportshoes',
                'brand' => 'Artengo',
                'url' => 'zapatillas-artengo-mujer',
            ],
            [
                'name' => 'Deportivas de hombre - Babolat',
                'short_name' => 'DEPORHOMBREBAB',
                'description' => 'Concebidas para jugar al pádel, nivel experto.

                Las zapatillas Babolat Jet Premura se han concebido para jugar al pádel, nivel experto. Las zapatillas de Juan Lebron, número 1 mundial.',
                'price' => 150,
                'category' => 'Sportshoes',
                'brand' => 'Babolat',
                'url' => 'zapatillas-babolat-hombre',
            ],
            [
                'name' => 'Deportivas de hombre - Bpthermofit',
                'short_name' => 'DEPORHOMBREBPT',
                'description' => 'Concebidas para jugadores de pádel expertos.

                Las zapatillas Bpthermofit movea 22 son un modelo polivalente para los competidores de pádel. Tienen refuerzos para una gran duración y son cómodas gracias al mesh de punto en la puntera,',
                'price' => 115,
                'category' => 'Sportshoes',
                'brand' => 'Bpthermofit',
                'url' => 'zapatillas-bpthermofit-hombre',
            ],
            [
                'name' => 'Deportivas de mujer - Kuikma',
                'short_name' => 'DEPORMUJERKUI',
                'description' => 'Concebidas para la práctica del pádel nivel experto.

                Estas zapatillas de pádel te aportarán el dinamismo necesario en los desplazamientos intensivos gracias a su ligereza y su flexibilidad.',
                'price' => 65,
                'category' => 'Sportshoes',
                'brand' => 'Kuikma',
                'url' => 'zapatillas-kuikma-mujer',
            ],
            [
                'name' => 'Deportivas de nino - Kuikma',
                'short_name' => 'DEPORNINOKUI',
                'description' => 'La práctica del pádel, de nivel iniciación

                Las zapatillas de pádel aportarán el agarre necesario a los jóvenes jugadores de pádel para jugar sobre hierba sintética con arena sin resbalar.',
                'price' => 19,
                'category' => 'Sportshoes',
                'brand' => 'Kuikma',
                'url' => 'zapatillas-kuikma-nino',
            ],
            [
                'name' => 'Deportivas de nino - Kuikma',
                'short_name' => 'DEPORNINOKUI2',
                'description' => 'Para la práctica del pádel, de nivel perfeccionamiento.

                Las zapatillas de pádel te aportarán el agarre necesario para jugar sobre hierba sintética con arena y amortiguación para una mejor absorción de los impactos.',
                'price' => 28,
                'category' => 'Sportshoes',
                'brand' => 'Kuikma',
                'url' => 'zapatillas-kuikma-nino2',
            ],
        ];

        DB::table('products')->insert($products);
    }
}
