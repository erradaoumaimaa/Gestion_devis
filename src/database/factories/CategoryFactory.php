<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Web Design', 'Graphic Design', 'Photography Services', 'Digital Marketing', 'Content Creation', 'SEO Optimization', 'E-commerce Development', 'Logo Design', 'Social Media Management', 'Video Production']),
        ];
    }
}
