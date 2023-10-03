(function() {
	var app = angular.module('MyCenterPortalApp', ['ngSanitize']);
	var records_endpoint = jQuery('[ng-controller="StoresCtrl"]').data('url');

	app.controller('StoresCtrl', function( $scope, $http, $compile, RecordsFactory ) {
		$scope.busy = true;
		$scope.data;
		$scope.selectedRow;
		$scope.selectedCategory = -1;
		$scope.stores = [];

		$scope.loadResults = function() {
			$scope.busy = true;

			RecordsFactory.allRecords(records_endpoint).then(function(result) {
				$scope.busy = false;
				$scope.data = result.data;
				$scope.stores = result.data.alphabetical;
			}, function(response) {});
		};

		$scope.loadResults();

		$scope.selectCategory = function(category_index) {
			$scope.selectedCategory = category_index;
			if( $scope.selectedCategory == -1 ) {
				$scope.stores = $scope.data.alphabetical;
			} else {
				$scope.stores = $scope.data.categorized[$scope.selectedCategory].retailers;
			}
		};

		$scope.selectCategoryFromDropdown = function() {
			$scope.selectCategory($scope.selectedCategory);
		};
	});
})();
