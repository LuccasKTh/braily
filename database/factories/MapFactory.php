<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Map>
 */
class MapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'state' => 'Acre',
                'population' => 881,935,
                'visually_impaired' => 35,732
            ],
            [
                'state' => 'Alagoas',
                'population' => 3,337,357,
                'visually_impaired' => 124,543
            ],
            [
                'state' => 'Amapa',
                'population' => 845,731,
                'visually_impaired' => 36,287
            ],
            [
                'state' => 'Amazonas',
                'population' => 845,731,
                'visually_impaired' => 36,287
            ],
        ];
    }
        // '1': 'Acre',
        // '2': 'Alagoas',
        // '3': 'Amapa',
        // '4': 'Amazonas',
        // '5': 'Bahia',
        // '6': 'Ceara',
        // '7': 'Distrito Federal',
        // '8': 'Espirito Santo',
        // '9': 'Goias',
        // '10': 'Maranhao',
        // '11': 'Mato Grosso',
        // '12': 'Mato Grosso do Sul',
        // '13': 'Minas Gerais',
        // '14': 'Para',
        // '15': 'Paraiba',
        // '16': 'Parana',
        // '17': 'Pernambuco',
        // '18': 'Piaui',
        // '19': 'Rio de Janeiro',
        // '20': 'Rio Grande do Norte',
        // '21': 'Rio Grande do Sul',
        // '22': 'Rondonia',
        // '23': 'Roraima',
        // '24': {
        //     estado: 'Santa Catarina',
        //     habitantes: 7164788,
        //     deficientes: 183322
        // },
        // '25': 'Sao Paulo',
        // '26': 'Sergipe',
        // '27': 'Tocantins'
}
