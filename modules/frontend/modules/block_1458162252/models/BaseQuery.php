<?php

namespace app\modules\frontend\modules\block_1458162252\models;

/**
 * This is the ActiveQuery class for [[Base]].
 *
 * @see Base
 */
class BaseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Base[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Base|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}