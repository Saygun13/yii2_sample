<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Users;
use app\models\Articles;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'comment_id',
            'user_id',
            'comment',
            'article_id',
            'createAt',
            // 'updateAt',
            // 'usercomment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
