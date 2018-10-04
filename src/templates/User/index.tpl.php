<h2>User Setup</h2>
<ul>
<?php foreach($entry as $e): ?>
    <li>
        <ul>
            <li><?= $e->getName(); ?></li>
            <li><?= $e->getSurname(); ?></li>
            <li><?= $e->getNick(); ?></li>
        </ul>
    </li>
<?php endforeach; ?>
</ul>
