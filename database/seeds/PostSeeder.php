<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $category1=Category::create([
             'name'=>'News'
        ]);

        $category2=Category::create([
             'name'=>'Marketing'
        ]);

        $category3=Category::create([
             'name'=>'Partnership'
        ]);
        $category4=Category::create([
            'name'=>'Product'
        ]);


        $autore1=User::create([
             'name'=>'ysf',
             'email'=>'ysf.sb@gmail.com',
             'password'=>Hash::make('password')
        ]);

        $autore2=User::create([
          'name'=>'yassine',
          'email'=>'yassine.sb@gmail.com',
          'password'=>Hash::make('password')
        ]);

         $post1=$autore1->posts()->create([
             'title'=>'We relocated our office to a new designed garage',
             'description'=>'We relocated our office to a new designed garage',
             'content'=>'We relocated our office to a new designed garage',
             'category_id'=>$category1->id,
             'image'=>'posts/1.jpg',
            
          ]);

         $post2=$autore2->posts()->create([
            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=>'Top 5 brilliant content marketing strategies',
            'content'=>'Top 5 brilliant content marketing strategies',
            'category_id'=>$category2->id,
            'image'=>'posts/2.jpg'
          ]);
          $post3=$autore1->posts()->create([
            'title'=>'Best practices for minimalist design with example',
            'description'=>'Best practices for minimalist design with example',
            'content'=>'Best practices for minimalist design with example',
            'category_id'=>$category3->id,
            'image'=>'posts/3.jpg'
          ]);

          $post4=$autore2->posts()->create([
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>'Congratulate and thank to Maryam for joining our team',
            'content'=>'Congratulate and thank to Maryam for joining our team',
            'category_id'=>$category4->id, 
            'image'=>'posts/4.jpg'
          ]);

          $tag1=Tag::create([
             'name'=>'Record'
          ]);
          $tag2=Tag::create([
            'name'=>'Offer'
          ]);
          $tag3=Tag::create([
            'name'=>'Design'
          ]);
          $tag4=Tag::create([
            'name'=>'Job'
          ]);
          
          $post1->tags()->attach([$tag1->id,$tag2->id]);
          $post2->tags()->attach([$tag2->id,$tag3->id]);
          $post3->tags()->attach([$tag1->id,$tag3->id]);
          $post4->tags()->attach([$tag4->id,$tag2->id]);

    }
}
