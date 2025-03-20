
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_cogs_target extends CI_Migration {
    public function up()
    {
        $this->dbforge->add_column('restaurant_details', [
            'cogs_target' => [
               'type' => 'ENUM',
                'constraint' => array('yes', 'no'),
                'null' => TRUE,
            ]
        ]);
    }
    public function down()
    {
        $this->dbforge->drop_column('restaurant_details', 'cogs_target');
    }
}