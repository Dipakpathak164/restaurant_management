<?php

class Migration_Install_ion_auth extends CI_Migration {

    public function up() {
        // Drop table 'groups' if it exists
        $this->dbforge->drop_table('groups', TRUE);

        // Table structure for table 'groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('groups');

        // Insert default Super Admin group
        $data = array(
            'id' => 1,
            'name' => 'super_admin',
            'description' => 'Super Administrator'
        );
        $this->db->insert('groups', $data);

        // Drop table 'users' if it exists
        $this->dbforge->drop_table('users', TRUE);

        // Table structure for table 'users'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '45'
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'salt' => array(
                'type' => 'VARCHAR',
                'constraint' => '40'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '254',
                'unique' => TRUE
            ),
            'activation_selector' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'activation_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'forgotten_password_selector' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'forgotten_password_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'forgotten_password_time' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'remember_selector' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'remember_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'created_on' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'last_login' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'active' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE
            ),
            'account_verified' => array(
                'type' => 'INT',
                'default' => 0
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        // Insert default Super Admin user
        $data = array(
            'id' => '1',
            'ip_address' => '127.0.0.1',
            'username' => 'superadmin',
            'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
            'salt' => '',
            'email' => 'info@restaurant.com',
            'activation_code' => '',  
            'forgotten_password_code' => NULL,
            'created_on' => time(),
            'last_login' => time(),
            'active' => '1',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'account_verified' =>1
        ); 
        $this->db->insert('users', $data);

        // Drop table 'users_groups' if it exists
        $this->dbforge->drop_table('users_groups', TRUE);

        // Table structure for table 'users_groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => '8',
                'unsigned' => TRUE
            ),
            'group_id' => array(
                'type' => 'INT',
                'constraint' => '8',
                'unsigned' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users_groups');

        // Dumping data for table 'users_groups'
        $data = array(
            array(
                'id' => '1',
                'user_id' => '1',
                'group_id' => '1',
            ),
            array(
                'id' => '2',
                'user_id' => '2',
                'group_id' => '2',
            ),
            array(
                'id' => '3',
                'user_id' => '3',
                'group_id' => '3',
            ),
            array(
                'id' => '4', // Unique ID for the users_groups table
                'user_id' => '3', // Corresponding to the new user's ID
                'group_id' => '3' // Group ID (reuse or create a new group as needed)
            )
        );
        $this->db->insert_batch('users_groups', $data);

      // Drop table 'login_attempts' if it exists
       $this->dbforge->drop_table('login_attempts', TRUE);
       // Table structure for table 'login_attempts'
       $this->dbforge->add_field(array(
        'id' => array(
            'type' => 'INT',
            'constraint' => '8',
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'ip_address' => array(
            'type' => 'VARCHAR',
            'constraint' => '16'
        ),
        'login' => array(
            'type' => 'VARCHAR',
            'constraint' => '100',
            'null' => TRUE
        ),
        'time' => array(
            'type' => 'INT',
            'constraint' => '11',
            'unsigned' => TRUE,
            'null' => TRUE
        )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('login_attempts');

    }
    public function down() {
        $this->dbforge->drop_table('users', TRUE);
        $this->dbforge->drop_table('groups', TRUE);
        $this->dbforge->drop_table('users_groups', TRUE);
        $this->dbforge->drop_table('login_attempts', TRUE);
    }
}
