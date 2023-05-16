<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition(): array
    {

        /*
         *
         * Para crear un factory debes hacerlo de la siguinte forma
         * EL NOMBRE DEL FACTORY ES IGUAL AL MODELO
         * php artisan make:factory ImageFactory
         *
         * SE DEBE PUBLICAR EL MODELO DEL FACTORY Y PROTEGERLO
         *use App\Models\Post;
         * protected $model = Post::class;
         *
         * SE LLAMA A LA LIBRERIA STR DE ILUMINATE SI LA NECESITAN
         *
         * */


        $name = $this->faker->unique()->sentence();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1,2]),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
