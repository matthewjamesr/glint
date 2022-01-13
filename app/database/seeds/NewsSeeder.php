<?php
namespace App\Database\Seeds;

use App\Models\News;
use App\Database\Factories\NewsFactory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = new News();
        $news->title = "Big Trouble in Little China";
        $news->description = "This was a test";
        $news->type = "article";
        $news->country = "china";
        $news->markdown = "
            # Welcome to StackEdit!

            Hi! I'm your first Markdown file in **StackEdit**. If you want to learn about StackEdit, you can read me. If you want to play with Markdown, you can edit me. Once you have finished with me, you can create new files by opening the **file explorer** on the left corner of the navigation bar.
        ";
        $news->processed_html = '
            <h1 id="welcome-to-stackedit">Welcome to StackEdit!</h1>
            <p>Hi! I’m your first Markdown file in <strong>StackEdit</strong>. If you want to learn about StackEdit, you can read me. If you want to play with Markdown, you can edit me. Once you have finished with me, you can create new files by opening the <strong>file explorer</strong> on the left corner of the navigation bar.</p>
        ';

        $news->save();

        $news = new News();
        $news->title = "China Uncensored";
        $news->description = "The Greatest Threat to Taiwan Isn’t Chinese Warships...";
        $news->type = "video";
        $news->country = "china";
        $news->markdown = "
            .
        ";
        $news->processed_html = '
            .
        ';
        $news->video_url = "https://www.youtube.com/watch?v=fqpfxr0YHwY";

        $news->save();


        $news = new News();
        $news->title = "KJU Throws a Family Reunion";
        $news->description = "Artillery's someone in the chest";
        $news->type = "article";
        $news->country = "dprk";
        $news->markdown = "
            # Welcome to StackEdit!

            Hi! I'm your first Markdown file in **StackEdit**. If you want to learn about StackEdit, you can read me. If you want to play with Markdown, you can edit me. Once you have finished with me, you can create new files by opening the **file explorer** on the left corner of the navigation bar.
        ";
        $news->processed_html = '
            <h1 id="welcome-to-stackedit">Welcome to StackEdit!</h1>
            <p>Hi! I’m your first Markdown file in <strong>StackEdit</strong>. If you want to learn about StackEdit, you can read me. If you want to play with Markdown, you can edit me. Once you have finished with me, you can create new files by opening the <strong>file explorer</strong> on the left corner of the navigation bar.</p>
        ';

        $news->save();

        $news = new News();
        $news->title = "Putin Continues to Vamp";
        $news->description = "This was a test";
        $news->type = "article";
        $news->country = "russia";
        $news->markdown = "
            # Welcome to StackEdit!

            Hi! I'm your first Markdown file in **StackEdit**. If you want to learn about StackEdit, you can read me. If you want to play with Markdown, you can edit me. Once you have finished with me, you can create new files by opening the **file explorer** on the left corner of the navigation bar.
        ";
        $news->processed_html = '
            <h1 id="welcome-to-stackedit">Welcome to StackEdit!</h1>
            <p>Hi! I’m your first Markdown file in <strong>StackEdit</strong>. If you want to learn about StackEdit, you can read me. If you want to play with Markdown, you can edit me. Once you have finished with me, you can create new files by opening the <strong>file explorer</strong> on the left corner of the navigation bar.</p>
        ';

        $news->save();
    }
}