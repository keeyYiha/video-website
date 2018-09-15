<?php

namespace backend\modules\content\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cont_actor".
 *
 * @property int $id
 * @property string $name
 * @property int $gender
 */
class Actor extends ActiveRecord
{

    public $imageFile;

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
            [['id', 'name', 'avatar', 'gender', 'updated_at', 'created_at'], 'required'],
            [['id', 'gender', 'updated_at', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['avatar'], 'string', 'max' => 256],
            [['id'], 'unique'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'mp4'],
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
            'imageFile' => 'Image File',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('/Users/shanyou_cyh/data/assets/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
