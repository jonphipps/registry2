<?php

use Illuminate\Database\Seeder;

class VocabularySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Testing', 'label' => 'Test Vocabulary', 'description' => null, 'uri' => 'http://example.com/testproject', 'project_id' => 2, 'json' => null,],

        ];

        foreach ($items as $item) {
            \App\Vocabulary::create($item);
        }
    }
}
