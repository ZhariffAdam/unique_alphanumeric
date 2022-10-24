<?php

namespace Database\Factories;

use App\Models\ReferenceNumber;
use App\Traits\ReferenceNumberTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferenceNumberFactory extends Factory
{
    use ReferenceNumberTrait;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReferenceNumber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->referenceNumber
        ];
    }
}
