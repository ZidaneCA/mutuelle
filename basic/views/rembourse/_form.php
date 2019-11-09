<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rembourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rembourse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEmp')->textInput(['maxlength' => true])->label("ID d'emprunt") ?>

    <?= $form->field($model, 'montant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'matPercept')->textInput(['maxlength' => true, 'value' => $_SESSION['user']['mat'] ])->label("Matricule d'Expediteur") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
