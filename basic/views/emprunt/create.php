<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */

$this->title = 'Emprunter';
$this->params['breadcrumbs'][] = ['label' => 'Emprunts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
	<div class="emprunt-create">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>
    <center>
    	<h3>
    		<?= "Montant dans la caisse ".Yii::$app->db->createCommand('SELECT SUM(montant) as "Tamount" from epargne')->queryScalar()." FCFA"; ?>    			
		</h3>
	</center>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
