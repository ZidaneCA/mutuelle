<?php

namespace app\controllers;

use Yii;
use app\models\Emprunt;
use app\models\EmpruntSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpruntController implements the CRUD actions for Emprunt model.
 */
class EmpruntController extends Controller
{
    public $layout = "adminLayout";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emprunt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpruntSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emprunt model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Emprunt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Emprunt();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->runAction('updatesave');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Emprunt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionUpdatesave(){

        /** This part of the code will be used to calculate and redistribute the amount of money borrowed from individuals */
        $amount = Yii::$app->db->createCommand('SELECT matMembre,SUM(montant) as "amount" from epargne GROUP by matMembre')->queryAll();
        $Tamount =  Yii::$app->db->createCommand('SELECT SUM(montant) as "Tamount" from epargne')->queryScalar();

        //echo '<script> alert(" anount is '.$Tamount.' "); </script>';

        $maxEmpID = Yii::$app->db->createCommand('SELECT max(id) as "maxEmpID" from emprunt')->queryScalar();
        $montantEmpQ = Yii::$app->db->createCommand('SELECT id,montant from emprunt where id = :maxEmpID',['maxEmpID' => $maxEmpID])->queryAll();

        for ($i=0; $i < sizeof($amount); $i++) { 
            $pourcen[$i] = ($amount[$i]['amount'] / $Tamount);
            $montantEmp[$i] = $pourcen[$i] * $montantEmpQ[0]['montant'];
            $montantEmp[$i] = (int) (-1*$montantEmp[$i]);
            $pourcen[$i] = 100*$pourcen[$i];
            /** TODO We then have to store the percentages in the interets table and montantEmp in the epargne table */

            Yii::$app->db->createCommand('INSERT INTO epargne(matMembre,montant,date,matPercept) values (:mat,:mont,now(),:matP)',['mat' => $amount[$i]['matMembre'], 'mont' => $montantEmp[$i], 'matP' =>  $_SESSION['user']['mat']])->execute();
            Yii::$app->db->createCommand('INSERT INTO interets(idEmp,matMembre,pourcentage,montantInt) values (:idEmp,:matMem,:pour,0)',['idEmp' => $maxEmpID, 'matMem' => $amount[$i]['matMembre'], 'pour' => $pourcen[$i]])->execute();
        }
    }
    /**
     * Deletes an existing Emprunt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emprunt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Emprunt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emprunt::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
