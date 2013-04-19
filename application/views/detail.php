<form name="myForm" class="form-horizontal">
    <div class="control-group" ng-class="{error: myForm.name.$invalid}">
        <label class="control-label" for="name">Item</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="name" id="name" ng-model="project.name" required>
            <span ng-show="myForm.name.$error.required" class="help-inline">Required</span>
        </div>
    </div>

    <div class="control-group" ng-class="{error: myForm.qty.$invalid}">
        <label class="control-label" for="qty">Qty</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="qty" id="qty" ng-model="project.qty" required>
            <span ng-show="myForm.qty.$error.required" class="help-inline">Required</span>
        </div>
    </div>

    <div class="control-group" ng-class="{error: myForm.unit.$invalid}">
        <label class="control-label" for="unit">Unit</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="unit" id="unit" ng-model="project.unit" required>
            <span ng-show="myForm.unit.$error.required" class="help-inline">Required</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="qty1">Qty1</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="qty1" id="qty1" ng-model="project.qty1" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="unit1">Unit1</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="unit1" id="unit1" ng-model="project.unit1" >
        </div>
    </div>

    <label class="control-label" for="notes">Notes</label>
    <div class="controls">
        <textarea class="input-xxlarge" name="notes" id="notes" ng-model="project.notes">
        </textarea>
    </div>

    <div class="form-actions">
        <button ng-click="save()" ng-disabled="isClean() || myForm.$invalid" class="btn btn-primary">
            <i class="icon-ok icon-white"></i> Save
        </button>
        <a href="<?php echo site_url('projects#/'); ?>" class="btn btn-link">Cancel</a>

        <button ng-click="destroy()" ng-show="project.id" class="btn btn-danger pull-right">
            <i class="icon-trash icon-white"></i> Delete
        </button>
    </div>
</form>
