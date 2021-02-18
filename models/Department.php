<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $dep_id รหัส
 * @property string $code รหัสหน่วยงาน
 * @property string $department กรม
 * @property int $ministry_id ภายใต้กระทรวง
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dep_id', 'code', 'department', 'ministry_id'], 'required'],
            [['dep_id', 'ministry_id'], 'integer'],
            [['code'], 'string'],
            [['department'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dep_id' => 'รหัส',
            'code' => 'รหัสหน่วยงาน',
            'department' => 'กรม',
            'ministry_id' => 'ภายใต้กระทรวง',
        ];
    }
}
