<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(15);
        return [
            'slug'          => Str::slug($title, '-'),
            'date'          => now(),
            'description'   => $this->faker->text(55),
            'file'          => 'public/uploads/news/news.html',
            'thumbnail'     => 'images/publish/news/news.jpg',
            'title'         => $title,
            'created_by'    => mt_rand(1,3),
            'sector_id'     => mt_rand(1,6),
            'seen'          => mt_rand(1,114),
        ];
    }
}
