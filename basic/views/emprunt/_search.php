<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpruntSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprunt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'matMembre') ?>

    <?= $form->field($model, 'montant') ?>

    <?= $form->field($model, 'dateEmp') ?>

    <?= $form->field($model, 'delais') ?>

    <?php // echo $form->field($model, 'matExp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
