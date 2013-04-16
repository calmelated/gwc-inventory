<script type="text/javascript" src="script/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="script/tiny_mce/tiny_mce_tiny.js"></script>

<?php if(!isset($action) || $action == 'create') { ?>
    <h1>Create News:</h1>
    <?php echo form_open('news/create'); ?>
        <p>
            <label for="title">Title</label>
            <input maxlength="64" size="64" name="title" type="text" value="<?php echo set_value('title'); ?>"></input>
            <?php echo '<div style="color:red">'.form_error('title').'</div>'; ?>
        </p>
        <p>
            <textarea rows="25" cols="50" name="content" type="text"><?php echo set_value('content'); ?></textarea>
            <?php echo '<div style="color:red">'.form_error('content').'</div>'; ?>
        </p>
        <p>
           <input value="Submit" name="Submit" type="submit" />
           <input value="Reset" name="Reset" type="reset" />
        </p>
    </form>
<?php } else { ?>
    <h1>Modify News:</h1>
    <?php foreach($news_info as $news) { ?>
        <?php echo form_open('news/modify/'.$news['id']); ?>
            <p>
                <label for="title">Title</label>
                <input maxlength="64" size="64" name="title" type="text" value="<?=$news['title']?>"></input>
                <?php echo '<div style="color:red">'.form_error('title').'</div>'; ?>
            </p>
            <p>
                <textarea rows="25" cols="50" name="content" type="text"><?=$news['content']?></textarea>
                <?php echo '<div style="color:red">'.form_error('content').'</div>'; ?>
            </p>
            <p>
               <input value="Submit" name="Submit" type="submit" />
               <input value="Reset" name="Reset" type="reset" />
            </p>
        </form>
    <?php } ?>
<?php } ?>
