
<form id="itemForm" name="myForm" class="form-horizontal" >
    <div class="control-group">
        <label class="control-label" for="type">Type<span class="star"> * </span></label>
        <div class="controls">
            <select class="span3" name="type" id="type" ng-model="project.type">
                <option ng-repeat="type in types" ng-selected="project.type" value="{{type.name}}">{{type.name}}</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="name">Item<span class="star"> * </span></label>
        <div class="controls">
            <input class="input-large" type="text" name="name" id="name" ng-model="project.name">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="qty">Qty<span class="star"> * </span></label>
        <div class="controls">
            <input class="input-small" type="text" name="qty"  id="qty" ng-model="project.qty">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="unit">Unit<span class="star"> * </span></label>
        <div class="controls">
            <select class="span1" name="unit" id="unit" ng-model="project.unit">
                <option ng-repeat="unit in units" ng-selected="unit.name == project.unit" value="{{unit.name}}">{{unit.name}}</option>
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
            <input class="input-small" type="text" name="qty1"  id="qty1"  ng-model="project.qty1">
        </div>
    </div>

    <div class="control-group" ng-show="moreunit">
        <label class="control-label" for="unit1">Unit1</label>
        <div class="controls">
            <select class="span1" name="unit1" id="unit1" ng-model="project.unit1">
                <option ng-repeat="unit1 in units" ng-selected="unit1.name == project.unit1" value="{{unit1.name}}">{{unit1.name}}</option>
            </select>
        </div>
    </div>

    <label class="control-label" for="Description">Description</label>
    <div class="controls">
        <textarea class="input-xxlarge" rows="3" name="desc" id="desc" ng-model="project.desc">
        </textarea>
    </div>

    <div class="form-actions">
        <button ng-click="save()" ng-disabled="isClean()" class="btn btn-primary">
            <i class="icon-ok icon-white"></i> Save
        </button>
        <a href="<?php echo site_url('projects#/'); ?>" class="btn btn-link">Cancel</a>

        <button ng-click="destroy()" ng-show="project.id" class="btn btn-danger pull-right">
            <i class="icon-trash icon-white"></i> Delete
        </button>
    </div>
</form>
