'use strict';

var mainApp = angular.module('mainApp', ['ngRoute']);


mainApp.config(['$routeProvider', function($routeProvider) {
	$routeProvider
		.when('/blog/:url', {
			templateUrl: 'app/components/blog/blogView.html',
			controller: 'blogController'
		})
		.when('/',{
			templateUrl: 'homeView.html',
			controller: 'homeController'
		})
		.otherwise({ 
			redirectTo: '/'
		});
}]);


// Data Service
mainApp.factory('dataFactory', ['$http', function($http,url,data,articleUrl){
	var dataFactory = {};
	
	dataFactory.getData = function(url){
		return $http({
			method: 'GET',
			url: url
		});
	};

	dataFactory.postData = function(url, articleUrl){
		return $http({
			method: 'POST',
			url: url,
			data: articleUrl
		});
	};

	return dataFactory;
}]);

mainApp.controller('rootController', ['$scope', function ($scope) {
	
}]);

mainApp.controller('homeController', ['$scope','$route','$http','dataFactory', function ($scope,$route,$http, dataFactory) {
	$scope.articles = [];

	dataFactory.getData('system/services/api/articles/all.php')
	.then(function successCallback(response) {
	    $scope.articles = response.data;
	    console.log(response.data);
	}, function errorCallback(response) {
	    console.log(response);
	});

}]);

mainApp.controller('blogController', ['$scope','$routeParams','dataFactory', function ($scope,$routeParams,dataFactory) {
	 $scope.articleUrl = $routeParams.url;
	 
	 dataFactory.postData('system/services/api/articles/article.php', $scope.articleUrl)
	 .then(function successCallback(response){
	 	$scope.article = response.data;
	 }, function errorCallback(response){
	 	console.log(response);
	 });

}]);