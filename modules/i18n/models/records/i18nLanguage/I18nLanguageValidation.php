<?php

namespace app\modules\i18n\models\records\i18nLanguage;

use Yii;

/**
 * This is the validation class for table "i18n_language".
 *
 * @property int $id
 * @property string $identifier
 * @property string $name
 * @property int $status
 */
class I18nLanguageValidation extends \yii\db\ActiveRecord
{
    public const PRIMARY_LANGUAGE = 'en-US';

    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'i18n_language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['status'], 'integer'],
            [['identifier'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('i18n', 'ID'),
            'identifier' => Yii::t('i18n', 'Identifier'),
            'name' => Yii::t('i18n', 'Name'),
            'status' => Yii::t('i18n', 'Status'),
        ];
    }
}
