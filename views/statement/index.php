<?php


use app\models\Statement;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StatementSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'address',
            'problem',

            // вывод статуса вместо его айди

            ['attribute' => 'id_status',
            'value' => function($model) {
                return 
                $model->status->name_status;
            },
            ],


            // вывод фамилии пользователя вместо его айди


            ['attribute' => 'id_user',
            'value' => function($model) {
                return 
                $model->user->surname;
            },
            ],


            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Statement $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
