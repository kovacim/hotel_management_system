<div>
   <h2>List of rooms
        <span>
            <?= $this->Html->link('Add new', ['controller'=>'rooms', 'action'=>'add'], ['class'=>'add-new-room']); ?>
         </span>
    </h2>
    <br>
</div>
<div class="table-wrapper-scroll-y room-table">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Rooms Type</th>
                <th scope="col">Floor Number</th>
                <th scope="col">Capacity </th>
                <th scope="col">Price/day</th>
                <th scope="col">Status</th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= $this->Number->format($room->id) ?></td>
                <td><?= h($room->type) ?></td>
                <td><?= h($room->floor_nr) ?></td>
                <td><?= h($room->capacity) ?></td>
                <td><?= h($room->price) ?></td>
                <td><?= h($room->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
