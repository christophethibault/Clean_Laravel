<?php
return [
	'language'                => 'fr',
	'carbon date'             => 'd/m/Y',
	'carbon datetime'         => 'd/m/Y à H:i',
	'carbon_time'             => 'H:i',
	'date'                    => 'dd/MM/yyyy',
	'datetime'                => 'dd/MM/yyyy HH:mm',
	'datepicker to'           => 'à',
	'phone_number_regex'      => [
		//'0' => "/^0[1-9]([-. ]?[0-9]{2}){4}$/",
		'1' => "/^\+33[1-9]([0-9]{2}){4}$/",
//		'1' => "/^\+\d{6,7}[2-9]\d{3}$/",
		//'2' => "/^0033[1-9]([-. ]?[0-9]{2}){4}$/",
	],
	'phone_number_placehoder' => '+33999999999',
	/**
	 * datepicker options
	 * https://angular-ui.github.io/bootstrap/#/datepicker
	 */
	'datepicker'              => [
		'showWeeks' => 0,
		//'startingDay' => 1
	],
	'loading'                 => 'Chargement en cours',
	'amount'                  => ':amount :currency',
	'days'                    => 'jours',
	'decimal_point'           => ',',
	'thousands_separator'     => ' ',
	'currency'                => [
		'EUR' => '€',
		'USD' => '$',
	],

];
