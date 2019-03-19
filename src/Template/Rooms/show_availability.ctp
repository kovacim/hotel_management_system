<div class="wrapper">
	<div class="inner">

	    <?= $this->Flash->render(); ?>
	        <?= $this->Form->create() ?>
                 	<div class="form-row">

                           <?= $this->Form->input('from', [ 'label'=>'From', 'class'=>'form-control datepicker-here dp1 form-wrapper', 'data-language'=>'en']); ?>
                           <?= $this->Form->input('to', [ 'label'=>'To', 'class'=>'form-control datepicker-here dp2', 'data-language'=>'en']); ?>
                           <?= $this->Form->submit('Show calendar', array('class' => 'show-calendar ')); ?>
                     </div>


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


    <br>


    <?php if (empty($calendar)): ?>
    <?php else: ?>


<div class="table-wrapper-scroll-x-y">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Rooms</th>

                <?php for ($i=0; $i<count($calendar); $i++): ?>
                       <th scope="col"><?= $calendar[$i] ?></th>
                 <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
            <tr>
                <td class="fixed-column"><?= $this->Number->format($room->id) ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif ?>