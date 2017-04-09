<?php

use Illuminate\Database\Seeder;

class ProjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 2, 'name' => 'Testing', 'label' => 'Test Project', 'is_private' => 0, 'repo' => null, 'url' => null, 'description' => null, 'license' => null,],

        ];

        foreach ($items as $item) {
            \App\Project::create($item);
        }
    }
}
