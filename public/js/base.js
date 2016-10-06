;(function()
{
	'use strict';

	angular.module('UniqueClass', [
		'ui.router',
		'course',
		'eclass',
		'teacher',
		'classroom',
		'homework',
	])
		.config(['$interpolateProvider',
			'$stateProvider',
			'$urlRouterProvider',
			function($interpolateProvider,
			$stateProvider,
			$urlRouterProvider)
		{
			$interpolateProvider.startSymbol('[:');
			$interpolateProvider.endSymbol(':]');

			$urlRouterProvider.otherwise('/home');

			$stateProvider
				.state('home', {
					url: '/home',
					templateUrl: '/tpl/page/home'
				})
				.state('admin', {
					url: '/admin',
					templateUrl: '/tpl/page/admin'
				})
				.state('course', {
					abstract: true,
					url: '/course',
					template: '<div ui-view></div>',
					controller: 'CourseController'
				})
				.state('course.all', {
					url: '/all',
					templateUrl: '/tpl/page/course_all'
				})
				.state('course.add', {
					url: '/add',
					templateUrl: '/tpl/page/course_add'
				})
				.state('eclass', {
					abstract: true,
					url: '/class',
					template: '<div ui-view></div>',
					controller: 'EclassController'
				})
				.state('eclass.all', {
					url: '/all',
					templateUrl: '/tpl/page/class_all'
				})
				.state('eclass.add', {
					url: '/add',
					templateUrl: '/tpl/page/class_add'
				})
				.state('teacher', {
					abstract: true,
					url: '/teacher',
					template: '<div ui-view></div>',
					controller: 'TeacherController'
				})
				.state('teacher.all', {
					url: '/all',
					templateUrl: '/tpl/page/teacher_all'
				})
				.state('teacher.add', {
					url: '/add',
					templateUrl: '/tpl/page/teacher_add'
				})
				.state('classroom', {
					abstract: true,
					url: '/classroom',
					template: '<div ui-view></div>',
					controller: 'ClassroomController'
				})
				.state('classroom.all', {
					url: '/all',
					templateUrl: '/tpl/page/classroom_all'
				})
				.state('classroom.add', {
					url: '/add',
					templateUrl: '/tpl/page/classroom_add'
				})
				.state('homework', {
					abstract: true,
					url: '/homework',
					template: '<div ui-view></div>',
					controller: 'HomeworkController'
				})
				.state('homework.all', {
					url: '/all',
					templateUrl: '/tpl/page/homework_all'
				})
				.state('homework.add', {
					url: '/add',
					templateUrl: '/tpl/page/homework_add'
				})
				.state('user', {
					url: '/user/:id',
					templateUrl: '/tpl/page/user'
				})
		}])

		.controller('BaseController', [
			'$scope',
			'ClassroomService',
			'CourseService',
			'EclassService',
			'HomeworkService',
			'TeacherService',
			function($scope,
				ClassroomService,
				CourseService,
				EclassService,
				HomeworkService,
				TeacherService){
			$scope.Classroom = ClassroomService;
			$scope.Course = CourseService;
			$scope.Eclass = EclassService;
			$scope.Homework = HomeworkService;
			$scope.Teacher = TeacherService;
			ClassroomService.count();
			CourseService.count();
			EclassService.count();
			HomeworkService.count();
			TeacherService.count();
		}])
})();


