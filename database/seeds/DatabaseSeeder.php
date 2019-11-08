<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pool::class, 10)->create()->each(function ($pool) {
            $options = factory(App\Option::class, 4)->make();
            $pool->options()->saveMany($options);
        });
    }
}
