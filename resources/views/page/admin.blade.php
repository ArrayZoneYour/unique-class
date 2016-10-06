<div class="container" ng-controller="BaseController">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" ui-sref="course.all">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-book"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">课程管理：</span>
              <span class="info-box-text">当前课程数：</span>
              <span class="info-box-number">[: Course.data.num :]<small></small></span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" ui-sref="eclass.all">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">班级管理：</span>
              <span class="info-box-text">当前班级数：</span>
              <span class="info-box-number">[: Eclass.data.num :]<small></small></span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" ui-sref="homework.all">
            <span class="info-box-icon bg-aqua"><i class="ion ion-android-clipboard"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">作业管理：</span>
              <span class="info-box-text">已有作业数：</span>
              <span class="info-box-number">[: Homework.data.num :]<small></small></span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" ui-sref="classroom.all">
            <span class="info-box-icon bg-aqua"><i class="ion ion-home"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">教室管理：</span>
              <span class="info-box-text">已有教室数：</span>
              <span class="info-box-number">[: Classroom.data.num :]<small></small></span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" ui-sref="teacher.all">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-person"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">老师管理：</span>
              <span class="info-box-text">已有老师数：</span>
              <span class="info-box-number">[: Teacher.data.num :]<small></small></span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col -->
    </div>
</div>