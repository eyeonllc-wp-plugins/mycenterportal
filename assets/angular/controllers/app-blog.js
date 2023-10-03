(function() {
	var app = angular.module('MyCenterPortalApp', ['ngSanitize']);
	var records_endpoint = jQuery('[ng-controller="BlogPostsCtrl"]').data('url');

	app.controller('BlogPostsCtrl', function( $scope, $http, $compile, RecordsFactory ) {
		$scope.busy = true;
		$scope.data;

		$scope.loadResults = function(callback = null) {
			$scope.busy = true;

			RecordsFactory.allRecords(records_endpoint).then(function(result) {
				$scope.busy = false;
				$scope.data = result.data;

				if( callback != null ) callback();
			}, function(response) {});
		};

		// $scope.loadResults();
	});

	function seoFriendlyURL(text) {
		var text = text.toString().toLowerCase();
		text = text.split(/\'/).join("");
		text = text.split(/’/).join("");
		text = text.split(/[^a-z0-9\-]/).join("-");
		text = text.split(/-+/).join("-");
		text = text.replace(/-$/, "");
		text = text.replace(/^-/, "");
		return text; 
	}

	app.filter('categoryName', ['$sce', function($sce) {
		return function(text) {
			return seoFriendlyURL(text);
		};
	}]);

	app.filter('categoryClassesFromArr', ['$sce', function($sce) {
		return function(categories) {
			return categories.map(function(val, index) {
				return seoFriendlyURL(val);
			})
		}
	}]);

})();

