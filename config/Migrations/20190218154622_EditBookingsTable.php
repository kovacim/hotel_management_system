<?php
use Migrations\AbstractMigration;

class EditBookingsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('bookings');
        $table->removeColumn('booking_dt');

        $table->update();
    }
}
