<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Membre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membre-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/formdata']]); ?>

    <?= $form->field($model, 'mat')->textInput(['maxlength' => true])->label('Matricule') ?>

    <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prenom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'admin')->dropDownList([ '0' => 'No', '1' => 'Yes', ], ['prompt' => ''])?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adresse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domicile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput(['value' => 'image.jpg'])->label("Photo") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
