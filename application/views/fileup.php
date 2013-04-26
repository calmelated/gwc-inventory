<?php
    if(!isset($this->session->userdata['logged_in'])) {
        redirect(site_url('/'), 'refresh');
    }
?>

<?php echo form_open_multipart('fileup/do_upload');?>
    <input type="file" name="userfile" size="128" /><br>
    <input type="submit" value="upload" />
</form>

<?php var_dump($upload_status); ?>
