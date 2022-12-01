<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\JobApplication;
use backend\models\JobAplicationSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JobAplicationController implements the CRUD actions for JobApplication model.
 */
class JobApplicationController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all JobApplication models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JobAplicationSearch();
        $dataProvider = $searchModel->searchByUserId($this->request->queryParams,\Yii::$app->user->identity->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JobApplication model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new JobApplication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JobApplication();

        if ($this->request->isPost) {
            $model->user_id = $this->request->post()['user_id'];
            $model->job_id = $this->request->post()['job_id'];
            $model->status = 0;
            $model->validate();
            $model->save();
        }

        return $this->redirect('/home');
    }

    /**
     * Updates an existing JobApplication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        if ($this->request->isPost) {
            $model = $this->findModel($this->request->post()['id']);
            $model->status = $this->request->post()['status'];
            $model->validate();
            $model->save();
        }

        return $this->redirect('/home');
    }

//    /**
//     * Deletes an existing JobApplication model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param int $id ID
//     * @return \yii\web\Response
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the JobApplication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return JobApplication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JobApplication::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
