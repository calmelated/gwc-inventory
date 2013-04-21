<form name="myForm" class="form-horizontal">
    <div class="control-group" ng-class="{error: myForm.name.$invalid}">
        <label class="control-label" for="name">Item</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="name" id="name" ng-model="order.name" required>
            <span ng-show="myForm.name.$error.required" class="help-inline">Required</span>
        </div>
    </div>

    <div class="control-group" ng-class="{error: myForm.creator.$invalid}">
        <label class="control-label" for="creator">Creator</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="creator" id="creator" ng-model="order.creator" required>
            <span ng-show="myForm.creator.$error.required" class="help-inline">Required</span>
        </div>
    </div>

    <div class="control-group" ng-class="{error: myForm.qty.$invalid}">
        <label class="control-label" for="qty">Qty</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="qty" id="qty" ng-model="order.qty" required>
            <span ng-show="myForm.qty.$error.required" class="help-inline">Required</span>
        </div>
    </div>

    <div class="control-group" ng-class="{error: myForm.unit.$invalid}">
        <label class="control-label" for="unit">Unit</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="unit" id="unit" ng-model="order.unit" required>
            <span ng-show="myForm.unit.$error.required" class="help-inline">Required</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="qty1">Qty1</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="qty1" id="qty1" ng-model="order.qty1" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="unit1">Unit1</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="unit1" id="unit1" ng-model="order.unit1" >
        </div>
    </div>

    <label class="control-label" for="notes">Notes</label>
    <div class="controls">
        <textarea class="input-xxlarge" name="notes" id="notes" ng-model="order.notes">
        </textarea>
    </div>

    <div class="form-actions">
        <button ng-click="save()" ng-disabled="isClean() || myForm.$invalid" class="btn btn-primary">
            <i class="icon-ok icon-white"></i> Save
        </button>
        <a href="<?php echo site_url('orders#/'); ?>" class="btn btn-link">Cancel</a>

        <button ng-click="destroy()" ng-show="order.id" class="btn btn-danger pull-right">
            <i class="icon-trash icon-white"></i> Delete
        </button>
    </div>
</form>
