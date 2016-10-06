;(function () {
	'use strict';

	angular.module('homework', [
		])
	.service('HomeworkService', [
			'$http',
			'$state',
			function($http, $state){
			var me = this;
			me.data = {};
			me.new_homework = {};

			me.go_add_homework = function() {
				$state.go('homework.add');
			}

			me.read = function() {
				return $http.post('/api/homework/read')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							console.log(me.data);
							return r.data.data;
						}
						return false;
					})
			}

			me.add = function() {
				if(!me.new_homework.course_id || !me.new_homework.deadline || !me.new_homework.content)
					return;
				return $http.post('/api/homework/add', me.new_homework)
					.then(function(r) {
						console.log('r', r);
						if(r.data.status) {
							me.new_homework = {};
							$state.go('homework.all');
						}
					}, function(e) {

					})
			}

			me.count = function() {
				return $http.post('/api/homework/count')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
					})
			}

		}])

	.controller('HomeworkController', [
		'$scope',
		'HomeworkService',
		function($scope, HomeworkService){
		$scope.Homework = HomeworkService;
	}])

	.controller('HomeworkAllController', [
		'$scope',
		'HomeworkService',
		function($scope, HomeworkService){
		$scope.Homework = HomeworkService;
		HomeworkService.read();
	}])

	.controller('HomeworkAddController', [
		'$scope',
		'HomeworkService',
		'CourseService',
		function($scope, HomeworkService, CourseService){
		$scope.Homework = HomeworkService;
		$scope.Course = CourseService;
		CourseService.read();
	}])

})();