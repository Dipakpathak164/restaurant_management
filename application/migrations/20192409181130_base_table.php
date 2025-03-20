<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_base_table extends CI_Migration {

    public function up(){

        /*create add new company table*/
        $fields = array(
            'company_id' => array(
                'type' => 'INT',
                'constraint' => '16',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'company_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE,
            ),
            'company_phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => TRUE,
            ),
            'company_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => TRUE,
            ),
            'company_country_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'company_logo' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'creation_time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE,
            ),
            'created_by' => array(
                'type' => 'INT',
                'null' => TRUE,
            ),
            'update_time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE,
            ),
            'updated_by' => array(
                'type' => 'INT',
                'null' => TRUE,
            ),
            'is_active' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => TRUE,
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('company_id',TRUE);
        $this->dbforge->create_table('company',TRUE);

        /*create add new customer users table*/
        $fields = array(
            'comp_restaurant_id' => array(
                'type' => 'INT',
                'constraint' => '16',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'company_id' => array(
                'type' => 'INT',
                'constraint' => '16',
                'null' => TRUE,
            ),
            'restaurant_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'restaurant_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'creation_time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE,
            ),
            'created_by' => array(
                'type' => 'INT',
                'null' => TRUE,
            ),
            'update_time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE,
            ),
            'updated_by' => array(
                'type' => 'INT',
                'null' => TRUE,
            ),
            'is_active' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => TRUE,
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('comp_restaurant_id',TRUE);
        $this->dbforge->create_table('comp_restaurant',TRUE);

        /*create add new customer users table*/
        $fields = array(
            'company_user_id' => array(
                'type' => 'INT',
                'constraint' => '16',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => '16',
                'null' => TRUE,
            ),
            'company_id' => array(
                'type' => 'INT',
                'constraint' => '16',
                'null' => TRUE,
            ),
            'comp_restaurant_id' => array(
                'type' => 'INT',
                'constraint' => '16',
                'null' => TRUE,
            ),
            'update_time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE,
            ),
            'updated_by' => array(
                'type' => 'INT',
                'null' => TRUE,
            ),
            'is_active' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => TRUE,
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('company_user_id',TRUE);
        $this->dbforge->create_table('company_users',TRUE);

    }

    public function down(){

        $this->dbforge->drop_table('customer',TRUE);
        $this->dbforge->drop_table('company_users',TRUE);

    }

}
