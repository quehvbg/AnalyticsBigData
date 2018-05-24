<?php
use Illuminate\Database\Seeder;
use Modules\Books\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('books')->truncate();
        // Only seed if not in production environment
        if (!App::environment('production')) {
            $payload = [
                ['Php In Use', 'thanhnt'],
                ['Advance Java', 'tuvd'],
                ['Html5 practical', 'vidm'],
            ];
            foreach ($payload as $book) {
                Book::create([
                    'title'     => $book[0],
                    'author'    => $book[1],
                ]);
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}