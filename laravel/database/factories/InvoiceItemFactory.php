<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvoiceItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
        'invoice_id'    => Invoice::factory(),
        'description'   => $this->faker->randomElement(['Computadora', 'Notebook', 'Celular', 'Televisor', 'Heladera', 'Mesa', 'Silla']),
        'quantity'      => $this->faker->numberBetween(1, 10),
        'unit_price'    => $this->faker->numberBetween(1, 25000),
        ];

    }


}
