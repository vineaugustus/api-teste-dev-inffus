<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Character;
use Illuminate\Support\Facades\Http;

class ImportRickAndMortyCharacters extends Command
{
    protected $signature = 'import:characters';
    protected $description = 'Importa personagens da API Rick and Morty e salva no banco de dados';

    public function handle()
    {
        $url = 'https://rickandmortyapi.com/api/character';
        do {
            $response = Http::get($url);
            $data = $response->json();

            foreach ($data['results'] as $characterData) {
                Character::updateOrCreate(
                    ['id' => $characterData['id']],
                    [
                        'name' => $characterData['name'],
                        'status' => $characterData['status'],
                        'species' => $characterData['species'],
                        'type' => $characterData['type'],
                        'gender' => $characterData['gender'],
                        'origin' => $characterData['origin']['name'],
                        'location' => $characterData['location']['name'],
                        'image' => $characterData['image'],
                    ]
                );
            }

            $url = $data['info']['next'] ?? null;
        } while ($url);

        $this->info('Importação concluída com sucesso.');
    }
}
