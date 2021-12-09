<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(45);
        return [
            'thumbnail' => 'images/publish/galleries/galleries.jpg',
            'slug'      => Str::slug($title, '-'),
            'title'     => $title,
            'file'      => 'uploads/galleries/galleries.html',
            'created_by'=> mt_rand(1,3),
            'sector_id' => mt_rand(1,6),
        ];
    }
}
