<?php


namespace App\Services;


use App\Models\CoinListPlatform;

class CoinListPlatformService
{
	/***
	 * @param $blockchain
	 * @param $address
	 * @param $coin_list_id
	 */
	public function insert($blockchain, $address, $coin_list_id)
	{
		CoinListPlatform::insert([
			'blockchain' => $blockchain,
			'address' => $address,
			'coin_list_id' => $coin_list_id,
			'created_at' => now(),
			'updated_at' => now()
		]);
	}
}
