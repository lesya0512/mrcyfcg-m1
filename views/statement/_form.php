<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Statement $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="statement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'problem')->textInput(['maxlength' => true]) ?>
<!-- 
    <?= $form->field($model, 'id_status')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Status::find()->all(),'id','name_status')) ?>

    <?= $form->field($model, 'id_user')->textInput() ?> -->
    
<!-- ВЫПАДАЮЩИЙ СПИСОК -->

    <?php if(Yii::$app->user->identity->username == 'copp')
    echo $form->field($model, 'id_status')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Status::find()->all(),'id','name_status')) ?>

    <div class="form-group">
        <?= Html::submitButton('сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
