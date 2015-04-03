var airSale = angular.module('AirSale', ['ngRoute']);

// routing
airSale.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl : 'pages/home.html',
            controller  : 'mainController'
        })

        .when('/items', {
            templateUrl : 'pages/items.html',
            controller  : 'itemController'
        })

        .when('/login', {
            templateUrl : 'pages/login.html',
            controller  : 'loginController'
        });
});

airSale.controller('mainController', function($scope) {
    $scope.message = 'Test Message';
});

airSale.controller('itemController', function($scope) {
    $scope.message = 'this is tiem';
});

airSale.controller('loginController', function($scope) {
    $scope.message = 'such login much wow';
});

airSale.directive('centerise', [function(){
	return {
	    restrict: 'A',
	    link: function(scope, el, attr) {
	    	winHeight = window.innerHeight
	    	navHeight = document.getElementById("navbar").clientHeight
	    	ownHeight = document.getElementById("stuffGoesHere").clientHeight
	    	el.attr("style","margin-top:"+((winHeight-2*navHeight-ownHeight)/2)+"px")
	    	return
	    }
	}
}])