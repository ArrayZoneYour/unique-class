;(function () {
	'use strict';

	angular.module('classroom', [])
	.service('ClassroomService', [
			'$http',
			'$state',
			function($http, $state){
			var me = this;
			me.data = {};
			me.new_classroom = {};

			me.go_add_classroom = function() {
				$state.go('classroom.add');
			}

			me.read = function() {
				return $http.post('/api/classroom/read')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
						return false;
					})
			}

			me.add = function() {
				if(!me.new_classroom.name)
					return;
				return $http.post('/api/classroom/add', me.new_classroom)
					.then(function(r) {
						console.log('r', r);
						if(r.data.status) {
							me.new_classroom = {};
							$state.go('classroom.all');
						}
					}, function(e) {

					})
			}

			me.count = function() {
				return $http.post('/api/classroom/count')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
					})
			}
		}])

	.controller('ClassroomController', [
		'$scope',
		'ClassroomService',
		function($scope, ClassroomService){
		$scope.Classroom = ClassroomService;
	}])

	.controller('ClassroomAllController', [
		'$scope',
		'ClassroomService',
		function($scope, ClassroomService){
		$scope.Classroom = ClassroomService;
		ClassroomService.read();
	}])

	.controller('ClassroomAddController', [
		'$scope',
		'ClassroomService',
		function($scope, ClassroomService){
		$scope.Classroom = ClassroomService;
	}])

})();