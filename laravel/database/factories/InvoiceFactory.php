<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $impositive_profile         = $this->faker->randomElement([ 'Responsable inscripto',
                                                                    'Responsable monotributo',
                                                                    'Consumidor final',
                                                                    'Exento']);         

        if($impositive_profile      == 'Responsable inscripto') {
                $social_reason      = $this->faker->company;
                $letter             = 'A';
                $document_type      = 'C.U.I.T';
                $document_number    = '30'.$this->faker->randomNumber($nbDigits = 8, $strict = true).'9';
        }

        if($impositive_profile      == 'Exento' ){
                $social_reason      = $this->faker->randomElement([ 'Iglesia', 'Revistero', 'Aeropuerto', 'Agencia de Taxi' ]);
                $letter             = 'B';
                $document_type      = 'C.U.I.T';
                $document_number    = '30'.$this->faker->randomNumber($nbDigits = 8, $strict = true).'9';
        }

        if($impositive_profile      == 'Responsable monotributo' ){
                $social_reason      = $this->faker->name;
                $letter             = 'B';
                $document_type      = 'C.U.I.T';
                $document_number    = '20'.$this->faker->randomNumber($nbDigits = 8, $strict = true).'7';
        }

        if($impositive_profile      == 'Consumidor final' ){

            $social_reason          = $this->faker->name;
            $letter                 = 'B';
            $document_type          = $this->faker->randomElement(['D.N.I', 'C.I.', 'L.E.', 'L.C.', 'C.U.I.L']);

            if($document_type       == 'C.U.I.L'){
                $document_number    = '20'.$this->faker->randomNumber($nbDigits = 8, $strict = true).'7';
            }else{
                $document_number    = $this->faker->randomNumber($nbDigits = 8, $strict = true);
            } 

        }






        return [
            'letter'                => $letter, 
            'type'                  => 'Factura', //$this->faker->randomElement(['Factura', 'Credito', 'Debito']),
            'social_reason'         => $social_reason,
            'document_type'         => $document_type,
            'impositive_profile'    => $impositive_profile,
            'document_number'       => $document_number,
            'created_at'            => $this->faker->dateTime($min = 'now', $timezone = null),
        ];

    }

}
