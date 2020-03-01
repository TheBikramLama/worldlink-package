<?php

namespace Thebikramlama\Worldlink;

use GuzzleHttp\Client;

class Worldlink {
	private $apiUrl;
	private $responseBody;

	public function __construct() {
		$this->apiUrl = "https://worldlinkapi.bikramlama.com.np/";
	}

	public function query( $username ) {
		// Adding Cache to the request
		$this->responseBody = cache()->remember(
			"worldlink.response.{$username}",
			now()->addMinutes( config('worldlink.cache_expiration') ),
			function() {
				$client = new Client();
				$response = $client->get( $this->apiUrl.$username, [
					'http_errors' => false
				]);
				return $response->getBody();
			}
		);

		return $this->responseBody;
	}

	public function getField( $field ) {
		$response = json_decode($this->responseBody);
		if ( $response == null ) return 'Please initiate with a query.';

		$data = $response->data->{$field} ?? null;
		if ( $data === 0 ) return 0;
		if ( $data == null ) return 'Invalid field requested';

		return $data;
	}
}