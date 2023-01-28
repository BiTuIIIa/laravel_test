<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder guzzle';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import = new ImportDataClient();

        $responce = $import->client->request('GET','posts');
        $data =  json_decode($responce->getBody()->getContents());

        foreach ($data as $item){

            Post::firstOrcreate([
                'title'=>$item->title
            ],[
                'title'=>$item->title,
                'content'=>$item->body,
                'category_id' => 2,
            ]);
        }

    }
}
