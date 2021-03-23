<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rbac}}`.
 */
class m210309_124707_create_rbac_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%rbac_auth_rule}}', [
            'name' => $this->string(64)->notNull(),
            'data' => $this->binary(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk_rbac_auth_rule-name', '{{%rbac_auth_rule}}', ['name']);

        $this->createTable('{{%rbac_auth_item}}', [
            'name' => $this->string(64)->notNull(),
            'type' => $this->smallInteger()->notNull(),
            'description' => $this->text(),
            'rule_name' => $this->string(64),
            'data' => $this->binary(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk_rbac_auth_item-name', '{{%rbac_auth_item}}', ['name']);
        $this->addForeignKey(
            'fk_rbac_auth_item-rule_name_rbac_auth_rule-name',
            '{{%rbac_auth_item}}', 'rule_name',
            '{{%rbac_auth_rule}}', 'name',
            'SET NULL', 'CASCADE'
        );

        $this->createTable('{{%rbac_auth_item_child}}', [
            'parent' => $this->string(64)->notNull(),
            'child' => $this->string(64)->notNull(),
        ]);
        $this->addPrimaryKey('pk_rbac_auth_item_child-parent-child', '{{%rbac_auth_item_child}}', ['parent', 'child']);
        $this->addForeignKey(
            'fk_rbac_auth_item_child-parent_rbac_auth_item-name',
            '{{%rbac_auth_item_child}}', 'parent',
            '{{%rbac_auth_item}}', 'name',
            'CASCADE', 'CASCADE'
        );
        $this->addForeignKey(
            'fk_rbac_auth_item_child-child_rbac_auth_item-name',
            '{{%rbac_auth_item_child}}', 'child',
            '{{%rbac_auth_item}}', 'name',
            'CASCADE', 'CASCADE'
        );

        $this->createTable('{{%rbac_auth_assignment}}', [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->string(64)->notNull(),
            'created_at' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk_rbac_auth_assignment-user_id', '{{%rbac_auth_assignment}}', ['user_id']);
        $this->addForeignKey(
            'fk_rbac_auth_assignment-item_name_rbac_auth_item-name',
            '{{%rbac_auth_assignment}}', 'item_name',
            '{{%rbac_auth_item}}', 'name',
            'CASCADE', 'CASCADE'
        );

        $this->createIndex('idx-auth_assignment-user_id', '{{%rbac_auth_assignment}}', 'user_id');
        $this->createIndex('idx-auth_item-type', '{{%rbac_auth_item}}', 'type');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%rbac_auth_assignment}}');
        $this->dropTable('{{%rbac_auth_item_child}}');
        $this->dropTable('{{%rbac_auth_item}}');
        $this->dropTable('{{%rbac_auth_rule}}');
    }
}
