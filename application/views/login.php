<div class="container">
    <div style="margin-left:170px;">
        <img src="img/logo.png"></img>
        <br>
        <strong>Inventory Control System</strong>
    </div>
    <hr>

    <?php echo form_open('user/login', array("class" => "form-horizontal")); ?>
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" name="username" placeholder="Username">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Sign in</button>
            </div>
        </div>
    </form>
    <div style="margin-left:170px;">
        <?php echo '<div style="color:red">'.validation_errors().'</div>'; ?>
    </div>

</div>
