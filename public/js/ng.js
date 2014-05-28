
// Overwriting handlebars
var myapp = angular.module('myapp', ['ngRoute'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
	});
// dependency injection ['ngRoute']

// Routing
// dependency injection by inference ['ngRoute']
myapp.config(function($routeProvider, $locationProvider){
	$routeProvider
		.when('/',
		{
			controller:'Controller1',
			templateUrl:'/partials/view1.html'
		})
		.when('/t',
		{
			controller:'Controller2',
			templateUrl:'/partials/view2.html'
		})
		.when('/user/:name',
		{
			controller:'Controller3',
			template:'<h1>Hello [[ h.name ]]!</h1>\
						<input type="text" value="wine" ng-model="h.name" />'
		})
		.otherwise({ redirectTo: '/' });

  //       .otherwise({
  //           templateUrl: app.site_url + 'ng',
  //            controller: function(){
  //               window.location.href = window.location.href;
  //           }               
  //       }); 
		// $locationProvider.html5Mode(true); 
});

// controller1
myapp.controller('Controller1', function($scope){
	$scope.customers = [
		{name:'John Doe', city:'Hamburg'},
		{name:'Jane Doe', city:'Nairobi'},
		{name:'John Dan', city:'Kisumu'},
		{name:'Jonah Dean', city:'Harare'},
		{name:'Joy Deuce', city:'New York'}
	];
	$scope.addC = function(){
		$scope.customers.push({ 
			name: $scope.newC.name, 
			city: $scope.newC.city
		});
		$scope.newC.name = '' //empties the text boxes
		$scope.newC.city = '' //empties the text boxes
	}
});

// controller2
myapp.controller('Controller2', function($scope, $http){
	$http.get('/store/tnames.json', { cache: true})
		.success(function(data){
			console.log(data);
			$scope.customers = data;
			// $(data).each(function(d){
			// 	$scope.customers.push({ 
			// 		name: d.name, 
			// 		city: d.city
			// 	});
			// });
		})
	    .error(function(data, status) {
	        console.log('Status: ' + status);
        });
});


myapp.controller('Controller3', function($scope, $routeParams){
	$scope.h = $routeParams;
	console.log('Your name is ' + $scope.h['name']);
	window.location.hash = "#/user/"+$scope.h['name'];
});
