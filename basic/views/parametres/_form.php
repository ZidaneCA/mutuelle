<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parametres */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametres-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fondsociale')->textInput(['maxlength' => true])->label("Fond Social") ?>

    <?= $form->field($model, 'pourInteret')->textInput(['maxlength' => true])->label("Pourcentage d'interet par mois") ?>

    <?= $form->field($model, 'delaisRem')->textInput()->label('Delais de remboursement en mois') ?>

    <?= $form->field($model, 'delaisFS')->textInput()->label('Delais de fond sociale en mois') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
