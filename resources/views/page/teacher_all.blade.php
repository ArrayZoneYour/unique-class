<div class="container" ng-controller="TeacherAllController">
    <button class="btn btn-success" ui-sref="teacher.add">
        添加
    </button>
    <div class="table-response">
        <table class="table table-bordered">
            <tr class="info">
                <td>姓名</td>
                <td>邮箱</td>
                <td>电话</td>
            </tr>
            <tr class="info" ng-repeat="item in Teacher.data">
                <td>[: item.name :]</td>
                <td>[: item.email :]</td>
                <td>[: item.phone :]</td>
            </tr>
        </table>
    </div>
</div>