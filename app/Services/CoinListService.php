<?php


namespace App\Services;


use App\Models\CoinList;
use App\Models\Exchange;

class CoinListService
{
	/***
	 * @param $data
	 * @return mixed
	 */
	public function insertGetId($data)
	{
		return CoinList::insertGetId(
			[
				'unique_id' => $data->id,
				'symbol' => $data->symbol,
				'name' => $data->name,
				'exchange_id' => Exchange::names['Coin gecko'],
				'created_at' => now(),
				'updated_at' => now()
			]);
	}
}
