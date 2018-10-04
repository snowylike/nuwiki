<form action="index.php?controller=Article&action=mod" method="post">
    <input type="hidden" name="id" value="<?php echo $article->getId(); ?>">
    <input type="text" name="title" value="<?php echo $article->getTitle(); ?>">
    <textarea name="content">
        <?php echo $article->getContent(); ?>
    </textarea>
    <input type="submit" name="modArticle" value="ändern">
</form>
