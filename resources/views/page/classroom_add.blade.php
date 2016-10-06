<div class="container" ng-controller="ClassroomAddController">
	<form class="form-group" name="classroom_add_form" ng-submit="Classroom.add()">
		<div class="form-group">
				<label>教室名（例：东九A101）</label>
				<input type="text"
				name="name" 
				class="form-control" 
				ng-model="Classroom.new_classroom.name"
				ng-minlength="3"
				ng-maxlength="255"
				required>
			</div>
			<div class="form-group">
				<button
				ng-disabled="classroom_add_form.$invalid"
				class="btn btn-primary"
				type="submit">
					新增
				</button>
			</div>
	</form>
</div>