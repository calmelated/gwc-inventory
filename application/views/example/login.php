<?php echo form_open('user/login'); ?>
    <p>
        <label for="username">User Name</label><br>
        <input maxlength="32" size="32" name="username" type="text" value="<?php echo set_value('username'); ?>"/>
        <?php echo '<div style="color:red">'.form_error('username').'</div>'; ?>
    </p>
    <p>
        <label for="password">Password<br></label>
        <input maxlength="64" size="32" name="password" type="password" value="<?php echo set_value('password'); ?>"/>
        <?php echo '<div style="color:red">'.form_error('email').'</div>'; ?>
    </p>
    <p>
       <input value="Submit" name="Submit" type="submit" />
       <input value="Reset" name="Reset" type="reset" />
    </p>
</form>
<p><?php echo '<div style="color:red">'.validation_errors().'</div>'; ?></p>
