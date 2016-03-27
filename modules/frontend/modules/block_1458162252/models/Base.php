<?php

namespace app\modules\frontend\modules\block_1458162252\models;

use Yii;

/**
 * This is the model class for table "block_1458162252".
 *
 * @property integer $id
 * @property string $name
 * @property string $message
 * @property string $outlet_1
 */
class Base extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'block_1458162252';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'message', 'outlet_1'], 'string', 'max' => 1200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'message' => Yii::t('app', 'Message'),
            'outlet_1' => Yii::t('app', 'Outlet 1'),
        ];
    }

    /**
     * @inheritdoc
     * @return BaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BaseQuery(get_called_class());
    }
}
