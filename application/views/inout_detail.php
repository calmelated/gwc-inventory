
<form id="orderForm" name="myForm" class="form-horizontal" >
    <div class="control-group">
        <label class="control-label" for="type">Type<span class="star"> * </span></label>
        <div class="controls">
            <select class="span3" name="type" id="type" ng-model="order.type">
                <option ng-repeat="type in types" ng-selected="type.name == order.type" value="{{type.name}}">{{type.name}}</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="name">Item<span class="star"> * </span></label>
        <div class="controls">
            <input class="input-large" type="text" name="name" id="name" ng-model="order.name">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="creator">Creator<span class="star"> * </span></label>
        <div class="controls">
            <!--input class="input-large" type="text" name="creator" id="creator" ng-repeat="creator in creators" ng-model="order.creator" ng-init="order.creator = creator.name"--!>
            <input class="input-large" type="text" name="creator" id="creator"  ng-model="order.creator">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="qty">Qty<span class="star"> * </span></label>
        <div class="controls">
            <input class="input-small" type="text" name="qty"  id="qty" ng-model="order.qty">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="unit">Unit<span class="star"> * </span></label>
        <div class="controls">
            <select class="span1" name="unit" id="unit" ng-model="order.unit">
                <option ng-repeat="unit in units" ng-selected="unit.name == order.unit" value="{{unit.name}}">{{unit.name}}</option>
            </select>
        </div>
    </div>

    <div class="control-group" ng-hide="moreunit">
        <label class="control-label">More Unit</label>
        <div class="controls">
            <input type="checkbox" ng-model="moreunit"></input>
        </div>
    </div>

    <div class="control-group" ng-show="moreunit">
        <label class="control-label" for="qty1">Qty1</label>
        <div class="controls">
            <input class="input-small" type="text" name="qty1"  id="qty1"  ng-model="order.qty1">
        </div>
    </div>

    <div class="control-group" ng-show="moreunit">
        <label class="control-label" for="unit1">Unit1</label>
        <div class="controls">
            <select class="span1" name="unit1" id="unit1" ng-model="order.unit1">
                <option ng-repeat="unit1 in units" ng-selected="unit1.name == order.unit1" value="{{unit1.name}}">{{unit1.name}}</option>
            </select>
        </div>
    </div>

    <label class="control-label" for="Description">Description</label>
    <div class="controls">
        <textarea class="input-xxlarge" rows="3" name="desc" id="desc" ng-model="order.desc">
        </textarea>
    </div>

    <div class="form-actions">
        <button ng-click="save()" ng-disabled="isClean()" class="btn btn-primary">
            <i class="icon-ok icon-white"></i> Save
        </button>
        <a href="<?php echo site_url('projects#/inout'); ?>" class="btn btn-link">Cancel</a>

        <button ng-click="destroy()" ng-show="order.id" class="btn btn-danger pull-right">
            <i class="icon-trash icon-white"></i> Delete
        </button>
    </div>
</form>
