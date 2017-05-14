<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%comments}}".
 *
 * @property integer $comment_id
 * @property integer $user_id
 * @property string $comment
 * @property integer $article_id
 * @property string $createAt
 * @property string $updateAt
 * @property string $usercomment
 *
 * @property Articles $article
 * @property Users $user
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'comment', 'article_id'], 'required'],
            [['user_id', 'article_id'], 'integer'],
            [['createAt', 'updateAt'], 'safe'],
            [['comment', 'usercomment'], 'string', 'max' => 500],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['article_id' => 'article_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'article_id' => 'Article ID',
            'createAt' => 'Create At',
            'updateAt' => 'Update At',
            'usercomment' => 'Usercomment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['article_id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }
}
