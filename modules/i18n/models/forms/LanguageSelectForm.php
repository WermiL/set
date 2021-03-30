<?php

namespace app\modules\i18n\models\forms;

use Yii;
use yii\base\Model;
use yii\web\Cookie;

/**
 * Change Language Form
 *
 * @property string $language
 * @property string $url
 */
class LanguageSelectForm extends Model
{
    public $language;
    public $url;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['language', 'required'],

            [['language','url'], 'string'],

        ];
    }


    public static function getLanguage()
    {
        $cookies = Yii::$app->request->cookies;
        $language = $cookies->getValue('language');
        if ($language === null) {
            $language = Yii::$app->language;
            $cookiess = Yii::$app->response->cookies;
            $cookiess->add(new Cookie([
                'name' => 'language',
                'value' => $language,
            ]));
        }
        return $language;
    }


    public function setLanguage()
    {
        $cookies = Yii::$app->request->cookies;
        $cookieLanguage = $cookies->getValue('language');
        if ($this->language !== $cookieLanguage) {
            $cookiess = Yii::$app->response->cookies;
            $cookiess->remove('language');
            $cookiess->add(new Cookie([
                'name' => 'language',
                'value' => $this->language,
            ]));
        }
    }

}
