<?php

namespace frontend\controllers;

use Yii;
use common\models\SummaryOnSite;
use common\models\ComputerVih;
use common\models\Software;
use frontend\models\SummaryOnSiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * SummaryOnSiteController implements the CRUD actions for SummaryOnSite model.
 */
class SummaryOnSiteController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SummaryOnSite models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SummaryOnSiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SummaryOnSite model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SummaryOnSite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SummaryOnSite();
        $computer = ComputerVih::find();
        $software = new Software();
        $get_software_id = Yii::$app->getRequest()->get('s_id');


        if ($model->load(Yii::$app->request->post()) && isset($_POST['SummaryOnSite'])) {
            $att_computer = Json::decode($model->computer_id);
            //  print_r($att_computer);
            //  print_r($_POST['SummaryOnSite']);
            for ($i = 0; $i < count($att_computer); $i++) {
                $model->summary_id = null;
                $model->isNewRecord = true;
                $model->software_id = $get_software_id;
                $model->computer_id = $att_computer[$i];
                if ($model->save()) {
                    echo "if save";
                    //  exit();
                    Yii::$app->session->setFlash('green-' . $i, '<i class="fa fa-info-circle"></i> <b>Fees Category:</b> ' . $_POST['SummaryOnSite']['computer_id'] . ' for <b>Batch: </b>' .ComputerVih::findOne($att_computer[$i])->computer_name.' is created successfully');
                } else {
                    echo "else save";
                    Yii::$app->session->setFlash('red-' . $i, '<i class="fa fa-warning"></i> The combination of <b>Fees Category:</b> ' . $_POST['SummaryOnSite']['computer_id'] . ' has already been taken.'.ComputerVih::findOne($att_computer[$i])->computer_name.' is created successfully');
                }
            }

            return $this->redirect(['index', 'id' => $model->summary_id]);
        } else {
            //echo "12";
            return $this->render('create', [
                        'model' => $model,
                        'computer' => $computer,
                        'software' => $software,
            ]);
        }
    }

    /**
     * Updates an existing SummaryOnSite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->summary_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SummaryOnSite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SummaryOnSite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SummaryOnSite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SummaryOnSite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
