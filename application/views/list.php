<table class="table table-hover">
    <thead>
        <tr>
            <!--th class="span2">Modify</th--!>
            <th class="span2">Item</th>
            <th class="span8">Description</th>
            <th class="span1">Qty</th>
            <th class="span1">Qty1</th>
            <th class="span2">
                <input type="text" ng-model="search" class="search-query span2 navbar-search pull-right" placeholder="Search">
            </th>

            <!--
            <th class="span1">
                <a class="btn btn-danger btn-small pull-right" href="<?php echo site_url('projects#/new'); ?>">
                    <i class="icon-minus icon-white"></i> ADD
                </a>
            </th>
            --!>
        </tr>
    </thead>
    <tbody>
        <!-- tr ng-repeat="project in projects | filter:search | orderBy:'lastmodify'" --!>
        <tr ng-repeat="project in projects | filter:search">
            <!--td>{{project.lastmodify}}</td--!>
            <td>{{project.type}}:{{project.name}}</td>
            <td>{{project.desc}}</td>
            <td>{{project.qty }} {{project.unit}}</td>
            <td>{{project.qty1}} {{project.unit1}}</td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-primary btn-mini" href="<?php echo site_url('projects#/edit/{{project.id}}'); ?>">
                        <i class="icon-edit icon-white"></i> Edit
                    </a>

                    <!--
                    <button ng-click="destroy(project)" class="btn btn-danger btn-mini">
                        <i class="icon-trash icon-white"></i> Delete
                    </button>
                    --!>
                </div>
            </td>
        </tr>
    </tbody>
</table>
