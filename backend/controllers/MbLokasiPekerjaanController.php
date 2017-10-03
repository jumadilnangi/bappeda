<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\MbLokasiPekerjaan;
use backend\models\MbLokasiPekerjaanSearch;

use backend\models\customs\LokasiPekerjaan;
/**
 * MbLokasiPekerjaanController implements the CRUD actions for MbLokasiPekerjaan model.
 */
class MbLokasiPekerjaanController extends Controller
{
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
     * Lists all MbLokasiPekerjaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MbLokasiPekerjaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MbLokasiPekerjaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LokasiPekerjaan();

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
     * Updates an existing MbLokasiPekerjaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mb_lokasi_pekerjaan_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
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
     * Deletes an existing MbLokasiPekerjaan model.
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
     * Finds the MbLokasiPekerjaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MbLokasiPekerjaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MbLokasiPekerjaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
