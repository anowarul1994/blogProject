<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories =[
            ['name'=>'Programming', 'slug'=>'programming','slug_id'=>100000, 'status'=>1, 'order_by'=>1 ],
            ['name'=>'National', 'slug'=>'national','slug_id'=>100001, 'status'=>1, 'order_by'=>2 ],
            ['name'=>'International', 'slug'=>'international','slug_id'=>100002, 'status'=>1, 'order_by'=>3 ],
            ['name'=>'Sports', 'slug'=>'sports','slug_id'=>100003, 'status'=>1, 'order_by'=>3 ],
            ['name'=>'Science and Tech', 'slug'=>'science-and-tech','slug_id'=>100004, 'status'=>1, 'order_by'=>3 ],
            ['name'=>'Entertainment', 'slug'=>'entertainment','slug_id'=>100005, 'status'=>1, 'order_by'=>3 ],
        ];

//        Category::truncate();

        foreach ($categories as $category){
            Category::create($category);
        }
    }
}
