<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Connexion';
?>
<div class="site-login">
<div class="main">
    <div class="center">
        <h1 class="blue"><?= Html::encode($this->title) ?></h1>
        <p class="blue" id="paraLog">Remplisez le formulaire suivant s'il vous plait pour vous connecter:</p>
    </div>

    <div class="row">
            <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-2\">{label} </div>\n<div class=\"col-lg-8 col-md-8\">{input}</div>\n<div class=\"col-lg-8 col-lg-offset-2 \">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>



        <div class="form-group">
            <div class="col-lg-offset-8 col-lg-4">
                <?= Html::submitButton('Se Connecter', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
</div>

</div>
