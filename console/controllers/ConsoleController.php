<?php

namespace app\console\controllers;

use yii\console\Controller;

/**
 * Console Controller
 */
class ConsoleController extends Controller
{

    public function actionPrint()
    {
        echo print_r($_SERVER, true);
    }
}