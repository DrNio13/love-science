'use strict';
var appRoutes = angular.module('appRoutes', ['ngRoute', ]);

appRoutes.config(['$routeProvider', function($routeProvider) {
	$routeProvider
		.when('/blog/:url', {
			templateUrl: 'app/component/blog/blogView.html',
			controller: 'BlogController'
		})
		.when('/categories', {
			templateUrl: 'app/component/categories/blogCategoriesController.html',
			controller: 'BlogCategoriesController'
		})
		.otherwise({ 
			redirectTo: '/'
		});
}]);