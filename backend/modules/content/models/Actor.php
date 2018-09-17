<?php

namespace backend\modules\content\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "cont_actor".
 *
 * @property int $id
 * @property string $name
 * @property string $avatar
 * @property int $gender
 * @property int $created_at
 * @property int $updated_at
 */
class Actor extends ActiveRecord
{

    public $avatarFile;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    # 创建之前
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    # 修改之前
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cont_actor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'gender'], 'required'],
            [['id', 'gender'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['avatar'], 'string', 'max' => 256],
            [['id'], 'unique'],
            [['avatarFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'avatar' => 'Avatar',
            'gender' => 'Gender',
            'avatarFile' => 'Video File',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        if ($attributeNames === null) {
            $attributeNames = $this->activeAttributes();
        }
        $key = array_search("avatarFile", $attributeNames);
        if ($key) {
            array_splice($attributeNames, $key, 1);
        }

        return parent::validate($attributeNames, $clearErrors);
    }

    public function fileValidate($attributeNames)
    {
        return parent::validate($attributeNames);
    }
    
    public function upload()
    {
        if ($this->fileValidate(['avatarFile'])) {
            $url = 'static/assets/content/avatar/' . $this->avatarFile->baseName . '.' . $this->avatarFile->extension;
            $this->avatarFile->saveAs($url);
            $this->avatar = $url;
            return true;
        } else {
            return false;
        }
    }
}
