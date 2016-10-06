;(function () {
	'use strict';

	angular.module('course', [])
	.service('CourseService', [
			'$http',
			'$state',
			function($http, $state){
			var me = this;
			me.data = {};
			me.new_course = {};

			me.go_add_course = function() {
				$state.go('course.add');
			}

			me.read = function() {
				return $http.post('/api/course/read')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
						return false;
					})
			}

			me.add = function() {
				if(!me.new_course.name)
					return;
				return $http.post('/api/course/add', me.new_course)
					.then(function(r) {
						console.log('r', r);
						if(r.data.status) {
							me.new_course = {};
							$state.go('course.all');
						}
					}, function(e) {

					})
			}

			me.count = function() {
				return $http.post('/api/course/count')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
					})
			}
		}])

	.controller('CourseController', [
		'$scope',
		'CourseService',
		function($scope, CourseService){
		$scope.Course = CourseService;
	}])

	.controller('CourseAllController', [
		'$scope',
		'CourseService',
		function($scope, CourseService){
		$scope.Course = CourseService;
		CourseService.read();
	}])

	.controller('CourseAddController', [
		'$scope',
		'CourseService',
		function($scope, CourseService){
		$scope.Course = CourseService;
	}])

})();