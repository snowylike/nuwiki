<h2>User Setup</h2>
<ul>
<?php foreach($entry as $e): ?>
    <li>
        <ul>
            <li><?= $e->getName(); ?></li>
            <li><?= $e->getSurname(); ?></li>
            <li><?= $e->getNick(); ?></li>
            <li><a href="index.php?controller=User&action=del&id=<?= $e->getId(); ?>">löschen</a></li>
            <li><a href="index.php?controller=User&action=mod&id=<?= $e->getId(); ?>">modifizieren</a></li>
        </ul>
    </li>
<?php endforeach; ?>
</ul>
