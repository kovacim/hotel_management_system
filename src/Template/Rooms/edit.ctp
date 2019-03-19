<div class="wrapper">
	<div class="inner">
	    <h3>Edit room</h3>
	    <?= $this->Flash->render(); ?>
	        <?= $this->Form->create($room) ?>

                 	<div class="form-row">
                 	 <?= $this->Form->control('id'); ?>
                           <?= $this->Form->input('id', ['required'=>true, 'label'=>'Room Number']); ?>
                           <?= $this->Form->input('type', ['required'=>true]); ?>
                           <?= $this->Form->input('floor_nr', [ 'required'=>true]); ?>
                     </div><br>
                 	<div class="form-row">
                 	       <?= $this->Form->input('capacity', [ 'required'=>true]); ?>
                 	       <?= $this->Form->input('price', ['required'=>true, 'label'=>'Price/day']); ?>
                           <?= $this->Form->input('status', [ 'required'=>false]); ?>

                     </div><br>





            <?= $this->Form->submit('Save changes', array('class' => 'add-new-room ')); ?>
            <?= $this->Form->end() ?>
    </div>
</div>

