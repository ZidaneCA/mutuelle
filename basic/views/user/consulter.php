<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
//use Yii;

$this->title = 'Consulter';
$this->params['breadcrumbs'][] = $this->title;


	// $connection = \Yii::$app->getDb();
	// $query = "SELECT * FROM membre";
	// $command = $connection->createCommand($query);
	// $result = $command->queryAll();
	// foreach ($result as $row) {
	// 	echo $row['nom'];
	// }


	/** This is to get the savings of the user */
	$count = Yii::$app->db->createCommand('SELECT count(*) FROM epargne WHERE matMembre=:matricule', [':matricule' => $_SESSION['user']['mat']])->queryScalar();

	$epargneProvider = new SqlDataProvider([
		'sql' => 'SELECT * FROM epargne WHERE matMembre=:matricule',
		'params' => [':matricule' => $_SESSION['user']['mat']],
		'totalCount' => $count,
		'pagination' => [
			'pageSize' => 10,
		],
	]);

	/** This is to get the borrowed transactions of the user */
	$count = Yii::$app->db->createCommand('SELECT count(*) FROM emprunt WHERE matMembre=:matricule', [':matricule' => $_SESSION['user']['mat']])->queryScalar();

	$empruntProvider = new SqlDataProvider([
		'sql' => 'SELECT * FROM emprunt WHERE matMembre=:matricule',
		'params' => [':matricule' => $_SESSION['user']['mat']],
		'totalCount' => $count,
		'pagination' => [
			'pageSize' => 10,
		],
	]);


	/** This is to get the interest of the user */
	$count = Yii::$app->db->createCommand('SELECT count(*) FROM interets WHERE matMembre=:matricule', [':matricule' => $_SESSION['user']['mat']])->queryScalar();


	$interetProvider = new SqlDataProvider([
		'sql' => 'SELECT * FROM interets WHERE matMembre=:matricule',
		'params' => [':matricule' => $_SESSION['user']['mat']],
		'totalCount' => $count,
		'pagination' => [
			'pageSize' => 10,
		],
	]);

	// This count is very important and useful when the query is a little complex
	/* This is to get the repayments of a user */
	$count = Yii::$app->db->createCommand('SELECT count(*) FROM rembourse JOIN emprunt WHERE emprunt.matMembre=:matricule', [':matricule' => $_SESSION['user']['mat']])->queryScalar();

	$remboursementProvider = new SqlDataProvider([
		'sql' => 'SELECT * FROM emprunt JOIN rembourse ON (emprunt.id = rembourse.idEmp) WHERE emprunt.matMembre=:matricule',
		'params' => [':matricule' => $_SESSION['user']['mat']],
		'totalCount' => $count,
		'pagination' => [
			'pageSize' => 10,
		],
	]);

	/// Declare and associative array $age = array("Peter" => "35", "jonh" => "34");



?>


<div class="admin-borrow">


  	<div class="mainBox">
	    <div class="membre-index">

	      	<h1 class="blue"><?= 'Mes Epargnes' ?></h1>
		    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		    <?php
		    	echo GridView::widget([
        			'dataProvider' => $epargneProvider,
        			'columns' => [
			            ['class' => 'yii\grid\SerialColumn'],

			            'id',
			            'montant',
			            'date',
			            ['label' => 'Matricule Percepteur', 'attribute' => 'matPercept',],
			        ],
    			]) ;
		     	$amount = Yii::$app->db->createCommand('SELECT SUM(montant) FROM epargne WHERE matMembre = :mat' , ['mat' => $_SESSION['user']['mat']])->queryScalar();
		     	echo $amount == "" ? " " : "Epargnes total = ".$amount ;
		     ?>


		</div>
	</div>

	<div class="mainBox">
	    <div class="membre-index">

	      	<h1 class="blue"><?= 'Mes Emprunts' ?></h1>
		    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

		    <?php
		    	echo GridView::widget([
        			'dataProvider' => $empruntProvider,
        			'columns' => [
			            ['class' => 'yii\grid\SerialColumn'],

			            'id',
			            'montant',
			            ['label' => 'Date Emprunt', 'attribute' => 'dateEmp',],
			            ['label' => 'Date Limit', 'attribute' => 'delais',],
			            ['label' => 'Matricule Expediteur', 'attribute' => 'matExp',],
			        ],
    			]) ;
    			$amount = Yii::$app->db->createCommand('SELECT SUM(montant) FROM emprunt WHERE matMembre = :mat' , ['mat' => $_SESSION['user']['mat']])->queryScalar();
			     	echo $amount == "" ? " " : "Emprunts total = ".$amount ;
		     ?>

		</div>
	</div>

	<div class="mainBox">
	    <div class="membre-index">

	      	<h1 class="blue"><?= 'Mes Interets' ?></h1>
		    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



		    <?php
		    	echo GridView::widget([
        			'dataProvider' => $interetProvider,
        			'columns' => [
			            ['class' => 'yii\grid\SerialColumn'],
			            ['label'=>'ID Emprunt','attribute'=>'idEmp'],
			            'pourcentage',
			            ['label'=>'Montant d\'interet', 'attribute' => 'montantInt'],
			        ],
    			]) ;
    			$amount = Yii::$app->db->createCommand('SELECT SUM(montantInt) FROM interets WHERE matMembre = :mat' , ['mat' => $_SESSION['user']['mat']])->queryScalar();
		     	echo $amount == "" ? " " : "Interets total = ".$amount ;
		     ?>

		</div>
	</div>

	<div class="mainBox">
	    <div class="membre-index">

	      	<h1 class="blue"><?= 'Mes Remboursement' ?></h1>
		    <?php
		    	//echo var_dump($remboursementProvider->getModels());
		    	echo GridView::widget([
        			'dataProvider' => $remboursementProvider,
        			'columns' => [
	            		['class' => 'yii\grid\SerialColumn'],

	            		'id',
	           			['label' => 'ID d\'emprunt', 'attribute' => 'idEmp'],
	            		'montant',
	            		'date',
	             		['label' => 'Matricule Percepteur', 'attribute' => 'matPercept'],
        			],
    			]) ;
		     ?>

		</div>
	</div>

</div>
