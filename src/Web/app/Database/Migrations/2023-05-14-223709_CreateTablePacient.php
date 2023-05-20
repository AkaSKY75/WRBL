<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePacienti extends Migration
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
           'doctor' => [
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
           'varsta' => [
            'type' => 'NUMERIC',
            'constraint' => 3,
            'unsigned' => true
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
           'profesie' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'loc_de_munca' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'istoric_medical' => [
            'type' => 'VARCHAR',
            'constraint' => 4000,
           ],
           'alergii' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id', 'DOCTORI', 'id', '', '');
        $this->forge->createTable('PACIENTI');
   }

   public function down() {
       $this->forge->dropTable('PACIENTI');
   }
}
