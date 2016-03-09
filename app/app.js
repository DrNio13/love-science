'use strict';
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
		.otherwise({ 
			redirectTo: '/'
		});
}]);