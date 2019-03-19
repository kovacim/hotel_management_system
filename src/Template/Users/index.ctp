<div class="container">
	<div class="row">
	</div>

	<div class="row">
		<div class="col-md-3">
		    <div class="card">
              <div class="card-header arrivals">
                <i class="fa fa-plane" style="color: white; font-size: 40px;"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Arrivals</h5>
                <p class="card-text">(<?= $arrivals ?>)</p>
              </div>
            </div>
		</div>
		<div class="col-md-3 ">
		    <div class="card">
              <div class="card-header bookings">
                <i class="fa fa-book" style="color: white; font-size: 40px;"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Recent Bookings</h5>
                <p class="card-text">(<?= $recent_bookings ?>)</p>
              </div>
            </div>
		</div>
		<div class="col-md-3 ">
		    <div class="card">
              <div class="card-header guests">
                <i class="fa fa-users" style="color: white; font-size: 40px;"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Guests</h5>
                <p class="card-text">(<?= $guests ?>)</p>
              </div>
            </div>
		</div>
		<div class="col-md-3 ">
		    <div class="card">
              <div class="card-header rooms">
                <i class="fa fa-bed" style="color: white; font-size: 40px;"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Rooms</h5>
                <p class="card-text">(<?= $rooms ?>)</p>
              </div>
            </div>
		</div>

	</div>
</div>