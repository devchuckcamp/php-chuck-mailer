<?php 

require __DIR__ . '/dotenv-loader.php';

class Config{
	
	private $app_key;
	private $client_key;


	public function __construct(){
		$this->app_key = getenv('APP_KEY');
		$this->client_key = getenv('CLIENT_KEY');
	}

	public function getAppKey(){
		return $this->app_key;
	}

	public function getClientKey(){
		return $this->client_key;
	}
}