<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprunt-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
                               $value = Yii::$app->db->createCommand("SELECT delaisRem from parametres")->queryScalar();
                               echo '<span style="visibility:hidden;" id="span1">'.$value.'</span>' ?>

    <?= $form->field($model, 'matMembre')->textInput(['maxlength' => true])->label("Matricule Membre") ?>

    <?= $form->field($model, 'montant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateEmp')->textInput(['type' => 'date','id'=>'input1'])->label("Date d'emprunt") ?>

    <?= $form->field($model, 'delais')->textInput(['type' => 'date','id'=>'input2']) ?>

    <?= $form->field($model, 'matExp')->textInput(['maxlength' => true, 'value' => $_SESSION['user']['mat'] ])->label("Matricule d'Expediteur") ?>






    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
