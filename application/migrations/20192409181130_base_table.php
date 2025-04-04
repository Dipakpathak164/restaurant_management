<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_base_table extends CI_Migration {

    public function up() {
        // Customers Table with Authentication Fields
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE
            ],
            'password' => [ // Hashed password for login
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'active' => [ // Activation status (0 = inactive, 1 = active)
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('customers');

        // Products Table
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('products');

        // Orders Table
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('orders');

        // Foreign Key Constraints
        // $this->db->query('ALTER TABLE orders ADD CONSTRAINT fk_orders_customer FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE');
    }

    public function down() {
        $this->dbforge->drop_table('orders');
        $this->dbforge->drop_table('products');
        $this->dbforge->drop_table('customers');
    }
}
