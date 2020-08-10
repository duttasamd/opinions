<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array('Science', 'Politics', 'Religion', 'Technology', 'Education',
                            'Sports', 'Current Events', 'Business', 'Geography', 'History'
                            , 'Literature', 'Hobbies');

        foreach ($categories as $category) {
            \App\Category::create([
               'name' => $category
            ]);
        }
    }
}
