<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Guest $guest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $guest->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $guest->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Guests'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="guests form large-9 medium-8 columns content">
    <?= $this->Form->create($guest) ?>
    <fieldset>
        <legend><?= __('Edit Guest') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('state');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
