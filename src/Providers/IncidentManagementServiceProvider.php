<?php
namespace IncidentManagement\Providers;

use Illuminate\Support\ServiceProvider;

class IncidentManagementServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			dirname(__DIR__).'/views' => base_path('resources/views/vendor/IncidentManagement'),
			dirname(__DIR__).'/js' => base_path('public/js/vendor/IncidentManagement')
		]);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		include dirname(__DIR__).'/routes.php';
		$this->app->bind
		(
			'IncidentManagement\Repositories\IncidentType\IncidentTypeInterface',
			'IncidentManagement\Repositories\IncidentType\IncidentTypeRepository'
		);

		$this->app->bind
		(
			'IncidentManagement\Repositories\Incident\IncidentInterface',
			'IncidentManagement\Repositories\Incident\IncidentRepository'
		);
	}

}
