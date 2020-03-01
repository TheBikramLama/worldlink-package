<?php

namespace Thebikramlama\Worldlink;

use Illuminate\Support\ServiceProvider;

class WorldlinkServiceProvider extends ServiceProvider {

	public function register() {
		$this->mergeConfigFrom(
            __DIR__.'/config/worldlink.php', 'worldlink'
        );
	}

	public function boot() {
		$this->publishes([
            __DIR__.'/config/worldlink.php' => config_path('worldlink.php'),
        ]);
	}

}