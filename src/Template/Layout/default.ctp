
<?php
$cakeDescription = 'Hotel Management System';
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
    <?= $this->Html->css('datepicker.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('datepicker.js') ?>
    <?= $this->Html->script('datepicker.en.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg fixed-top">
  <a class="navbar-brand">Hotel Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-user-circle"></i> <?= h($name) ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <?= $this->Html->link('<i class="fa fa-user" style="color:#00B8EF"></i> Profile', ['action'=>'logout'], ['class' => 'dropdown-item', 'escape' => false]); ?>
           <?= $this->Html->link('<i class="fa fa-power-off" style="color:#00B8EF"></i> Logout', ['action'=>'logout'], ['class' => 'dropdown-item', 'escape' => false]); ?>
        </div>
      </li>
    </ul>
  </div>
</nav>

    <?php
    /**
     * @var \App\View\AppView $this
     * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $users
     */
    ?>
    <nav class="large-2 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><span><i class="fa fa-dashboard" style="font-size: 22px"></i></span> Dashboard</li>
            <li> <?= $this->Html->link('<i class="fa fa-book"></i> Bookings', ['controller'=>'bookings', 'action'=>'index'], ['class' => 'nav-link', 'escape' => false]); ?></li>
            <li> <?= $this->Html->link('<i class="fa fa-users"></i> Guests', ['controller'=>'guests', 'action'=>'index'], ['class' => 'nav-link', 'escape' => false]); ?></li>
            <li> <?= $this->Html->link('<i class="fa fa-plane"></i> Arrivals/Departures', ['controller'=>'bookings', 'action'=>'show_arrivals'], ['class' => 'nav-link', 'escape' => false]); ?></li>
            <li> <?= $this->Html->link('<i class="fa fa-calendar"></i> Availability Calendar', ['controller'=>'rooms', 'action'=>'show_availability'], ['class' => 'nav-link', 'escape' => false]); ?></li>
            <li> <?= $this->Html->link('<i class="fa fa-bed"></i> Rooms Management', ['controller'=>'rooms', 'action'=>'index'], ['class' => 'nav-link', 'escape' => false]); ?></li>
            <li> <?= $this->Html->link('<i class="fa fa-users"></i> Hr Management', ['controller'=>'employees', 'action'=>'index'], ['class' => 'nav-link', 'escape' => false]); ?></li>
            <li> <?= $this->Html->link('<i class="fa fa-info-circle"></i> About', ['action'=>'about'], ['class' => 'nav-link', 'escape' => false]); ?></li>
            <li> <?= $this->Html->link('<i class="fa fa-question-circle"></i> Help', ['action'=>'help'], ['class' => 'nav-link', 'escape' => false]); ?></li>
        </ul>
    </nav>
    <div class="users index large-9 medium-8 columns content">
         <?= $this->Flash->render() ?>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
    </div>


    <footer>

    </footer>
</body>
</html>

