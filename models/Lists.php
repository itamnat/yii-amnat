<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $fullname
 * @property string $position
 * @property int $dep_code
 * @property string|null $email
 * @property string|null $tel
 * @property string|null $fax
 * @property string|null $tel_moi
 * @property string|null $mobile_fix
 * @property string|null $mobile_phone
 * @property string|null $image
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Lists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'position', 'dep_code'], 'required'],
            [['dep_code', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['fullname', 'position', 'email', 'tel', 'fax', 'tel_moi', 'mobile_fix', 'mobile_phone', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'position' => 'Position',
            'dep_code' => 'Dep Code',
            'email' => 'Email',
            'tel' => 'Tel',
            'fax' => 'Fax',
            'tel_moi' => 'Tel Moi',
            'mobile_fix' => 'Mobile Fix',
            'mobile_phone' => 'Mobile Phone',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
