<div class="container" ng-controller="TeacherAddController">
	<form class="form-group" name="teacher_add_form" ng-submit="Teacher.add()">
		<div class="form-group">
			<label>姓名</label>
			<input type="text"
			name="name" 
			class="form-control" 
			ng-model="Teacher.new_teacher.name"
			ng-minlength="2"
			ng-maxlength="10"
			required>
		</div>
		<div class="form-group">
			<label>邮箱</label>
			<input type="email"
			name="email" 
			class="form-control" 
			ng-model="Teacher.new_teacher.email"
			ng-minlength="5"
			ng-maxlength="200"
			>
		</div>
		<div class="form-group">
			<label>电话</label>
			<input type="text"
			name="phone" 
			class="form-control" 
			ng-model="Teacher.new_teacher.phone"
			ng-minlength="2"
			ng-maxlength="10"
			>
		</div>
		<div class="form-group">
			<button
			ng-disabled="teacher_add_form.$invalid"
			class="btn btn-primary"
			type="submit">
				新增
			</button>
		</div>
	</form>
</div>