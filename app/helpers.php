<?php
function localeDate(/*Carbon\Carbon*/
	$date)
{
	return $date && get_class($date) == 'Carbon\Carbon' ? $date->format(Lang::get('locale.carbon date')) : '';
}

function maxUploadFileSize(){

	$max_size = ini_get('upload_max_filesize');

	$size = explode('M',$max_size);

	return $size[0] * 1024 ;

}

function localeDatetime(/*Carbon\Carbon*/
	$date)
{
	return $date && get_class($date) == 'Carbon\Carbon' ? $date->format(Lang::get('locale.carbon datetime')) : '';
}

function dateJS($date)
{
	return $date && get_class($date) == 'Carbon\Carbon' ? $date->format('c') : '';
}

function localeDateFromNow(/*Carbon\Carbon*/
	$date)
{
	return $date && get_class($date) == 'Carbon\Carbon' ? $date->diffForHumans(Carbon\Carbon::now()) : '';
}

function localeDateFromNowInDays(/*Carbon\Carbon*/
	$date)
{
	return $date && get_class($date) == 'Carbon\Carbon' ? $date->diffInDays() : '';
}

function localDateFromNowInYears(\Carbon\Carbon $date){
	return $date ? $date->diffInYears() : '' ;
}

function localeNumberFormat($number, $decimals = 0)
{
	return number_format($number, $decimals, trans('locale.decimal_point'), trans('locale.thousands_separator'));
}

function localeMonth(/*Carbon\Carbon*/
	$date)
{
	return $date && get_class($date) == 'Carbon\Carbon' ? $date->formatLocalized('%B') : '';
}

function localeAmount($amount, $precision = 0 ,$currency = 'EUR')
{
	return trans('locale.amount', ['amount' => localeNumberFormat($amount, $precision), 'currency' => trans('locale.currency.' . $currency)]);
}

function transformToJson($collection, $attribute)
{
	return collect($collection)->transform(function ($item, $key) use ($attribute) {
		if (isset($item[$attribute])) {
			return $item[$attribute];
		} else if (is_object($item) && property_exists($item, $attribute)) {
			return $item->$attribute;
		}
		return null;
	})->values()->toJson();
}

function collectionToAMChartData($collection, $attributes)
{
	return collect($collection)->transform(function ($item, $key) use ($attributes) {
		$values = [];
		foreach ($attributes as $attribute) {
			if (isset($item[$attribute])) {
				$values[$attribute] = $item[$attribute];
			} else if (is_object($item) && property_exists($item, $attribute)) {
				$values[$attribute] = $item->$attribute;
			}
		}
		return $values;
	})->values()->toJson();
}

function cut_string($string, $max = 31)
{
	return (strlen($string) > $max) ? substr($string, 0, $max - 3) . '...' : $string;
}

/**
 * sort parents before children
 *
 * @param array $objects input objects with attributes 'id' and 'parent_id'
 * @param array $result (optional, reference) internal
 * @param integer $parent (optional) internal
 * @param integer $depth (optional) internal
 * @return array           output
 */
function parent_sort(array $objects, array &$result = array(), $parent = 0, $depth = 0)
{
	foreach ($objects as $key => $object) {
		if ($object->parent_id == $parent) {
			$object->depth = $depth;
			array_push($result, $object);
			unset($objects[$key]);
			parent_sort($objects, $result, $object->id, $depth + 1);
		}
	}
	return $result;
}

/*---------------------------------
function parentChildSort_r
$idField        = The item's ID identifier (required)
$parentField    = The item's parent identifier (required)
$els            = The array (required)
$parentID       = The parent ID for which to sort (internal)
$result     = The result set (internal)
$depth          = The depth (internal)
----------------------------------*/
//        echo "$value[$parentField]" . $value[$parentField];
//        echo "$parentID" . $parentID;

function parentChildSort_r($idField, $parentField, $els, $parentID = 0, $depth = 0)
{
	$result = [];
	$spacer = "&nbsp;";
	foreach ($els as $key => $value):
		if ($value[$parentField] == $parentID) {
			$value['depth'] = $depth;
			$value['lib'] = str_repeat($spacer, $depth * 3) . ' ' . $value['lib'];
			array_push($result, $value);
			unset($els[$key]);
			$ret = parentChildSort_r($idField, $parentField, $els, $value[$idField], $depth + 1);
			if (count($ret)) {
				$result = array_merge($result, $ret);
			} else {
				$value['last'] = true;
			}
		}
	endforeach;
	return $result;
}

/**
 * format domaines for blade
 */
function formatDomaines( $domaines )
{
	return parentChildSort_r('id', 'parent_id', $domaines);
}

/**
 * http://stackoverflow.com/questions/174730/what-is-the-best-way-to-validate-a-credit-card-in-php
 * @param  integer $number to check
 * @return boolean
 */
function checkLuhn($number)
{
	// Force the value to be a string as this method uses string functions.
	// Converting to an integer may pass PHP_INT_MAX and result in an error!
	$number = (string)$number;

	if (!ctype_digit($number)) {
		// Luhn can only be used on numbers!
		return FALSE;
	}

	// Check number length
	$length = strlen($number);

	// Checksum of the card number
	$checksum = 0;

	for ($i = $length - 1; $i >= 0; $i -= 2) {
		// Add up every 2nd digit, starting from the right
		$checksum += substr($number, $i, 1);
	}

	for ($i = $length - 2; $i >= 0; $i -= 2) {
		// Add up every 2nd digit doubled, starting from the right
		$double = substr($number, $i, 1) * 2;

		// Subtract 9 from the double where value is greater than 10
		$checksum += ($double >= 10) ? ($double - 9) : $double;
	}

	// If the checksum is a multiple of 10, the number is valid
	return ($checksum % 10 === 0);
}
