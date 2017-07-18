<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Laravel\Dusk\DuskServiceProvider;
use Lang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    // $this->registerDateInCurrentYearValidationRule();
	    // $this->registerPhoneNumberValidationRule();
	    // $this->registerLuhnValidationRule();
	    // $this->registerPasswordValidationRule();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
	    setlocale(LC_TIME, config('app.locale_time'));
	    Carbon::setLocale(config('app.locale'));

	    if ($this->app->environment('local', 'testing')) {
		    $this->app->register(DuskServiceProvider::class);
		    //$this->app->register(Barryvdh\Debugbar\ServiceProvider::class);
	    }

	    $this->app->bind('fileManager', function ($app) {
		    return new \App\Services\FileManager;
	    });

    }

	/**
	 * registerDateInCurrentYearValidationRule
	 * Fonction de validation de la date :
	 * Date dans l'année actuelle
	 * @return boolean
	 */
	private function registerDateInCurrentYearValidationRule()
	{
		$year = new Carbon('first day of January' . date('Y'));

		Validator::extend('date_in_current_year', function ($attribute, $value, $parameters, $validator) use ($year) {
			$date = new Carbon($value);
			return $date->gte($year);
		});
	}


	/**
	 * registerPhoneNumberValidationRule
	 * @return boolean
	 */
	protected function registerPhoneNumberValidationRule()
	{
		$formats = Lang::get('locale.phone_number_regex');

		Validator::extend('phone_number', function ($attribute, $value, $parameters, $validator) use ($formats) {
			foreach ($formats as $format) {
				if (preg_match($format, $value)) {
					return true;
				}
			}
			return false;
		});
	}

	/**
	 * registerLuhnValidationRule
	 * validator pour l'algo de luhn
	 * @return boolean
	 */
	protected function registerLuhnValidationRule()
	{
		$check_enable = $this->app->environment('production');
		Validator::extend('luhn', function ($attribute, $value, $parameters, $validator) use($check_enable) {
			return $check_enable ? checkLuhn($value) : true;
		});
	}

	/**
	 * registerPasswordValidationRule
	 * validator pour la politique de mot de passe de deloitte
	 * @return boolean
	 */
	protected function registerPasswordValidationRule()
	{
		Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
			$len = strlen($value);
			if( $len < config('app.password.min') || $len > config('app.password.max') ) {
				return false;
			}
			return preg_match(config('app.password.regex'), $value);
		});
	}
}
