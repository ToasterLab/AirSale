// DEFINITION

apiURL = 'http://airsale.lalx.org/api/airsale.php'

var airSale = angular.module('AirSale', ['ngRoute'], 
    function($httpProvider){
    // Use x-www-form-urlencoded Content-Type
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    /**
    * The workhorse; converts an object to x-www-form-urlencoded serialization.
    * @param {Object} obj
    * @return {String}
    */ 
    var param = function(obj) {
        var query = '', name, value, fullSubName, subName, subValue, innerObj, i;

        for(name in obj) {
          value = obj[name];

          if(value instanceof Array) {
            for(i=0; i<value.length; ++i) {
              subValue = value[i];
              fullSubName = name + '[' + i + ']';
              innerObj = {};
              innerObj[fullSubName] = subValue;
              query += param(innerObj) + '&';
            }
          } else if(value instanceof Object) {
            for(subName in value) {
              subValue = value[subName];
              fullSubName = name + '[' + subName + ']';
              innerObj = {};
              innerObj[fullSubName] = subValue;
              query += param(innerObj) + '&';
            }
          }
          else if(value !== undefined && value !== null)
            query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
        }

        return query.length ? query.substr(0, query.length - 1) : query;
    };

    // Override $http service's default transformRequest
    $httpProvider.defaults.transformRequest = [function(data) {
        return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
    }];
});

    airSale.config(['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.useXDomain = true;
        delete $httpProvider.defaults.headers.common['X-Requested-With'];
    }
]);

// routing
airSale.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl : 'pages/home.html',
            controller  : 'mainController',
            title       : 'Welcome'
        })

        .when('/items', {
            templateUrl : 'pages/items.html',
            controller  : 'itemController',
            title       : 'Explore'
        })

        .when('/login', {
            templateUrl : 'pages/login.html',
            controller  : 'loginController',
            title       : 'Login'
        })

        .when('/register', {
            templateUrl : 'pages/register.html',
            controller  : 'registerController',
            title       : 'Register'
        })

        .otherwise({
            redirectTo: '/'
        });;
});

airSale.factory('bgData', [function() {
  var imptInfo = {
    isLogged: false,
    userId: ''
  };
  return imptInfo;
}]);

airSale.controller('mainController', ["$scope","$http","$location","bgData",
    function($scope,$http,$location,bgData) {
        $scope.message = 'Test Message';
        $scope.isLoggedIn = bgData.isLoggedIn
        //http://stackoverflow.com/questions/20933502/how-to-toggle-angularjs-ng-show-without-rootscope
        //http://stackoverflow.com/questions/19137695/angularjs-how-to-access-global-variables-outside-of-controller
    }
]);

airSale.controller('itemController', 
    ["$scope","$http","$location","bgData",
    function($scope,$http,$location,bgData) {
        config = {
                withCredentials: true
            }
        $http.post(apiURL, 
            {
                'action':'explore',
                'mobile':1
            },
            config
        ).success(function(data){
            console.log(data)
        });
    }
]);

airSale.controller('loginController', 
    ["$scope","$http","$location","$timeout","bgData", 
    function($scope, $http, $location, $timeout, bgData){
        $scope.user = {}
        $scope.toSend = {
            mobile: "1",
            action: "login",
            user: {}
        }

        $scope.login = function() {    
            $scope.toSend.user = $scope.user.username
            $scope.toSend.password = $scope.user.password
            console.log($scope.toSend)
            config = {
                withCredentials: true
            }
            $http.post(apiURL, $scope.toSend, config)
            .success(function(data,status,header){
                console.log(data)
                if(data == "failed"){
                    bgData.isLogged = false;
                    $scope.user.error = true;
                } else {
                    $scope.user.error = false;
                    bgData.isLogged = true;
                    bgData.userId = data;
                    $location.path("/items"); 
                }
            });
        };
    }]
);

airSale.controller('registerController', function($scope) {
    $scope.message = 'Test Message';
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
}]);

//authentication on route change
airSale.run(['$rootScope', '$location', 'bgData', function ($rootScope, $location, bgData) {
    $rootScope.$on('$routeChangeStart', function (event) {
        if (bgData.isLoggedIn == true) {
            console.log("not logged in")
            $location.path( "/login" );
        }
    });

}]);