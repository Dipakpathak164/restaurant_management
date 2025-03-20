
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_update_report_expense extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('report_expense', [
            'restaurant_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ]
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_column('report_expense', 'restaurant_id');
    }
}