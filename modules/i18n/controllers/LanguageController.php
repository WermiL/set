<?php

namespace app\modules\i18n\controllers;

use app\layouts\controller\LayoutController;
use app\modules\i18n\models\forms\LanguageSelectForm;
use Yii;
use yii\filters\VerbFilter;

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
        $_languageSelectForm->language = Yii::$app->request->post('language');
        $_languageSelectForm->url = Yii::$app->request->post('url');
        if ($_languageSelectForm->validate()) {
            {
                $_languageSelectForm->setLanguage();
                $this->redirect($_languageSelectForm->url);
            }
        }
    }
}
