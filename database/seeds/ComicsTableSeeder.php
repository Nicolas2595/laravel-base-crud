<?php

use Illuminate\Database\Seeder;
use App\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config("comics");

        foreach($comics as $comic) {

            $newComic = new Comic();

            $newComic->title = $comic["title"];
            $newComic->price = $comic["price"];
            $newComic->description = $comic["description"];
            $newComic->series = $comic["series"];
            $newComic->sale_date = $comic["sale_date"];
            $newComic->type = $comic["type"];
            $newComic->thumb = $comic["thumb"];

            $newComic->save();

        }
    }
}
