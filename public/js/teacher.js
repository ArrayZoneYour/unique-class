;(function () {
	'use strict';

	angular.module('teacher', [])
	.service('TeacherService', [
			'$http',
			'$state',
			function($http, $state){
			var me = this;
			me.data = {};
			me.new_teacher = {};

			me.go_add_teacher = function() {
				$state.go('teacher.add');
			}

			me.read = function() {
				return $http.post('/api/teacher/read')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
						return false;
					})
			}

			me.add = function() {
				if(!me.new_teacher.name)
					return;
				return $http.post('/api/teacher/add', me.new_teacher)
					.then(function(r) {
						console.log('r', r);
						if(r.data.status) {
							me.new_teacher = {};
							$state.go('teacher.all');
						}
					}, function(e) {

					})
			}

			me.count = function() {
				return $http.post('/api/teacher/count')
					.then(function(r) {
						if(r.data.status) {
							me.data = r.data.data;
							return r.data.data;
						}
					})
			}
		}])

	.controller('TeacherController', [
		'$scope',
		'TeacherService',
		function($scope, TeacherService){
		$scope.Teacher = TeacherService;
	}])

	.controller('TeacherAllController', [
		'$scope',
		'TeacherService',
		function($scope, TeacherService){
		$scope.Teacher = TeacherService;
		TeacherService.read();
	}])

	.controller('TeacherAddController', [
		'$scope',
		'TeacherService',
		function($scope, TeacherService){
		$scope.Teacher = TeacherService;
	}])

})();