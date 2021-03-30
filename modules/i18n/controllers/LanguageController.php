<?php

namespace app\modules\i18n\controllers;

use app\layouts\controller\LayoutController;
use app\modules\i18n\models\forms\LanguageSelectForm;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * Site controller
 */
class LanguageController extends LayoutController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Set Language
     */
    public function actionIndex()
    {
        $_languageSelectForm = new LanguageSelectForm();
        $_languageSelectForm->identifier = (string)Yii::$app->request->post('identifier');
        $_languageSelectForm->url = (string)Yii::$app->request->post('url');
        if ($_languageSelectForm->validate()) {
            {
                $_languageSelectForm->setIdentifier();
                return $this->redirect($_languageSelectForm->url);
            }
        }
        return $this->redirect(Url::to('/'));
    }
}
