<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Comp_Onboarding extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'comp_onboarding_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'phone_number' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'preferred_contact_method' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'other_contact_method' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'company_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'restaurant_count' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            
            'is_toast' => array(
                'type' => 'ENUM',
                'constraint' => array('yes', 'no'),
            ),
            'ssh_data_export' => array(
                'type' => 'ENUM',
                'constraint' => array('yes', 'no'),
                'null' => TRUE,
            ),
            'help_turn_on' => array(
                'type' => 'ENUM',
                'constraint' => array('yes', 'no', 'na'),
                'null' => TRUE,
            ),
            'other_platform' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
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
            'is_published' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => TRUE,
            ),
            'is_active' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => TRUE,
            ),
        ));
        
        $this->dbforge->add_key('comp_onboarding_id', TRUE);
        $this->dbforge->create_table('comp_onboarding');

        $this->dbforge->add_field(array(
            'restaurant_details_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'company_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            'restaurant_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'location' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'revenue_jan_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_feb_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_mar_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_apr_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_may_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_jun_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_jul_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_aug_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_sep_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_oct_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_nov_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'revenue_dec_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'labor_perct_target' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'foh_labor' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'boh_labor' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'salary_include' => array(
                'type' => 'ENUM',
                'constraint' => array('yes', 'no'),
                'null' => TRUE,
            ),
            'foh_amount' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'boh_amount' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ),
            'food_cogs' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'pastry_cogs' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'beer_cogs' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'wine_cogs' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'liquor_cogs' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'bev_coffee_cogs' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'smallware_cogs' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => TRUE,
            ),
            'other_cogs' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
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
            'is_published' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => TRUE,
            ),
            'is_active' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => TRUE,
            ),
        ));

        $this->dbforge->add_key('restaurant_details_id', TRUE);
        $this->dbforge->create_table('restaurant_details');
    }

    public function down()
    {
        $this->dbforge->drop_table('comp_onboarding');
        $this->dbforge->drop_table('restaurant_details');
    }
}
