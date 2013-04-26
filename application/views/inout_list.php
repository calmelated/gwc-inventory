<table class="table table-hover">
    <thead>
        <tr>
            <th class="span2">Create</th>
            <th class="span1">Creator</th>
            <th class="span2">Item</th>
            <th class="span6">Description</th>
            <th class="span1">Qty</th>
            <th class="span1">Qty1</th>
            <th class="span2">
                <input type="text" ng-model="search" class="search-query span2 navbar-search pull-right" placeholder="Search">
            </th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="order in orders | filter:search | orderBy:'ctime'">
            <td>{{order.ctime}}</td>
            <td>{{order.creator}}</td>
            <td>{{order.type}}:{{order.name}}</td>
            <td>{{order.desc}}</td>
            <td>{{order.qty }} {{order.unit}}</td>
            <td>{{order.qty1}} {{order.unit1}}</td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-primary btn-mini" href="<?php echo site_url('projects#/inout/{{order.id}}'); ?>">
                        <i class="icon-edit icon-white"></i> Edit
                    </a>

                    <button ng-click="destroy(order)" class="btn btn-danger btn-mini">
                        <i class="icon-trash icon-white"></i> Delete
                    </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
