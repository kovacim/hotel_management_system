<?php

$cakeDescription = 'Users Management';
?>
<!DOCTYPE html>
<html>
<head>
	 <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('base.css') ?>
        <?= $this->Html->css('style.css') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->script('jquery.js') ?>
         <?= $this->Html->script('bootstrap.min.js') ?>


        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
</head>
<body class="login-page">
    <div class="container">
        <div class="form-box">
            <?= $this->fetch('content') ?>
        </div>

    </div>
</body>
</html>



