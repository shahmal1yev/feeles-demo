(function() {

	Array.prototype.remove = function(value) {
		let index = this.indexOf(value);

		if (index > -1) {
			this.splice(index, 1);
		}

		return this;
	};

})();