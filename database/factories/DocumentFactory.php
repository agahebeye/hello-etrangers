<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $maritalStatuses = ['bachelor', 'married', 'divorced', 'widowed'];
        $genders = ['Masculin', 'Féminin'];
        $professions = ['Etudiant', 'Commerçant'];
        $visaKinds = ["d'Etude", 'de Commerce'];
        $citizenships = ['Congolaise', 'Tanzanienne', 'Kenyanne', 'Ugandaise', 'Rwandaise', 'Sudanaise'];


        return [
            'mother_firstname' => fake()->firstName('female'),
            'mother_lastname' => fake()->lastName('female'),
            'father_firstname' => fake()->firstName('male'),
            'father_lastname' => fake()->lastName('male'),
            'birth' => fake()->dateTimeBetween(),
            'gender' => $genders[array_rand($genders)],
            'marital_status' => $maritalStatuses[array_rand($maritalStatuses)],
            'citizenship' => $citizenships[array_rand($citizenships)] ,
            'profession' => $professions[array_rand($professions)],
            'passport_number' => fake()->uuid(),
            'passport_issue' => Carbon::parse(fake()->dateTimeBetween('-5years'))->format('Y-m-d') . ', ' . fake()->word(),
            'passport_validity' => fake()->dateTimeBetween('-5years'),
            'stay_purpose' => fake()->sentence(),
            'person_reference' => fake()->name(),
            'arrival_date' => fake()->dateTimeBetween('-5years'),
            'current_occupation' => fake()->word(),
            'stay_duration' =>  random_int(1, 7),
            'has_been' => $has_been = fake()->boolean(),
            'has_been_period' => $has_been ? random_int(1, 5) : null,
            'visa_kind' => 'visa ' . $visaKinds[array_rand($visaKinds)]
        ];
    }

    public function validated() {
        return $this->state(fn(array $attributes) => ['validated_at' => now()]);
    }

    public function rejected() {
        return $this->state(fn(array $attributes) => ['rejected_at' => now()]);
    }
}
