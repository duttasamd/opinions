<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = array(
            'Messi is the best footballer.' => array('Sports'),
            'Cricket can never be a global sport.' => array('Sports', 'Current Events'),
            'IPhones are better than Android.' => array('Technology'),
            'Physics is stagnant.' => array('Science'),
            'Britain leaving EU is a dumb move.' => array('Politics'),
            'Space is opening up to the public' => array('Science', 'Technology')
        );

        foreach($posts as $k => $v) {
            $post = \App\Post::create([
                'title' => $k,
                'profile_id' => \App\Profile::inRandomOrder()->pluck('id')->first()
            ]);

            foreach ($v as $category) {
                \Illuminate\Support\Facades\DB::table('post_category')->insert(
                    ['post_id' => $post->id, 'category_id' => \App\Category::where('name', $category)->pluck('id')->first()]
                );
            }
        }
    }
}
