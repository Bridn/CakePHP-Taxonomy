<?php

use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
    */

    /**
     * Migrate Up.
     */
    public function up()
    {
        $terms = $this->table('terms', array('id' => false, 'primary_key' => array('id')));
        $terms->addColumn('id', 'char', array('limit' => 36))
              ->addColumn('title', 'string', array('limit' => 100))
              ->addColumn('type', 'string', array('limit' => 50))
              ->addColumn('slug', 'string', array('limit' => 100, 'null' => true, 'default' => null))
              ->addColumn('term_count', 'integer', array('limit' => 11, 'null' => true, 'default' => null))
              ->addColumn('created', 'datetime', array('null' => true, 'default' => null))
              ->addColumn('modified', 'datetime', array('null' => true, 'default' => null))
              ->addIndex(array('title', 'slug'), array('unique' => false))
              ->save();

        $termsRelationships = $this->table('terms_relationships', array('id' => false, 'primary_key' => array('id')));
        $termsRelationships->addColumn('id', 'char', array('limit' => 36))
              ->addColumn('reference_id', 'char', array('limit' => 36))
              ->addColumn('reference_table', 'string', array('limit' => 50, 'null' => true, 'default' => null))
              ->addColumn('term_id', 'char', array('limit' => 36))
              ->addColumn('created', 'datetime', array('null' => true, 'default' => null))
              ->addColumn('modified', 'datetime', array('null' => true, 'default' => null))
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}