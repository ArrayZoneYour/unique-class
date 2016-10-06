<div class="container" ng-controller="EclassAllController">
    <button class="btn btn-success" ui-sref="eclass.add">
        添加
    </button>
    <div class="table-response">
        <table class="table table-bordered">
            <tr class="info">
                <td>班级名</td>
                <td>创建时间</td>
            </tr>
            <tr class="info" ng-repeat="item in Eclass.data">
                <td>[: item.name :]</td>
                <td>[: item.created_at :]</td>
            </tr>
        </table>
    </div>
</div>