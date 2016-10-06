<div class="container" ng-controller="HomeworkAllController">
    <button class="btn btn-success" ui-sref="homework.add">
        添加
    </button>
    <div class="table-response">
        <table class="table table-bordered">
            <tr class="info">
                <td>课程</td>
                <td>截止日期</td>
            </tr>
            <tr class="info" ng-repeat="item in Homework.data">
                <td>[: item.course.name :]</td>
                <td>[: item.deadline :]</td>
            </tr>
        </table>
    </div>
</div>