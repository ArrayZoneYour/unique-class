<div class="container" ng-controller="EclassAddController">
	<form role="form-group" name="class_add_form" ng-submit="Eclass.add()">
		<div class="form-group">
			<label>班级名</label>
			<input type="text"
			name="name" 
			class="form-control" 
			ng-model="Eclass.new_class.name"
			ng-minlength="5"
			ng-maxlength="255"
			required>
		</div>
		<div class="form-group">
			<label>班级简称</label>
			<input type="text"
			name="shortname" 
			class="form-control" 
			ng-model="Eclass.new_class.shortname"
			ng-minlength="3"
			ng-maxlength="10"
			required>
		</div>
		<div class="form-group">
			<button
			ng-disabled="class_add_form.$invalid"
			class="btn btn-primary"
			type="submit">
				新增
			</button>
		</div>
	</form>
</div>