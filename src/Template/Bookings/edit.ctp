<div class="wrapper">
	<div class="inner">
	    <h3>EDIT BOOKING</h3>
	    <?= $this->Flash->render(); ?>
	        <?= $this->Form->create($booking) ?>
                	<div class="form-row">
                          <h4>Guest Information</h4>
                    </div>

                	<div class="form-row">
                          <?= $this->Form->input('first_name', [ 'required'=>true,  'label'=>'First Name']); ?>
                          <?= $this->Form->input('last_name', [ 'required'=>true,  'label'=>'Last Name']); ?>
                    </div>
                	<div class="form-row">
                          <?= $this->Form->input('email', [ 'required'=>true,  'label'=>'Email']); ?>
                          <?= $this->Form->input('phone', [ 'required'=>true,  'label'=>'Phone']); ?>
                          <?= $this->Form->input('state', [ 'label'=>'State']); ?>
                    </div>

                	<div class="form-row">
                          <h4>Booking Information</h4>
                    </div>
                 	<div class="form-row">

                           <?= $this->Form->input('check_in ', [ 'required'=>true,  'label'=>'Check-in ', 'class'=>'form-control datepicker-here dp1 form-wrapper', 'data-language'=>'en']); ?>
                           <?= $this->Form->input('check_out ', [ 'required'=>true,  'label'=>'Check-out ', 'class'=>'form-control datepicker-here dp2', 'data-language'=>'en']); ?>
                     </div><br>
                 	<div class="form-row">

                           <?= $this->Form->input('room_type', ['required'=>true]); ?>
                           <?= $this->Form->input('nr_adults', [ 'required'=>true, 'label'=>'Number of Adult Guests']); ?>
                           <?= $this->Form->input('nr_children', [ 'required'=>true,  'label'=>'Number of Child Guests']); ?>
                     </div><br>


            <?= $this->Form->submit('Save Changes', array('class' => 'add-new ')); ?>
            <?= $this->Form->end() ?>
    </div>
</div>



 <script>
      $(function(){
      	var dp1 = $('.dp1').datepicker().data('datepicker');
      	dp1.selectDate(new Date());
      	var dp2 = $('.dp2').datepicker().data('datepicker');
      	dp2.selectDate(new Date());
      })
      </script>