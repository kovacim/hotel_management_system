<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Guest $guest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Guest'), ['action' => 'edit', $guest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Guest'), ['action' => 'delete', $guest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Guests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Guest'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="guests view large-9 medium-8 columns content">
    <h3><?= h($guest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($guest->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($guest->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($guest->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($guest->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($guest->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($guest->id) ?></td>
        </tr>
    </table>
</div>
