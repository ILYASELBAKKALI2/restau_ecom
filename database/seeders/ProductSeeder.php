<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                
                'name'=>'Tiramisu framboises',
                'details'=>'Dessert aux framboises, cheesecake, bagatelle, souris dans un verre.',
                'image'=>'assets/images/tiramisu.jpg',
                'price'=>'25.00',
                'category_id'=>'5',
                'old_price'=>'0',
            ],
            [
              
                'name'=>'Pizza Margarita',
                'details'=>'Pizza Margarita Délicieuse en tranches.',
                'image'=>'assets/images/Pizza Margarita.jpg',
                'price'=>'35.00',
                'category_id'=>'6',
                'old_price'=>'0',
            ],
            [
                
                'name'=>'Poisson pané',
                'details'=>'assiette de croquettes de poisson pané servi avec des frites française.',
                'image'=>'assets/images/Poisson pané.jpg',
                'price'=>'40.00',
                'category_id'=>'3',
                'old_price'=>'0',
            ],
            [
               
                'name'=>'Hot-dog',
                'details'=>'Hot-dog avec la salade et les concombres avec le ketchup de tomate et la moutarde.',
                'image'=>'assets/images/hotdog.jpg',
                'price'=>'25.00',
                'category_id'=>'1',
                'old_price'=>'0',
                
            ],
            [
              
                'name'=>'Salade Delight',
                'details'=>'Dîner santé du bol Bouddha avec poulet grillé, quinoa, épinards.',
                'image'=>'assets/images/saladeDelight.jpg',
                'price'=>'40.00',
                'category_id'=>'2',
                'old_price'=>'0',
                
            ],[
             
                'name'=>'Coca-Cola En Offre',
                'details'=>'Deux Bouteilles de Coke.',
                'image'=>'assets/images/coca cola.jpg',
                'price'=>'21.25',
                'category_id'=>'4',
                'old_price'=>'25',
            ],[
             
                'name'=>'Crème Au Caramel',
                'details'=>'Délicieux dessert crème au caramel',
                'image'=>'assets/images/créme caramel.jpg',
                'price'=>'20.00',
                'category_id'=>'5',
                'old_price'=>'0',
            ],[
               
                'name'=>'Gaufres Belges',
                'details'=>'Gaufres belges et sauce au chocolat dans une saucière ',
                'image'=>'assets/images/gaufre belgique.jpg',
                'price'=>'15.00',
                'category_id'=>'5',
                'old_price'=>'0',
            ],[
                
                'name'=>"Jus D'orange",
                'details'=>"Verre de jus d'orange aux oranges",
                'image'=>"assets/images/jus d'orange.jpg",
                'price'=>'12.00',
                'category_id'=>'4',
                'old_price'=>'0',
            ],[
                
                'name'=>'Smoothie Fraise',
                'details'=>'Smoothie fraise dans un grand verre ',
                'image'=>'assets/images/fraise.jpg',
                'price'=>'17.00',
                'category_id'=>'4',
                'old_price'=>'0',
            ],[
               
                'name'=>'Red Bull',
                'details'=>'Bouteille et verre de Coke.',
                'image'=>'assets/images/red-bull.jpg',
                'price'=>'25.00',
                'category_id'=>'4',
                'old_price'=>'0',
            ],[
           
                'name'=>'Panna Cotta',
                'details'=>'Délicieuse panna cotta aux fruits rouges.',
                'image'=>'assets/images/panna-cotta.jpg',
                'price'=>'25.00',
                'category_id'=>'5',
                'old_price'=>'0',
            ],[
                
                'name'=>'Boules De Crème Glacée',
                'details'=>"De savoureuses boules de crème glacée rafraîchissante d'été avec des baies sauvages servies sur une assiette sombre",
                'image'=>'assets/images/Boules de crème glacée.jpg',
                'price'=>'15.00',
                'category_id'=>'5',
                'old_price'=>'0',
            ],[
               
                'name'=>'Salamon',
                'details'=>'Saumon grillé avec frites et asperges',
                'image'=>'assets/images/Salamon.jpg',
                'price'=>'50.00',
                'category_id'=>'3',
                'old_price'=>'0',
            ],[
                
                'name'=>'Pizza Au Pepperoni',
                'details'=>'Savoureuse pizza au pepperoni et ingrédients de cuisine tomates basilic',
                'image'=>'assets/images/pizza au pepperoni.jpg',
                'price'=>'35.00',
                'category_id'=>'6',
                'old_price'=>'0',
            ],[
                
                'name'=>'Pizza Italienne',
                'details'=>'Pizza italienne aux fruits de mer aux calmars, moules et crevettes',
                'image'=>'assets/images/Pizza italienne.jpg',
                'price'=>'40.00',
                'category_id'=>'6',
                'old_price'=>'0',
            ],[

                'name'=>'Pizzas Gourmet',
                'details'=>'Pizzas gourmet au feu de bois avec pepperoni, basilic et fromage',
                'image'=>'assets/images/Pizza gourmet.jpg',
                'price'=>'50.00',
                'category_id'=>'6',
                'old_price'=>'0',
            ],[
               
                'name'=>'Pizza Diabolo En Offre',
                'details'=>"Deux Pizzas diabolo chaudent avec piment jalapeno, fromage mozzarella, salami, ail, sauce tomate, huile d'olive et basilic isolé",
                'image'=>'assets/images/Pizza diabolo.jpg',
                'price'=>'100.00',
                'category_id'=>'6',
                'old_price'=>'120.00',
            ],[
                
                'name'=>'Pizza Napolitaine',
                'details'=>'Pizza napolitaine avec mozzarella de bufflonne et basilic.',
                'image'=>'assets/images/Pizza napolitaine.jpg',
                'price'=>'50.00',
                'category_id'=>'6',
                'old_price'=>'0',
            ],[
                
                'name'=>'Dorades',
                'details'=>'Dorades Grillées at Sauce de Curry Jaune Thaï',
                'image'=>'assets/images/Dorades.jpg',
                'price'=>'45.00',
                'category_id'=>'3',
                'old_price'=>'0',
            ],[
               
                'name'=>'Calamars',
                'details'=>'Frits calamars anneaux de riz rouge.',
                'image'=>'assets/images/calamars.jpg',
                'price'=>'50.00',
                'category_id'=>'3',
                'old_price'=>'0',
            ],[
                
                'name'=>'Filet De Poisson',
                'details'=>'Filet de poisson cuit au four avec légumes en papillote',
                'image'=>'assets/images/Filet de poisson.jpg',
                'price'=>'47.00',
                'category_id'=>'3',
                'old_price'=>'0',
            ],[
                
                'name'=>'Tacos',
                'details'=>'Tacos colorés de rue, crevettes - fruits de mer, poissons, grillés, prêts-à-mange',
                'image'=>'assets/images/tacos.jpg',
                'price'=>'200.00',
                'category_id'=>'1',
                'old_price'=>'230',
            ],[
                
                'name'=>'Burritos',
                'details'=>'Deux moitiés d’un burrito',           
                'image'=>'assets/images/burritos.jpg',
                'price'=>'25.00',
                'category_id'=>'1',
                'old_price'=>'0',
            ],[
                
                'name'=>'Panini',
                'details'=>'Panini au jambon et au fromage.',
                'image'=>'assets/images/panini.jpg',
                'price'=>'25.00',
                'category_id'=>'1',
                'old_price'=>'0',
            ],[
                
                'name'=>'Choripan',
                'details'=>'Choripan, au chorizo hot-dog et de sauce chimichurri, de la cuisine Argentine',
                'image'=>'assets/images/choripan.jpg',
                'price'=>'27.00',
                'category_id'=>'1',
                'old_price'=>'0',
            ],[
                
                'name'=>'Tortas',
                'details'=>'Boeuf mexicain maison Torta "sandwich"',
                'image'=>'assets/images/tortas.jpg',
                'price'=>'20.00',
                'category_id'=>'1',
                'old_price'=>'0',
            ],[
                
                'name'=>'Cuban',
                'details'=>'le porc rôti est recouvert de jambon, de fromage suisse, de cornichons et de moutarde jaune',
                'image'=>'assets/images/cuban.jpg',
                'price'=>'17.00',
                'category_id'=>'1',
                'old_price'=>'0',
            ],[
                
                'name'=>'Tacos En Offre',
                'details'=>'plat complet avec un tacos taille L avec frite ,croquette de poulet et un coca cola',
                'image'=>'assets/images/tacosOffre.jpeg',
                'price'=>'60.00',
                'category_id'=>'1',                
                'old_price'=>'78',
            ],[
                
                'name'=>'Salade Niçoise',
                'details'=>'salade Nicoise au thon, oeufs, haricots verts, tomates, olives, laitue et anchois ',
                'image'=>'assets/images/saladeniçoise.jpg',
                'price'=>'30.00',
                'category_id'=>'2',
                'old_price'=>'0',
            ],[
                
                'name'=>'Salade Riz au curry',
                'details'=>'Délicieux plat maison de poulet au Curry avec du riz',
                'image'=>'assets/images/curiedrice.jpg',
                'price'=>'30.00',
                'category_id'=>'2',
                'old_price'=>'0',
            ],[
                
                'name'=>'Salade Fruits',
                'details'=>'Salade de fruits frais',
                'image'=>'assets/images/saladeFruit.jpg',
                'price'=>'25.00',
                'category_id'=>'2',
                'old_price'=>'0',
            ],[
                
                'name'=>'Salade Vegan',
                'details'=>'Bol de déjeuner grillade végétalien. Salade de légumes avocat, quinoa, patate douce, tomate, épinards et pois chiches.',
                'image'=>'assets/images/VeganSalad.jpg',
                'price'=>'30.00',
                'category_id'=>'2',
                'old_price'=>'0',
            ],[
                
                'name'=>'Salade Niçoise En Offre',
                'details'=>'deux salade niçoise avec du thon, de la laitue, des haricots verts, des tomates, des œufs, et des pommes de terre.',
                'image'=>'assets/images/saladeniçoiseOffre.jpg',
                'price'=>'65.00',
                'category_id'=>'2',
                'old_price'=>'91',
            ],[
                
                'name'=>'Café',
                'details'=>'Café Au Lait.',
                'image'=>'assets/images/Café.jpg',
                'price'=>'10.00',
                'category_id'=>'4',
                'old_price'=>'0',
            ],[
                
                'name'=>'Dr Pepper',
                'details'=>'Canette de Coke.',
                'image'=>'assets/images/paper.jpg',
                'price'=>'10.00',
                'category_id'=>'4',
                'old_price'=>'0',
            ],[
                
                'name'=>'Shushi En Offre',
                'details'=>'Plat complet de sushi',
                'image'=>'assets/images/poisson.jpg',
                'price'=>'120.00',
                'category_id'=>'3',
                'old_price'=>'132',
            ],[
                
                'name'=>'Sandwich Baguette',
                'details'=>'Pain de blé entier italien sandwich sous-marin',
                'image'=>'assets/images/sandwichebaguette.jpg',
                'price'=>'24.00',
                'category_id'=>'1',
                'old_price'=>'0',
            ],[
                
                'name'=>'Crème Brulé',
                'details'=>'Crème Brulé au gout de citron',
                'image'=>'assets/images/créme brulé.jpg',
                'price'=>'13.00',
                'category_id'=>'5',
                'old_price'=>'0',
            ]
        ]); 
    }
}
