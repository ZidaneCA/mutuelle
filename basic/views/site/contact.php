<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-contact">
    <div class="center">
        <h1 class="blue"><?= Html::encode($this->title) ?>

        </h1>

        <p class="blue">
            Si vous voulez nous rejoindre contactez nous.
            Merci.
        </p>

    </div>

    <div class="site-contact">



        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
Merci de nous contacter. Nous vous répondrons dans les meilleurs délais.
            </div>

            <p>
              Notez que si vous activez le débogueur Yii, vous devriez pouvoir
                pour afficher le message électronique sur le panneau de messagerie du débogueur.
                <?php if (Yii::$app->mailer->useFileTransport): ?>
                    Because the application is in development mode, the email is not sent but saved as
                    a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                    Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                    application component to be false to enable email sending.
                <?php endif; ?>
            </p>

        <?php else: ?>


            <div class="row">

                <div class="col-lg-3"> </div>
                <div class="col-lg-6">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'subject') ?>

                        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group col-lg-offset-10">
                            <?= Html::submitButton('Soumettre', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
                <div class="col-lg-3"> </div>
            </div>

        <?php endif; ?>
    </div>

</div>
