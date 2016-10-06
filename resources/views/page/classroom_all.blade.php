<div class="container" ng-controller="ClassroomAllController">
    <button class="btn btn-success" ui-sref="classroom.add">
        添加
    </button>
    <div class="table-response">
        <table class="table table-bordered">
            <tr class="info">
                <td>教室</td>
                <td>创建时间</td>
            </tr>
            <tr class="info" ng-repeat="item in Classroom.data">
                <td ng-if="item.name">[: item.name :]</td>
                <td>[: item.created_at :]</td>
            </tr>
        </table>
    </div>
</div>