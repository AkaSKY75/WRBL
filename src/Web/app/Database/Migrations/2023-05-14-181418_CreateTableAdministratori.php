<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAdministratori extends Migration
{
    public function up() {
        $this->forge->addField([
           'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
           ],
           'parola' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
           ],
           'nume' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'prenume' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'cnp' => [
            'type' => 'VARCHAR',
            'constraint' => 13,
           ],
           'localitate' => [
            'type' => 'VARCHAR',
            'constraint' => 27,
           ],
           'judet' => [
            'type' => 'VARCHAR',
            'constraint' => 15,
           ],
           'strada' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'bloc' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
           ],
           'scara' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
           ],
           'etaj' => [
            'type' => 'NUMBER',
            'constraint' => 4,
           ],
           'apartament' => [
            'type' => 'NUMBER',
            'constraint' => 5,
           ],
           'numar' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
           ],
           'telefon' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
           ],
           'email' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ADMINISTRATORI');
   }

   public function down() {
       $this->forge->dropTable('ADMINISTRATORI');
   }
}
