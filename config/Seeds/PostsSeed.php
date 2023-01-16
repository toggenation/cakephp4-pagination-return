<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Posts seed.
 */
class PostsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [];

        $faker = Faker\Factory::create();

        foreach (range(1, 100) as $item) {
            $data[] = [
                'title' => $faker->words(3, true),
                'body' => $faker->words(25, true)
            ];
        }

        $table = $this->table('posts');
        $table->insert($data)->save();
    }
}
