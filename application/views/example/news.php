<style> @import url("css/news.css"); </style>

<?php foreach($news_info as $news) { ?>
    <div class="square">
        <h3><?=$news['date']?> - <?=$news['title']?></h3>
        <?php if ($action == 'article') { ?>
            <div><?=$news['content']?></div>
        <?php } elseif (mb_strlen($news['content']) > 256) { ?>
            <div><pre><?=mb_substr($news['content'], 0, 256);?></pre><a href="news/<?=$news['id']?>">...... (more)</a></div>
        <?php } else { ?>
            <div><?=$news['content']?></div>
        <?php } ?>

        <?php if(isset($this->session->userdata['logged_in'])) { ?>
            <a href="news/modify/<?=$news['id']?>">modify</a> |
            <a href="news/delete/<?=$news['id']?>">delete</a>
        <?php } ?>
    </div>
<?php } ?>

<br><br>
<?php if($action == 'article') {?>
    <a href="javascript:window.history.back();">Back</a>
<?php } else {?>
    <a href="news/create">Add News </a> |
    <?=$news_link?>
<?php } ?>
