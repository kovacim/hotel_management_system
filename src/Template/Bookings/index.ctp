<div>
   <h2>List of reservations
        <span>
            <?= $this->Html->link('Add new', ['controller'=>'bookings', 'action'=>'add'], ['class'=>'add-new']); ?>
         </span>
    </h2>
    <br>
</div>
<div class="table-wrapper-scroll-y">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Check-in </th>
                <th scope="col">Check-out</th>
                <th scope="col">Room Type</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Booking Dt</th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?= $this->Number->format($booking->id) ?></td>
                <td><?= h($booking->first_name) ?></td>
                <td><?= h($booking->last_name) ?></td>
                <td><?= $booking->check_in->i18nFormat('yyyy-MM-dd') ?></td>
                <td><?= $booking->check_out->i18nFormat('yyyy-MM-dd') ?></td>
                <td><?= h($booking->room_type) ?></td>
                <td><?= h($booking->total_cost) ?></td>
                <td><?= $booking->created->i18nFormat('yyyy-MM-dd') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
