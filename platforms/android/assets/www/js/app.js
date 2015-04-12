//local storage https://github.com/grevory/angular-local-storage

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

        .when('/create',{
            templateUrl : 'pages/create.html',
            controller  : 'createController',
            title       : 'New Item'
        })

        .otherwise({
            redirectTo: '/'
        });;
});

airSale.factory('bgData', [function() {
    var persistentData = {
        isLoggedIn: false, 
        userId: null
    };
    return {
        checkIfLoggedIn: function(){
            return persistentData.isLoggedIn
        },
        changeLoginStatus: function(newStatus){
            persistentData.isLoggedIn = newStatus;
        },
        getUserId: function(){
            return persistentData.userId
        },
        setUserId: function(hereIsAUserId){
            persistentData.userId = hereIsAUserId
        }
    };
}]);

airSale.controller('mainController', ["$scope","$http","$location","bgData",
    function($scope,$http,$location,bgData) {
        $scope.isLoggedIn = bgData.checkIfLoggedIn;
        $scope.gotoLogin = function(){
            $location.path("/register"); 
        };
    }
]);

airSale.controller('createController', ["$scope","$http","$location","bgData",
    function($scope,$http,$location,bgData){
        $scope.checkFlight = function(hereIsForm){
            if(!hereIsForm.flightno.$valid){return false}
            $scope.flightNumber = $scope.item.flightno.substring(2)
            $scope.flightCarrier = $scope.item.flightno.substring(0,2).toUpperCase()
            $scope.arrivalDate = "2015-4-12"
            $scope.loadingFlightDetails = true
            config = {withCredentials: true}
            $http.post(apiURL, {'action':'getFlightInfo','mobile':1, 
                                'flightCarrier':$scope.flightCarrier,
                                'flightNumber':$scope.flightNumber,
                                'arrivalDate':$scope.arrivalDate},config)
            .success(function(data){
                $scope.loadingFlightDetails = false;
                console.log(data)
                try{
                    $scope.rawFlightDetails = angular.fromJson(data);
                    $scope.airlines = $scope.rawFlightDetails.appendix.airlines
                    /*$scope.airlineBlurb = ""
                    $scope.airlines.forEach(function(value, index, array){
                        $scope.airlineBlurb += value.icao + " - "
                    });*/
                    //$scope.airlineBlurb.substr(0,($scope.airlineBlurb.length - 3))
                    $scope.departingAirport = $scope.rawFlightDetails.appendix.airports[0].name
                    $scope.departingCity = $scope.rawFlightDetails.appendix.airports[0].city
                    $scope.arrivingAirport = $scope.rawFlightDetails.appendix.airports[1].name
                    $scope.arrivingCity = $scope.rawFlightDetails.appendix.airports[1].city
                }
                catch(e){
                    $scope.departingAirport = "Flight not found"
                    $scope.departingCity = ""
                    $scope.arrivingAirport = "Check flight number?"
                    $scope.arrivingCity = ""
                }
                
                
            })
        }
        $scope.addItem = function(){
            config = {withCredentials: true}
            $http.post(apiURL, {'action':'publish2','mobile':1, 
                                'name':$scope.item.name,
                                'description':$scope.item.description,
                                'specifications':$scope.item.specs
                                },config)
            .success(function(data){
                console.log(data);
                $scope.rawFlightDetails = data;
            })
        }
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
            data.forEach(function(value, key, newData) {
                switch(value.result.preferred){
                    case 'Message':
                        newData[key].result.contact = "sms:"+newData[key].result.number
                        break;

                    case 'WhatsApp':
                        newData[key].result.contact = "whatsapp://send"
                        break;

                    case 'Call':
                        newData[key].result.contact = "tel:"+newData[key].result.number
                        break;

                    default:
                        newData[key].result.contact = "mailto:"+newData[key].result.email
                        break;
                }
                newData[key].result.arrivalDateTime = new Date(newData[key].result.arrivalDateTime)
            });
            $scope.items = data
        });

        $scope.gotoCreate = function(){
            $location.path("/create")
        };
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
                if(data == "failed"){
                    bgData.changeLoginStatus(false);
                    $scope.user.error = true;
                } else {
                    $scope.user.error = false;
                    bgData.changeLoginStatus(true);
                    bgData.setUserId(data);
                    $location.path("/items"); 
                }
            });
        };
    }]
);

airSale.controller('registerController',
    ["$scope","$http","$location","$timeout","bgData", 
    function($scope, $http, $location, $timeout, bgData){
        $scope.user = {}
        $scope.toSend = {
            mobile: "1",
            action: "signup",
            user: {}
        }

        //https://github.com/Hendrixer/ngFx
        $scope.register = function() {    
            $scope.toSend.user = $scope.user.username
            $scope.toSend.password = $scope.user.password
            $scope.toSend.email = $scope.user.email
            $scope.toSend.country = $scope.user.country
            config = {
                withCredentials: true
            }
            $http.post(apiURL, $scope.toSend, config)
            .success(function(data,status,header){
                console.log(data)
                if(data == "failed-user name exists"){
                    bgData.changeLoginStatus(false);
                    $scope.user.error = true;
                } else {
                    $scope.user.error = false;
                    bgData.changeLoginStatus(true);
                    bgData.setUserId(data);
                    $location.path("/items"); 
                }
            });
        };
    }]
);

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
    $rootScope.$on('$routeChangeStart', function (event, next, current) {
        if(typeof next.templateUrl === 'undefined'){
            $location.path("/");
        } else if (!bgData.checkIfLoggedIn() && next.templateUrl != "pages/home.html" && next.templateUrl != "pages/register.html") {
            console.log("not logged in")
            $location.path("/login");
        }
    });

}]);