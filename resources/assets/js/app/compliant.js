function pad(number) {
	var r = String(number);
	if (r.length === 1) {
		r = '0' + r;
	}
	return r;
}

(function () {
	'use strict';
	/**
	 * Override UTC ISO String Conversion
	 */
	Date.prototype.toCarbon = function () {
		// avoid UTC conversion
		return this.getFullYear()
			+ '-' + pad(this.getMonth() + 1)
			+ '-' + pad(this.getDate())
			+ ' ' + pad(this.getHours())
			+ ':' + pad(this.getMinutes())
			+ ':' + pad(this.getSeconds());
	};

	/**
	 * Override UTC ISO String Conversion
	 */
	Date.prototype.toISOString = function () {
		// avoid UTC conversion
		return this.getFullYear()
			+ '-' + pad(this.getMonth() + 1)
			+ '-' + pad(this.getDate())
			+ 'T' + pad(this.getHours())
			+ ':' + pad(this.getMinutes())
			+ ':' + pad(this.getSeconds())
			+ '.' + String((this.getMilliseconds() / 1000).toFixed(3)).slice(2, 5)
			+ 'Z';
	};
	var _MS_PER_YEAR = 1000 * 60 * 60 * 24 * 365;

	/**
	 * Override UTC ISO String Conversion
	 */
	Date.prototype.diffInYear = function (b) {
		// Discard the time and time-zone information.
		var utc1 = Date.UTC(this.getFullYear(), this.getMonth(), this.getDate());
		var utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

		return Math.floor((utc2 - utc1) / _MS_PER_YEAR);
	};
}());