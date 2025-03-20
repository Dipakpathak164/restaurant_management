<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_is_publish_to_comp_restaurant extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('comp_restaurant', [
            'is_published' => [
               'type' => 'TINYINT',
                'constraint' => '1',
                'null' => TRUE,
            ]
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_column('comp_restaurant', 'is_published');
    }
}
