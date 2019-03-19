
<div class="container">
	<div class="row first-row">
		<div class="col-md-6">
        	<h4>Today</h4>
        </div>
        <div class="col-md-6">
        	<h4 style="float:right"><?= $time_now ?></h4>
        </div>
	</div>

	<div class="row first-row">
			<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
					  <a class="nav-link active" href="#arrivals" role="tab" data-toggle="tab">Arrivals (<?= $nr_arrivals ?>)</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="#departures" role="tab" data-toggle="tab">Departures (<?= $nr_departures ?>)</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="#actual_guests" role="tab" data-toggle="tab">In-house Guests (<?= $nr_in_house ?>)</a>
					</li>
				  </ul>


	</div>
	<div class="row">
			<div class="tab-content">
					<div role="tabpanel" class="tab-pane  active" id="arrivals">
					        <?php if($nr_arrivals==0): ?>
					                <p style="color: #808080">You don't have arrivals today</p>
					         <?php else : ?>
					         <div class="table-wrapper-scroll-y arrival-departure">
	                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Guest</th>
                                            <th scope="col">Arrival Date</th>
                                            <th scope="col">Departure Date</th>
                                            <th scope="col">Room Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($arrivals as $arrival): ?>
                                        <tr>
                                            <td><?= h($arrival->first_name . $arrival->last_name) ?></td>
                                            <td><?= h($arrival->check_in) ?></td>
                                            <td><?= h($arrival->check_out) ?></td>
                                            <td><?= h($arrival->room_nr) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                             </div>
					          <?php endif; ?>
				    </div>
					<div role="tabpanel" class="tab-pane fade" id="departures">

					        <?php if($nr_departures==0): ?>
					                <p style="color: #808080">You don't have departures today</p>
					         <?php else : ?>
					         <div class="table-wrapper-scroll-y arrival-departure">
	                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Guest</th>
                                            <th scope="col">Room Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($departures as $departure): ?>
                                        <tr>
                                            <td><?= h($departure->first_name . $departure->last_name) ?></td>
                                            <td><?= h($departure->room_nr) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                             </div>
					          <?php endif; ?>


					</div>
					<div role="tabpanel" class="tab-pane fade" id="actual_guests">
							        <?php if($nr_in_house==0): ?>
        					                <p style="color: #808080">You don't have any guests today </p>
        					         <?php else : ?>
        					         <div class="table-wrapper-scroll-y arrival-departure">
        	                            <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Guest</th>
                                                    <th scope="col">Arrival Date</th>
                                                    <th scope="col">Departure Date</th>
                                                    <th scope="col">Room Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($guests as $guest): ?>
                                                <tr>
                                                    <td><?= h($guest->first_name . $guest->last_name) ?></td>
                                                    <td><?= h($guest->check_in) ?></td>
                                                    <td><?= h($guest->check_out) ?></td>
                                                    <td><?= h($guest->room_nr) ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                     </div>
        					          <?php endif; ?>
				    </div>
				  </div>
	</div>
</div>
