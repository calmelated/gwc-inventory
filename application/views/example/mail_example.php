<?php echo form_open('mailus'); ?>
    <p>
        <label for="name">Name</label><br>
        <input maxlength="47" size="47" name="name" type="text" value="<?php echo set_value('name'); ?>"/>
        <?php echo '<div style="color:red">'.form_error('name').'</div>'; ?>
    </p>
    <p>
        <label for="email">Email<br></label>
        <input maxlength="47" size="47" name="email" type="text" value="<?php echo set_value('email'); ?>"/>
        <?php echo '<div style="color:red">'.form_error('email').'</div>'; ?>
    </p>
    <p>
        <label for="company">Company (optional)<br></label>
        <input maxlength="47" size="47" name="company" type="text" value="<?php echo set_value('company'); ?>" />
        <?php echo form_error('company'); ?>
        <?php echo '<div style="color:red">'.form_error('company').'</div>'; ?>
    </p>
    <p>
        <label for="subject">Subject<br></label>
        <input maxlength="47" size="47" name="subject" type="text" value="<?php echo set_value('subject'); ?>"/>
        <?php echo '<div style="color:red">'.form_error('subject').'</div>'; ?>
    </p>
    <p>
        <label for="comments">Comments<br></label>
        <textarea rows="6" cols="47" name="comments" type="text" value="<?php echo set_value('comments'); ?>"></textarea>
        <?php echo '<div style="color:red">'.form_error('comments').'</div>'; ?>
    </p>

    <p>
        <link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />
        <?php if (!$captchaSolved) { ?>
            <div>
                <?php echo $captchaHtml; ?>
                <?php echo form_input(
                    array(
                    'name'        => 'captcha',
                    'id'          => 'captcha',
                    'value'       => '',
                    'maxlength'   => '100',
                    'size'        => '50'
                    )
                );?>
            </div>
            <?php echo '<div style="color:red">'.form_error('captcha').'</div>'; ?>
        <?php }; ?>
    </p>

    <p>
       <input value="Submit" name="Submit" type="submit" />
       <input value="Reset" name="Reset" type="reset" />
    </p>
</form>
