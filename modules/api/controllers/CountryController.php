<?php

namespace app\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends ActiveController
{
    public $modelClass = 'app\models\Country';

}