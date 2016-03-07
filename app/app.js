var mainApp = angular.module('mainApp', ['ngRoute', 'mainAppControllers']);

mainApp.config(['$routeProvider', function($routeProvider) {
	$routeProvider
		.when('/article/:url', {
			templateUrl: 'app/shared/articles/view.html',
			controller: 'ArticlesController'
		})
		.when('/categories', {
			templateUrl: 'app/shared/gadgets/categories.html',
			controller: 'GadgetsCategoriesController'
		})
		.when('/gadgets', {
			templateUrl: 'app/shared/gadgets/view.html',
			controller: 'GadgetsController'
		})
		.otherwise({ 
			redirectTo: '/'
		});
}]);