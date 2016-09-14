<?php

use Illuminate\Database\Seeder;
use App\Models\Breed;
use App\Models\Specie;

class BreedSpeciesTableSeeder extends Seeder
{
    public function run()
    {
        Specie::create([
            'name' => 'Canine'
        ]);

        Specie::create([
            'name' => 'Feline'
        ]);

        Specie::create([
            'name' => 'Exotic'
        ]);


        $species = 'Canine';

        Breed::create([
            'name' => 'Scottish Terrier',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Dobermann',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Labrador',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'German Shepherd',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Pomeranian',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Lhasa Apso',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Common',
            'species' => $species
        ]);


        $species = 'Feline';

        Breed::create([
            'name' => 'Egyptian Mao',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Siamese',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Persian',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Bengal',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Siberian',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Munchkin',
            'species' => $species
        ]);

        Breed::create([
            'name' => 'Common',
            'species' => $species
        ]);
    }
}
