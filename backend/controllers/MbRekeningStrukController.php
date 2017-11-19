<?php

namespace backend\controllers;

use Yii;
use backend\models\MbRekeningStruk;
use backend\models\MbRekeningStrukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MbRekeningStrukController implements the CRUD actions for MbRekeningStruk model.
 */
class MbRekeningStrukController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            
            'access'=>[
              'class'=> AccessControl::className(),
              'only'=>  ['create','update','delete','index'],
              'rules'=> [
                  [
                      'allow'=>true,
                      'roles'=>['@']
                  ],
              ]
            ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MbRekeningStruk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MbRekeningStrukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MbRekeningStruk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MbRekeningStruk();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Data berhasil disimpan');
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MbRekeningStruk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Data berhasil disimpan');
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MbRekeningStruk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($model->delete()) {
                $transaction->commit();
                Yii::$app->session->setFlash('success','Data berhasil dihapus');
            } else {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak berhasil dihapus');
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error','Rollback transaction, Data tidak berhasil dihapus');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the MbRekeningStruk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MbRekeningStruk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MbRekeningStruk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
