<?php

namespace app\controllers;

use Yii;
use app\models\Rembourse;
use app\models\RembourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Query;
/**
 * RembourseController implements the CRUD actions for Rembourse model.
 */
class RembourseController extends Controller
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
     * Lists all Rembourse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RembourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rembourse model.
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
     * Creates a new Rembourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rembourse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->runAction('updatesave');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdatesave(){

        /** This part of the code will be used to calculate and redistribute the amount of money borrowed from individuals */
   
        $maxID = Yii::$app->db->createCommand('SELECT max(id) as "max" from rembourse')->queryScalar();
        $montantQ = Yii::$app->db->createCommand('SELECT idEmp,montant from rembourse where id = :maxID',['maxID' => $maxID])->queryAll();
        
        $maxEmpID = Yii::$app->db->createCommand('SELECT max(id) as "maxEmpID" from emprunt')->queryScalar();
        $montantEmpQ = Yii::$app->db->createCommand('SELECT id,montant from emprunt where id = :maxEmpID',['maxEmpID' => $maxEmpID])->queryAll();

        
        // USEFUL CONSTANTS
        $int = Yii::$app->db->createCommand('SELECT sum(montant) from rembourse where idEmp = :idEmp',['idEmp' => $montantQ[0]['idEmp']])->queryScalar();
        $interestRate = Yii::$app->db->createCommand('SELECT pourInteret as "intRate" from parametres')->queryScalar();
        $delais = Yii::$app->db->createCommand('SELECT delaisRem from parametres')->queryScalar();
        $interest = $int - $montantEmpQ[0]['montant'];
        $pourFine = 5;



        

        $temp =  (($interestRate/100)*$montantEmpQ[0]['montant']);


        $month = Yii::$app->db->createCommand('SELECT month(T.date)-month(T.dateEmp) as "monthDiff" from (SELECT dateEmp,date,idEmp FROM emprunt CROSS JOIN rembourse where emprunt.id = rembourse.idEmp) T WHERE T.idEmp = :idEmp',['idEmp' => $montantQ[0]['idEmp']])->queryAll();
        $months = $month[0]['monthDiff'];

        if($months <= $delais){

            switch ($months) {
                case 0:
                    $temp = $temp;
                    break;
                case 1:
                    $temp = $temp;
                    break;

                case 2:
                    $temp = 2 * $temp;
                    break;

                case 3:
                    $temp = 3 * $temp;
                    break;
                default:
                    $temp = $temp;
                    break;
            }
        }else{
            $interestRate = $interestRate + $pourFine;
            $temp =  (($interestRate/100)*$montantEmpQ[0]['montant']);
            $months = 
            $temp = $months*$temp; 
        }

        //echo '<script> alert("'. $interest.' '.$int.' and '.$temp.'and mon = '.$months.'"); </script>';


        /** Here we are going to extraact percentages and calculate remboursement */ 
        $pour = Yii::$app->db->createCommand('SELECT matMembre, pourcentage from interets where idEmp = :id',['id' => $montantQ[0]['idEmp']])->queryAll();

        if($interest <= $temp){
            echo '<script> alert("I was executed"); </script>';
            for ($i=0; $i < sizeof($pour); $i++) { 
                $remb[$i] = ($pour[$i]['pourcentage']/100)*$montantQ[0]['montant'];    
                Yii::$app->db->createCommand('INSERT INTO epargne(matMembre,montant,date,matPercept) values (:mat,:mont,now(),:matP)',['mat' => $pour[$i]['matMembre'], 'mont' => $remb[$i], 'matP' =>  $_SESSION['user']['mat']])->execute();
                if($interest > 0){
                     Yii::$app->db->createCommand('UPDATE interets SET montantInt = :amount WHERE idEmp = :id AND matMembre = :mat', ['amount' => (int) (($pour[$i]['pourcentage']*$interest)/100), 'id' => $montantQ[0]['idEmp'], 'mat' => $pour[$i]['matMembre']])->execute();
                }
            }
            echo '<script> alert("I was executed"); </script>';
        }else{
             echo '<script>  alert("Montant emprunter est deja paye</br>
            Mais le rembourse a ete enregistre. Noublie pas de le supprimer"); </script>';
        }

        
       
    }

    /**
     * Updates an existing Rembourse model.
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

    /**
     * Deletes an existing Rembourse model.
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
     * Finds the Rembourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Rembourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rembourse::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
