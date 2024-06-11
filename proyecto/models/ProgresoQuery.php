<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Programas]].
 *
 * @see Programas
 */
class ProgresoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Programas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Programas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
