var mainAppControllers = angular.module('mainAppControllers', []);

mainAppControllers.controller('RootController', ['$scope', function ($scope) {
	$scope.lang = "en";
}]);

mainAppControllers.controller('ArticlesController', ['$scope', function ($scope) {
	// article
}]);

mainAppControllers.controller('GadgetsController', ['$scope', function ($scope) {
	// gadget
}]);