<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

class FileManagerFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'fileManager';
	}
}