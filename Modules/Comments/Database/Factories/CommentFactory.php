<?php

namespace Modules\Comments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Author\Database\Seeders\AuthorDatabaseSeeder;
use Modules\Author\Models\Author;
use Modules\Blogs\Database\Seeders\BlogsDatabaseSeeder;
use Modules\Blogs\Models\Blog;
use Modules\Comments\Database\Seeders\CommentsDatabaseSeeder;
use Modules\Comments\Models\Comment;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'commentable_type' => Blog::class,
            'commentable_id' => rand(1, BlogsDatabaseSeeder::$count),
            'content' => 'This is a reply to a comment',
            'blog_id' => rand(1, BlogsDatabaseSeeder::$count),
            'user_id' => UserTypeEnum::NORMAL_USER,
            'parent_id' => null
        ];
    }
}
