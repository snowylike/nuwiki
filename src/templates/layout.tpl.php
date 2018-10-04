<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>NuWiki</title>
    </head>
    <body>
        <header>
            <?php if(!isset($_SESSION['user'])) require('login.tpl.php'); ?>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="index.php?controller=Index&action=logout">Logout</a>
            <?php endif; ?>
            <?php if($message): ?>
            <ul>
                <?php foreach($message as $m): ?>
                    <li><?= $m ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </header>
        <nav>
            <a href="index.php">Home</a>
            <a href="index.php?controller=User">User Controls</a>
        </nav>
        <main>
            <?php require($template); ?>
        </main>
    </body>
</html>
