<h2>Article Listing</h2>
<?php if($articles): ?>
<ul>
<?php foreach($articles as $a): ?>
    <li>
        <ul>
            <li><?= $a->getTitle(); ?></li>
            <li><a href="index.php?controller=Article&action=del&id=<?= $a->getId(); ?>">löschen</a></li>
            <li><a href="index.php?controller=Article&action=mod&id=<?= $a->getId(); ?>">modifizieren</a></li>
            <li><a href="index.php?controller=Article&action=view&id=<?= $a->getId(); ?>">lesen</a></li>
        </ul>
    </li>
<?php endforeach; ?>
</ul>
<?php else: ?>
    <h3>Keine Artikel vorhanden</h3>
<?php endif; ?>
