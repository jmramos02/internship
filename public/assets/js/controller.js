var myApp = angular.module('myApp',[]);

myApp.controller('InternshipController',['$scope', '$http',function($scope, $http){
	$http.post('student/getsections').success(function(data){
    $scope.sections = data;
  }); 
}]);