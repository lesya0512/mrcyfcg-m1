<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statement".
 *
 * @property int $id
 * @property string $address
 * @property string $problem
 * @property int $id_status
 * @property int $id_user
 *
 * @property Status $status
 */
class Statement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'problem', 'id_status', 'id_user'], 'required'],
            [['id_status', 'id_user'], 'integer'],
            [['address', 'problem'], 'string', 'max' => 255],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['id_status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Адрес дома',
            'problem' => 'Описание проблемы',
            'id_status' => 'Статус',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'id_status']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
