<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_report_expense extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'report_category_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'report_category_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('report_category_id', TRUE);
        $this->dbforge->create_table('report_category');

        $default_categories = [
            ['report_category_name' => 'Salary'],
            ['report_category_name' => 'Invoice'],
            ['report_category_name' => 'One-time Expence'],
            ['report_category_name' => 'Other'],
        ];
        $this->db->insert_batch('report_category', $default_categories); // Insert multiple rows


        // Create the report_expense table
        $this->dbforge->add_field(array(
            'report_expense_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'restaurant_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'expense_date' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'expense_type' => array(
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
        $this->dbforge->add_key('report_expense_id', TRUE);
        $this->dbforge->create_table('report_expense');

        // Create the invoice table
        $this->dbforge->add_field(array(
            'invoice_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'expense_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'invoice_file' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'invoice_date' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'beer_expense' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'liquor_expense' => array(
               'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'wine_expense' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'beverage_expense' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'food_expense' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'pastry_expense' => array(
               'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
            'retail_expense' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('invoice_id', TRUE);
        $this->dbforge->create_table('invoice');

        // Create the salary table
        $this->dbforge->add_field(array(
            'salary_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'expense_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'yearly_salary' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('salary_id', TRUE);
        $this->dbforge->create_table('salary');

        // Create the one_time_expense table
        $this->dbforge->add_field(array(
            'one_time_expense_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'expense_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'one_time_category' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'one_time_amount' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('one_time_expense_id', TRUE);
        $this->dbforge->create_table('one_time_expense');

        // Create the other table
        $this->dbforge->add_field(array(
            'other_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'expense_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'other_expense_description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'other_expense_amount' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('other_id', TRUE);
        $this->dbforge->create_table('other');
    }

    public function down()
    {
        $this->dbforge->drop_table('report_expense');
        $this->dbforge->drop_table('report_category');
        $this->dbforge->drop_table('invoice');
        $this->dbforge->drop_table('salary');
        $this->dbforge->drop_table('one_time_expense');
        $this->dbforge->drop_table('other');
    }
}
