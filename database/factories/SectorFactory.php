<?php

namespace Database\Factories;

use App\Models\Sector;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sector::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(3);
        return [
            'name'      => $name,
            'slug'      => Str::slug($name, '-'),
            'structure' => 'images/sectors/structures/structures.png',
            'program'   => 'public/uploads/sectors/programs/program.html',
            'job'       => 'public/uploads/sectors/jobs/job.html',
            'purpose'   => 'public/uploads/sectors/purposes/purpose.html',
        ];
    }
}
