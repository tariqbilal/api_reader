<?php

namespace App\Console\Commands;

use App\Services\CoinListPlatformService;
use App\Services\CoinListService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
class GetList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    	$url = 'https://api.coingecko.com/api/v3/coins/list?include_platform=true';
		$response = Http::get($url);
		$data = json_decode($response->getBody()->getContents());
		foreach($data as $key => $value)
		{
			$coin_list_service = new CoinListService();
			$coin_list_id = $coin_list_service->insertGetId($value);
			foreach($value->platforms as $blockchain => $address)
			{
				if($address) {
					$coin_list_platform_service = new CoinListPlatformService();
					$coin_list_platform_service->insert($blockchain, $address, $coin_list_id);
				}
			}
			$this->info('Inserted record id :'.$value->id);
		}
    }
}
