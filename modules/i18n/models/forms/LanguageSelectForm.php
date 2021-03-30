<?php

namespace app\modules\i18n\models\forms;

use app\modules\i18n\models\records\i18nLanguage\I18nLanguage;
use Yii;
use yii\base\Model;
use yii\web\Cookie;

/**
 * Change Language Form
 *
 * @property string $identifier
 * @property string $url
 */
class LanguageSelectForm extends Model
{
    public $identifier;
    public $url;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['identifier', 'required'],

            [['identifier', 'url'], 'string'],

            [['identifier'], 'exist',
                'targetClass' => I18nLanguage::class,
                'targetAttribute' => ['identifier' => 'identifier'],
                'filter' => ['status' => I18nLanguage::STATUS_ACTIVE]
            ],
        ];
    }


    public function getIdentifier()
    {
        $cookies = Yii::$app->request->cookies;
        $identifier = $cookies->getValue('identifier');
        if ($identifier === null) {
            $identifier = Yii::$app->language;
            $cookiess = Yii::$app->response->cookies;
            $cookiess->add(new Cookie([
                'name' => 'identifier',
                'value' => $identifier,
            ]));
        }
        return $identifier;
    }


    public function setIdentifier()
    {
        $cookies = Yii::$app->request->cookies;
        $cookieIdentifier = $cookies->getValue('identifier');
        if ($this->identifier !== $cookieIdentifier) {
            $cookiess = Yii::$app->response->cookies;
            $cookiess->remove('identifier');
            $cookiess->add(new Cookie([
                'name' => 'identifier',
                'value' => $this->identifier,
            ]));
        }
    }

}
