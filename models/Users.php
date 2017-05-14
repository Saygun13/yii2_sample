<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property integer $user_id
 * @property string $email
 * @property string $userpassword
 * @property string $createAt
 * @property string $updateAt
 * @property string $usercomment
 *
 * @property Articles[] $articles
 * @property Comments[] $comments
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'userpassword'], 'required'],
            [['createAt', 'updateAt'], 'safe'],
            [['email', 'userpassword'], 'string', 'max' => 20],
            [['usercomment'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'email' => 'Email',
            'userpassword' => 'Userpassword',
            'createAt' => 'Create At',
            'updateAt' => 'Update At',
            'usercomment' => 'Usercomment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['user_id' => 'user_id']);
    }
}
