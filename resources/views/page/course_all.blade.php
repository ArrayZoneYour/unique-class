<div class="container" ng-controller="CourseAllController">
    <button class="btn btn-success" ui-sref="course.add">
        添加
    </button>
    <div class="table-response">
        <table class="table table-bordered">
            <tr class="info">
                <td>课程名</td>
                <td>创建时间</td>
            </tr>
            <tr class="info" ng-repeat="item in Course.data">
                <td ng-if="item.name">[: item.name :]</td>
                <td>[: item.created_at :]</td>
            </tr>
        </table>
    </div>
</div>