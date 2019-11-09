<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fondsociale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fondsociale-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matMembre')->textInput(['maxlength' => true])->label("Matricule Membre") ?>

        <?php
                                   $value = Yii::$app->db->createCommand("SELECT delaisFs from parametres")->queryScalar();
                                   echo '<span style="visibility:hidden;" id="span2">'.$value.'</span>' ?>
    <?= $form->field($model, 'montant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date','id'=>'input3']) ?>

    <?= $form->field($model, 'delais')->textInput(['type' => 'date', 'id'=>'input4']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
