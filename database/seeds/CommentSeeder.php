<?php

use Illuminate\Database\Seeder;
use App\Traits\CommentTestable;

class CommentSeeder extends Seeder
{
    use CommentTestable;

    public function run()
    {
        //
        $this->createCommentsInDB(100);
    }
}
