<div class="container" ng-controller="CourseAddController">
	<form class="form-group" name="course_add_form" ng-submit="Course.add()">
		<div class="form-group">
				<label>课程名</label>
				<input type="text"
				name="name" 
				class="form-control" 
				ng-model="Course.new_course.name"
				ng-minlength="3"
				ng-maxlength="255"
				required>
			</div>
			<div class="form-group">
				<button
				ng-disabled="course_add_form.$invalid"
				class="btn btn-primary"
				type="submit">
					新增
				</button>
			</div>
	</form>
</div>