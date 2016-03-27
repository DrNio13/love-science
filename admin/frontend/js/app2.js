var userApp = angular.module('userApp', ['ngRoute'])


.config(['$routeProvider', function($routeProvider){
	$routeProvider

		.when('/',{
		templateUrl: '/love-science/admin/components/users/users-list.php',
		controller: 'userCtrl'
		})

		.when('/users-list/:userID',{
			templateUrl: '/love-science/admin/components/users/user-profile.php',
			controller: 'userProfileCtrl'
		})

		.otherwise({redirectTo: '/'});
}])


.controller('userCtrl', ['$scope','$http', function($scope,$http){

	$http.get('/love-science/system/services/api/users/all').success(function(data){
		$scope.users = data;
	});

}])

.controller('userProfileCtrl', ['$scope', '$http', '$routeParams', '$filter', function($scope,$http,$routeParams,$filter){

	var profId = $routeParams.userID;
	$http.get('/love-science/system/services/api/users/all').success(function(data){
		$scope.user = $filter('filter')(data, function(u){
			return u.id == profId;
		})[0];
	});

}]);

