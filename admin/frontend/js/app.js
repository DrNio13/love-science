var adminApp = angular.module('adminApp', ['ui.tinymce']);

adminApp.factory('serverDataFactory', ['$http', function($http, url, data) {

    var urlBase =  url; //'/api/customers';
    var serverDataFactory = {};

    serverDataFactory.postData = function(url,data){
    	return $http({
    		method: 'POST',
    		url: url,
    		data: data
    	});
    };

    serverDataFactory.getData = function(url){
    	return $http({
    		method: 'GET',
    		url: url
    	});
    };

    serverDataFactory.deleteArticle = function(article,url) {
    	return $http({
    		method : 'DELETE',
    		url: url,
    		data: article
    	});
    };

    return serverDataFactory;

}]);

var ContentParser = ContentParser || {};
appContentParser = {
	parseArticleContent: function(articles){
		articles.forEach(function(article) {
			article.content_short = article.content_short.replace('&nbsp;', '');
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

	// dataFactory.skato('dog');
	
}]);

adminApp.controller('ArticleController', ['$scope', '$http', 'serverDataFactory', function ($scope, $http, serverDataFactory) {
	$scope.allArticles = [];
	$scope.article = {};
	$scope.articlesIndex = 0;
	$scope.maxArticles = 5;
	$scope.paginationItems = [];

	// GET all articles
	serverDataFactory.getData('/love-science/system/services/api/articles/all.php')
	.then(function successGetArticles(response){

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
	    theme : 'modern',
	    height: '400px'
  	};

	// Send article to backend service for saving/updating
	$scope.postArticle = function(article){
		serverDataFactory.postData('/love-science/system/services/articles/article_submit.php',angular.toJson(article, true))
		.then(function successSubmit(response){
			console.log(response);
			window.alert(response.data.message + " :) ");
		}, function failSubmit(response){
			window.alert(response.data.error + " :( ");
		});
	};

	$scope.saveArticle = function(article) {
		$scope.postArticle(article);
	};

	$scope.deleteArticle = function(article) {
		if ( window.confirm("Are you sure that you want to delete this article from the database ?") ) {
			
			var index = $scope.chunkedArticles.indexOf(article);
			$scope.chunkedArticles.splice(index, 1);
			$scope.allArticles.length--;
			
			serverDataFactory.deleteArticle(article, '/love-science/system/services/articles/delete_article.php')
			.then(function doneCallback(response){
				console.log(response);
			}, function failCallback (){
				console.log(response);
			});
		}
		else {return false};
	};

}]);

adminApp.controller('EditArticleController', ['$scope', '$http', 'serverDataFactory', function ($scope, $http, serverDataFactory) {
	
	// Get the article to be edited
	serverDataFactory.postData('/love-science/system/services/articles/edit_article.php', articleId)
	.then(function successGetArticleById(response){
		$scope.article = response.data;
	}, function failGetArticleById(response){
		console.log(response);
	});

}]);

adminApp.controller('UserController', ['$scope', '$http', function ($scope, $http) {
	
}]);