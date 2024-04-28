<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Article Pertama',
                'slug' => 'article-pertama',
                'category_id' => '1',
                'description' => '
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dicta perferendis nisi ad rerum numquam dolorum ab 
                    voluptate error aperiam quaerat omnis sed possimus sapiente autem sint tempora at placeat officia, corrupti incidunt delectus? 
                    Earum, recusandae quos explicabo, minus iure nobis rem obcaecati consectetur quibusdam reprehenderit ut. Maiores doloremque, 
                    nam rem quis porro quisquam sunt reiciendis, voluptas mollitia rerum sit. 
                    Laboriosam ducimus reprehenderit doloribus expedita incidunt autem maxime labore vitae. 
                    Nemo labore maiores, impedit illum similique adipisci magni laboriosam incidunt 
                    officia quam voluptatem suscipit voluptatum neque libero quia recusandae dolor quod 
                    repudiandae? Velit officiis asperiores maiores officia nostrum vero corrupti?.'
            ],
            [

                'title' => 'Article Kedua',
                'slug' => 'article-kedua',
                'category_id' => '2',
                'description' => '
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dicta perferendis nisi ad rerum numquam dolorum ab 
                    voluptate error aperiam quaerat omnis sed possimus sapiente autem sint tempora at placeat officia, corrupti incidunt delectus? 
                    Earum, recusandae quos explicabo, minus iure nobis rem obcaecati consectetur quibusdam reprehenderit ut. Maiores doloremque, 
                    nam rem quis porro quisquam sunt reiciendis, voluptas mollitia rerum sit. 
                    Laboriosam ducimus reprehenderit doloribus expedita incidunt autem maxime labore vitae. 
                    Nemo labore maiores, impedit illum similique adipisci magni laboriosam incidunt 
                    officia quam voluptatem suscipit voluptatum neque libero quia recusandae dolor quod 
                    repudiandae? Velit officiis asperiores maiores officia nostrum vero corrupti?.'
            ],
            [
                'title' => 'Article Ketiga',
                'slug' => 'article-ketiga',
                'category_id' => '3',
                'description' => '
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dicta perferendis nisi ad rerum numquam dolorum ab 
                    voluptate error aperiam quaerat omnis sed possimus sapiente autem sint tempora at placeat officia, corrupti incidunt delectus? 
                    Earum, recusandae quos explicabo, minus iure nobis rem obcaecati consectetur quibusdam reprehenderit ut. Maiores doloremque, 
                    nam rem quis porro quisquam sunt reiciendis, voluptas mollitia rerum sit. 
                    Laboriosam ducimus reprehenderit doloribus expedita incidunt autem maxime labore vitae. 
                    Nemo labore maiores, impedit illum similique adipisci magni laboriosam incidunt 
                    officia quam voluptatem suscipit voluptatum neque libero quia recusandae dolor quod 
                    repudiandae? Velit officiis asperiores maiores officia nostrum vero corrupti?.'
            ],
            [
                'title' => 'Article Keempat',
                'slug' => 'article-keempat',
                'category_id' => '1',
                'description' => '
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dicta perferendis nisi ad rerum numquam dolorum ab 
                    voluptate error aperiam quaerat omnis sed possimus sapiente autem sint tempora at placeat officia, corrupti incidunt delectus? 
                    Earum, recusandae quos explicabo, minus iure nobis rem obcaecati consectetur quibusdam reprehenderit ut. Maiores doloremque, 
                    nam rem quis porro quisquam sunt reiciendis, voluptas mollitia rerum sit. 
                    Laboriosam ducimus reprehenderit doloribus expedita incidunt autem maxime labore vitae. 
                    Nemo labore maiores, impedit illum similique adipisci magni laboriosam incidunt 
                    officia quam voluptatem suscipit voluptatum neque libero quia recusandae dolor quod 
                    repudiandae? Velit officiis asperiores maiores officia nostrum vero corrupti?.'
            ],
            [
                'title' => 'Article Kelima',
                'slug' => 'article-kelima',
                'category_id' => '2',
                'description' => '
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dicta perferendis nisi ad rerum numquam dolorum ab 
                    voluptate error aperiam quaerat omnis sed possimus sapiente autem sint tempora at placeat officia, corrupti incidunt delectus? 
                    Earum, recusandae quos explicabo, minus iure nobis rem obcaecati consectetur quibusdam reprehenderit ut. Maiores doloremque, 
                    nam rem quis porro quisquam sunt reiciendis, voluptas mollitia rerum sit. 
                    Laboriosam ducimus reprehenderit doloribus expedita incidunt autem maxime labore vitae. 
                    Nemo labore maiores, impedit illum similique adipisci magni laboriosam incidunt 
                    officia quam voluptatem suscipit voluptatum neque libero quia recusandae dolor quod 
                    repudiandae? Velit officiis asperiores maiores officia nostrum vero corrupti?.'
            ],
            [
                'title' => 'Article Keenam',
                'slug' => 'article-keenam',
                'category_id' => '3',
                'description' => '
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dicta perferendis nisi ad rerum numquam dolorum ab 
                    voluptate error aperiam quaerat omnis sed possimus sapiente autem sint tempora at placeat officia, corrupti incidunt delectus? 
                    Earum, recusandae quos explicabo, minus iure nobis rem obcaecati consectetur quibusdam reprehenderit ut. Maiores doloremque, 
                    nam rem quis porro quisquam sunt reiciendis, voluptas mollitia rerum sit. 
                    Laboriosam ducimus reprehenderit doloribus expedita incidunt autem maxime labore vitae. 
                    Nemo labore maiores, impedit illum similique adipisci magni laboriosam incidunt 
                    officia quam voluptatem suscipit voluptatum neque libero quia recusandae dolor quod 
                    repudiandae? Velit officiis asperiores maiores officia nostrum vero corrupti?.'
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
