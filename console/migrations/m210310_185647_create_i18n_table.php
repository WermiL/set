<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

use app\modules\rbac\models\records\rbacAuthItem\RbacAuthItem;
use yii\db\Migration;

class m210310_185647_create_i18n_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%i18n_source_message}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string()->notNull()->defaultValue(''),
            'message' => $this->text()->notNull()->defaultValue(''),
        ]);

        $this->createTable('{{%i18n_message}}', [
            'id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull()->defaultValue(''),
            'translation' => $this->text()->notNull()->defaultValue(''),
        ]);

        $this->addPrimaryKey('pk_i18n_message-id-language', '{{%i18n_message}}', ['id', 'language']);

        $this->addForeignKey(
            'fk_i18n_message-id_i18n_source_message-id',
            '{{%i18n_message}}', 'id',
            '{{%i18n_source_message}}', 'id',
            'CASCADE', 'RESTRICT'
        );

        $this->createIndex('idx_i18n_source_message-category', '{{%i18n_source_message}}', 'category');
        $this->createIndex('idx_i18n_message-language', '{{%i18n_message}}', 'language');

        $this->createTable('{{%i18n_language}}', [
            'id' => $this->primaryKey(),
            'identifier' => $this->string()->notNull()->defaultValue(''),
            'name' => $this->text()->notNull()->defaultValue(''),
            'status'=> $this->tinyInteger()->notNull()->defaultValue(1),
        ]);

        $this->batchInsert('{{%i18n_language}}',
            ['identifier', 'name'],
            [
                ['en-US', 'English'],
                ['uk-UA', 'Ukrainian'],
                ['ru-RU', 'Russian'],
            ]
        );

        /**
         * Translation Permission
         */
        $auth = Yii::$app->authManager;
        $roleAdmin = $auth->getRole(RbacAuthItem::ROLE_ADMIN);

        $createTranslation = $auth->createPermission('i18n_translation/create');
        $createTranslation->description = 'Translation Create';

        $viewTranslation = $auth->createPermission('i18n_translation/view');
        $viewTranslation->description = 'Translation View';

        $updateTranslation = $auth->createPermission('i18n_translation/update');
        $updateTranslation->description = 'Translation Update';

        $deleteTranslation = $auth->createPermission('i18n_translation/delete');
        $deleteTranslation->description = 'Translation Delete';

        $auth->add($createTranslation);
        $auth->add($viewTranslation);
        $auth->add($updateTranslation);
        $auth->add($deleteTranslation);

        $auth->addChild($roleAdmin, $createTranslation);
        $auth->addChild($roleAdmin, $viewTranslation);
        $auth->addChild($roleAdmin, $updateTranslation);
        $auth->addChild($roleAdmin, $deleteTranslation);

        /**
         * Language Permission
         */
        $createLanguage = $auth->createPermission('i18n_language/create');
        $createLanguage->description = 'Translation Create';

        $viewLanguage = $auth->createPermission('i18n_language/view');
        $viewLanguage->description = 'Translation View';

        $updateLanguage = $auth->createPermission('i18n_language/update');
        $updateLanguage->description = 'Translation Update';

        $deleteLanguage = $auth->createPermission('i18n_language/delete');
        $deleteLanguage->description = 'Translation Delete';

        $auth->add($createLanguage);
        $auth->add($viewLanguage);
        $auth->add($updateLanguage);
        $auth->add($deleteLanguage);

        $auth->addChild($roleAdmin, $createLanguage);
        $auth->addChild($roleAdmin, $viewLanguage);
        $auth->addChild($roleAdmin, $updateLanguage);
        $auth->addChild($roleAdmin, $deleteLanguage);
    }

    public function down()
    {
        $this->dropTable('{{%i18n_message}}');
        $this->dropTable('{{%i18n_source_message}}');
        $this->dropTable('{{%i18n_language}}');

        $auth = Yii::$app->authManager;
        $createTranslation = $auth->getPermission('i18n_translation/create');
        $viewTranslation = $auth->getPermission('i18n_translation/view');
        $updateTranslation = $auth->getPermission('i18n_translation/update');
        $deleteTranslation = $auth->getPermission('i18n_translation/delete');
        $auth->remove($createTranslation);
        $auth->remove($viewTranslation);
        $auth->remove($updateTranslation);
        $auth->remove($deleteTranslation);

        $createLanguage = $auth->getPermission('i18n_language/create');
        $viewLanguage = $auth->getPermission('i18n_language/view');
        $updateLanguage = $auth->getPermission('i18n_language/update');
        $deleteLanguage = $auth->getPermission('i18n_language/delete');
        $auth->remove($createLanguage);
        $auth->remove($viewLanguage);
        $auth->remove($updateLanguage);
        $auth->remove($deleteLanguage);
    }
}
