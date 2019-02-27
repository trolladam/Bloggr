<?php

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'title' => 'Travel'
        ]);
        Topic::create([
            'title' => 'Food'
        ]);
        Topic::create([
            'title' => 'Pets'
        ]);
        Topic::create([
            'title' => 'Other'
        ]);
    }
}
