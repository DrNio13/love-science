var adminApp = angular.module('adminApp', ['ui.tinymce']);

var ContentParser = ContentParser || {};
appContentParser = {
	parseArticleContent: function(articles){
		articles.forEach(function(article) {
			article.parsed_content = article.content.replace('&nbsp;', '');
		});
	}
};

var appPaginator = appPaginator || {};
appPaginator = {
	chunkData : function(index,arr,max){
		var start = index * max;
		var end = start + max;
		var data = arr.slice(start, end);
		console.log(data);
		return data;
	},
	setPaginationNumber : function(arr,max){
		return Math.ceil(arr.length / max);
	},
	setPaginationCollection: function(number){
		var pagItems = [];
		for (var i=0; i<number; i++) {
			pagItems.push(i);
		}
		return pagItems;
	}
};


adminApp.controller('RootController', ['$scope', '$http', function ($scope, $http) {
	
}]);

adminApp.controller('ArticleController', ['$scope', '$http', function ($scope, $http) {
	$scope.allArticles = [];
	$scope.article = {};
	$scope.articlesIndex = 0;
	$scope.maxArticles = 5;
	$scope.paginationItems = [];

	// GET all articles
	$http({
		method: 'GET',
		url : '/love-science/system/api/get-articles.php'
	}).then(function successGetArticles(response){

		appContentParser.parseArticleContent(response.data);
		
		$scope.allArticles = response.data; // save all articles
		$scope.chunkedArticles = appPaginator.chunkData($scope.articlesIndex, response.data, $scope.maxArticles);
		$scope.paginationItems = appPaginator.setPaginationCollection(appPaginator.setPaginationNumber($scope.allArticles, $scope.maxArticles));

	}, function failGetArticles(response){
		console.log(response);
	});

	$scope.paginateArticles = function(number,allArticles, maxArticles){
		$scope.chunkedArticles = appPaginator.chunkData(number,allArticles, maxArticles);
	};

	$scope.tinymceOptions = {
	    inline: false,
	    plugins : 'advlist autolink link image lists charmap print preview',
	    skin: 'lightgray',
	    theme : 'modern'
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