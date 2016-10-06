;(function () {
	'use strict';

	angular.module('eclass', [])
	.service('EclassService', [
			'$http',
			'$state',
			function($http, $state){
			var me = this;
			me.data = {};
			me.new_class = {};

			me.go_add_class = function() {
				$state.go('eclass.add');
			}

			me.read = function() {
				return $http.post('/api/class/read')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
						return false;
					})
			}

			me.add = function() {
				if(!me.new_class.name || !me.new_class.shortname) {
					console.log(me.new_class);
					return;
				}
				return $http.post('/api/class/add', me.new_class)
					.then(function(r) {
						console.log('r', r);
						if(r.data.status) {
							me.new_course = {};
							$state.go('eclass.all');
						}
					}, function(e) {

					})
			}

			me.count = function() {
				return $http.post('/api/class/count')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
					})
			}
		}])

	.controller('EclassController', [
		'$scope',
		'EclassService',
		function($scope, EclassService){
		$scope.Eclass = EclassService;
	}])

	.controller('EclassAllController', [
		'$scope',
		'EclassService',
		function($scope, EclassService){
		$scope.Eclass = EclassService;
		EclassService.read();
	}])

	.controller('EclassAddController', [
		'$scope',
		'EclassService',
		function($scope, EclassService){
		$scope.Eclass = EclassService;
	}])

})();