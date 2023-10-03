(function() {
	var app = angular.module('MyCenterPortalApp', ['ngSanitize']);
	var records_endpoint = jQuery('[ng-controller="CareersCtrl"]').data('url');

	app.controller('CareersCtrl', function( $scope, $http, $compile, RecordsFactory ) {
		$scope.busy = true;
		$scope.data;
		$scope.selectedRow;
		$scope.selectedType = 'recent';

		var allData;

		$scope.loadResults = function(callback = null) {
			$scope.busy = true;

			RecordsFactory.allRecords(records_endpoint).then(function(result) {
				$scope.busy = false;
				allData = result.data;
				$scope.data = allData[$scope.selectedType];

				if( callback != null ) callback();
			}, function(response) {});
		};

		$scope.loadResults();

		$scope.selectRow = function(index = null) {
			$scope.selectedRow = ( index==null ? null : $scope.data.careers[index] );
		};

		$scope.selectType = function(type) {
			$scope.selectedType = type;
			$scope.data = allData[$scope.selectedType];
		};
	});
})();

