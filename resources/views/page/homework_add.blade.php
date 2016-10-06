<div class="container" ng-controller="HomeworkAddController">
	<form class="form-group" name="homework_add_form" ng-submit="Homework.add()">
		<div class="form-group">
			<label>课程</label>
			<select type="text"
			name="name" 
			class="form-control" 
			ng-model="Homework.new_homework.course_id"
			required>
				<option ng-repeat="item in Course.data" value="[: item.id :]">[: item.name :]</option>
			</select>
		</div>
		<div class="form-group input-append date">
			<label>截止日期</label>
			<input type="date"
			name="email" 
			class="form-control" 
			ng-model="Homework.new_homework.deadline"
			ng-minlength="5"
			ng-maxlength="200"
			>
		</div>
		<div class="form-group">
			<label>内容</label>
			<textarea type="text"
			name="phone" 
			class="form-control" 
			ng-model="Homework.new_homework.content"
			ng-minlength="2"
			ng-maxlength="10"
			>
			</textarea>
		</div>
		<div class="form-group">
			<button
			ng-disabled="homework_add_form.$invalid"
			class="btn btn-primary"
			type="submit">
				新增
			</button>
		</div>
	</form>
</div>
<script>
</script>