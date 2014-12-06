<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "description".
 *
 * @property integer $id
 * @property integer $point_id
 * @property Point $point
 * @property string $title
 * @property string $description
 * @property string $phone
 * @property string $email
 * @property string $photo
 * @property string $qrcode
 * @property string $hash
 */
class Description extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['point_id'], 'integer'],
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 255],
            [['photo'], 'string', 'max' => 255],
            [['qrcode'], 'string', 'max' => 255],
            [['hash'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'point_id' => 'Point ID',
            'title' => 'Title',
            'description' => 'Description',
            'phone' => 'Phone',
            'email' => 'E-mail',
            'photo' => 'Pets photo',
            'qrcode' => 'QR-code for this page',
            'hash' => 'Hash',
        ];
    }

    public function getPoint()
    {
        return $this->hasOne(Point::className(), ['id' => 'point_id']);
    }

}
