
<div>
   <h2>List of guests</h2>
    <br>
</div>
<div class="table-wrapper-scroll-y guest-table">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">State </th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($guests as $guest): ?>
            <tr>
                <td><?= $this->Number->format($guest->id) ?></td>
                <td><?= h($guest->first_name) ?></td>
                <td><?= h($guest->last_name) ?></td>
                <td><?= h($guest->state) ?></td>
                <td><?= h($guest->email) ?></td>
                <td><?= h($guest->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $guest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $guest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guest->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
