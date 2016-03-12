var adminApp = angular.module('adminApp', []);

adminApp.controller('RootController', ['$scope', '$http', function ($scope, $http) {
	$scope.allArticles = [];

	$http({
		method: 'GET',
		url : '/love-science/system/api/get-articles.php'
	}).then(function doneGetArticles(response){
		$scope.allArticles = response.data;
		console.log(response.data);
	}, function failGetArticles(response){
		console.log(response);
	});
}]);

adminApp.controller('ArticleController', ['$scope', '$http', function ($scope, $http) {
	
}])