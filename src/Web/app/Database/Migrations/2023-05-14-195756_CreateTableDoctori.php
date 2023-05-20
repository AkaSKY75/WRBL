<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDoctori extends Migration
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
           'administrator' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true
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
            'type' => 'NUMERIC',
            'constraint' => 4,
           ],
           'apartament' => [
            'type' => 'NUMERIC',
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
           ],
           'calificare' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id', 'ADMINISTRATORI', 'id', '', '');
        $this->forge->createTable('DOCTORI');
   }

   public function down() {
       $this->forge->dropTable('DOCTORI');
   }
}
