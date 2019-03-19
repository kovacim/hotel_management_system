<div class="wrapper">
	<div class="inner">
	    <h3>NEW ROOM</h3>
	    <?= $this->Flash->render(); ?>
	        <?= $this->Form->create() ?>
                  <?php
                          $options = array();
                          $numbers = array(0, 1,2,3,4,5,6,7);
                            foreach($rooms as $room) {
                                array_push($options, $room['type']);
                             }

                  ?>
                 	<div class="form-row">
                           <?= $this->Form->input('id', ['required'=>true, 'label'=>'Room Number']); ?>
                           <?= $this->Form->input('room_type', ['required'=>true, 'empty'=>'Choose', 'options'=>$options]); ?>
                           <?= $this->Form->input('floor_nr', [ 'required'=>true, 'empty'=>'Choose', 'options'=>$numbers]); ?>
                     </div><br>
                 	<div class="form-row">
                 	       <?= $this->Form->input('capacity', [ 'required'=>true, 'empty'=>'Choose', 'options'=>$numbers]); ?>
                 	       <?= $this->Form->input('price', ['required'=>true, 'label'=>'Price/day']); ?>
                           <?= $this->Form->input('status'); ?>

                     </div><br>





            <?= $this->Form->submit('Submit', array('class' => 'add-new-room ')); ?>
            <?= $this->Form->end() ?>
    </div>
</div>

