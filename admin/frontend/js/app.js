var adminApp = angular.module('adminApp', []);

adminApp.controller('RootController', ['$scope', '$http', function ($scope, $http) {
	
}]);

adminApp.controller('ArticleController', ['$scope', '$http', function ($scope, $http) {
	$scope.allArticles = [];
	// $scope.article = {};

	$http({
		method: 'GET',
		url : '/love-science/system/api/get-articles.php'
	}).then(function doneGetArticles(response){
		$scope.allArticles = response.data;
		console.log(response.data);
	}, function failGetArticles(response){
		console.log(response);
	});

	// $scope.saveArticle = function(){
	// 	console.log($scope.article);
	// };
}])

adminApp.controller('UserController', ['$scope', '$http', function ($scope, $http) {
	
}])