<?php

namespace App\Console\Commands;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

use App\Models\Post;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $postsitmap = Sitemap::create();

        Category::get()->each(function (Category $post) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/viewCategories/{$post->categorys_id}/{$post->category_name}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

    Product::get()->each(function (Product $post) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/productdetails/{$post->product_id}/{$post->product_name}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        $postsitmap->writeToFile(public_path('sitemap.xml'));
    }
}