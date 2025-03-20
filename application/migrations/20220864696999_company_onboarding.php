<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_company_onboarding extends CI_Migration {

    public function up()
    {
        $fields= array(
            'company_onboarding_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => FALSE
            ),
            'contact_method' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'other_contact_method' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'multiple_restaurants' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => FALSE
            ),
            'restaurant_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'is_toast_pos' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => FALSE
            ),
            'ssh_data_export' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => TRUE
            ),
            'help_turn_on_ssh' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => TRUE
            ),
            'monthly_forecast' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => TRUE
            ),
            'revenue_jan_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_feb_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_mar_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_apr_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_may_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_jun_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_jul_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_aug_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_sep_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_oct_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_nov_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'revenue_dec_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'labor_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'overall_labor_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'foh_labor_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'boh_labor_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'salary_include' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'foh_salary_amount' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'boh_salary_amount' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'cogs_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'food_cogs' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'pastry_cogs' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'beer_cogs' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'wine_cogs' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'liquor_cogs' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'bev_coffee_cogs' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'smallware_cogs' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'other_cogs' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'other_platform' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
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


        $this->dbforge->add_key('company_onboarding_id', TRUE);

        $this->dbforge->create_table('company_onboarding');
    }

    public function down()
    {
        // Drop the company_onboarding table
        $this->dbforge->drop_table('company_onboarding');
    }
}