var adminApp = angular.module('adminApp', ['ui.tinymce']);

adminApp.controller('RootController', ['$scope', '$http', function ($scope, $http) {
	
}]);

adminApp.controller('ArticleController', ['$scope', '$http', function ($scope, $http) {
	$scope.allArticles = [];
	$scope.article = {};

	// GET all articles
	$http({
		method: 'GET',
		url : '/love-science/system/api/get-articles.php'
	}).then(function doneGetArticles(response){
		$scope.allArticles = response.data;
		console.log(response.data);
	}, function failGetArticles(response){
		console.log(response);
	});

	$scope.tinymceOptions = {
	    inline: false,
	    plugins : 'advlist autolink link image lists charmap print preview',
	    skin: 'lightgray',
	    theme : 'modern',
	    height : 400
  	};

	// POST article to backend service saving/updating to server
	$scope.postArticle = function(){
		$http({
			method: 'POST',
			url : 'article-submit.php',
			data : angular.toJson($scope.article, true)
		}).then(function successSumbit(response){
			console.log(response);
			window.alert(response.data.message);
		}, function failSubmit(response){
			window.alert(response.data.error);
		});
	};

	$scope.saveArticle = function() {
		$scope.postArticle();
	};

}]);

adminApp.controller('UserController', ['$scope', '$http', function ($scope, $http) {
	
}]);