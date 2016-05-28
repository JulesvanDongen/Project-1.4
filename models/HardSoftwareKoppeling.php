<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hard_software_koppeling".
 *
 * @property integer $Hardware_ID
 * @property integer $Software_ID
 *
 * @property Hardware $hardware
 * @property Software $software
 */
class HardSoftwareKoppeling extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hard_software_koppeling';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Hardware_ID', 'Software_ID'], 'required'],
            [['Hardware_ID', 'Software_ID'], 'integer'],
            [['Hardware_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Hardware::className(), 'targetAttribute' => ['Hardware_ID' => 'Hardware_ID']],
            [['Software_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Software::className(), 'targetAttribute' => ['Software_ID' => 'Software_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Hardware_ID' => 'Hardware  ID',
            'Software_ID' => 'Software  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHardware()
    {
        return $this->hasOne(Hardware::className(), ['Hardware_ID' => 'Hardware_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftware()
    {
        return $this->hasOne(Software::className(), ['Software_ID' => 'Software_ID']);
    }
}
