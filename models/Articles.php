<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property integer $article_id
 * @property string $title
 * @property string $article
 * @property integer $user_id
 * @property string $createAt
 * @property string $updateAt
 * @property string $usercomment
 *
 * @property Users $user
 * @property Comments[] $comments
 * @property Likes[] $likes
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'article', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['createAt', 'updateAt'], 'safe'],
            [['title'], 'string', 'max' => 40],
            [['article'], 'string', 'max' => 10000],
            [['usercomment'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'title' => 'Title',
            'article' => 'Article',
            'user_id' => 'User ID',
            'createAt' => 'Create At',
            'updateAt' => 'Update At',
            'usercomment' => 'Usercomment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['article_id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Likes::className(), ['article_id' => 'article_id']);
    }
}
