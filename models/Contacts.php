<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

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
class Contacts extends \yii\db\ActiveRecord
{
    public $upload_foler = 'uploads';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
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
            [
                ['image'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ],
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

    public function getDepartment()
    {
        return $this->hasMany(Department::className(), ['dep_id' => 'dep_code']);
    }

    public  function getHospital()
    {
        return @$this->hasOne(Department::className(), ['dep_id' => 'dep_code']);
    }


    public function upload($model, $attribute)
    {
        $image  = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $image !== null) {

            $fileName = md5($image->baseName . time()) . '.' . $image->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if ($image->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl()
    {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer()
    {
        return empty($this->image) ? Yii::getAlias('@web') . '/img/none.png' : $this->getUploadUrl() . $this->image;
    }
}
