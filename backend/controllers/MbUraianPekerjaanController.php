<?php

namespace backend\controllers;

use Yii;
//use backend\models\MbUraianPekerjaan;
//use backend\models\MbUraianPekerjaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\components\helpers\ActionEditableColumn;

use backend\models\customs\UraianPekerjaan;
use backend\models\customs\search\UraianPekerjaanSearch;
use backend\models\customs\LokasiPekerjaan;
use backend\models\customs\UraianPekerjaanHasStatus;

use backend\models\MbLokasiPekerjaan;
/**
 * MbUraianPekerjaanController implements the CRUD actions for MbUraianPekerjaan model.
 */
class MbUraianPekerjaanController extends Controller
{
    public function actions()
    {
        //return array_replace_recursive(parent::actions(), [
        return [
            'editmhs' => [
                'class' => ActionEditableColumn::className(),
                //'modelClass' => TmpMhs::className(),
            ]
        ];
    }

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
     * Lists all MbUraianPekerjaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UraianPekerjaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->session[Yii::$app->components['session']['name']]['skpd_id']!='') {
            $dataProvider->query->andFilterWhere([
                'mb_skpd.mb_skpd_id' => Yii::$app->session[Yii::$app->components['session']['name']]['skpd_id']
                //'mb_skpd.mb_skpd_id' => Yii::$app->session[Yii::$app->components['session']['name']]['skpd_id']
            ]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MbUraianPekerjaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_renja='')
    {
        $model = new UraianPekerjaan();
        $modelLokasi = new LokasiPekerjaan();
        $modelStatus = new UraianPekerjaanHasStatus();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->mb_uraian_pekerjaan_id]);
        //} 
        if ($model->load(Yii::$app->request->post()) && $modelLokasi->load(Yii::$app->request->post()) && $modelStatus->load(Yii::$app->request->post()) ) {
        //if ($model->load(Yii::$app->request->post()) && $modelStatus->load(Yii::$app->request->post()) ) {
            //var_dump($model->save());
            //exit();
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    $modelLokasi->mb_uraian_pekerjaan_id = $model->mb_uraian_pekerjaan_id;
                    //$modelLokasi->mb_kelurahan_desa_id = $modelLokasi->mb_kelurahan_desa_id;
                    $modelStatus->mb_uraian_pekerjaan_id = $model->mb_uraian_pekerjaan_id;
                    if ($modelLokasi->save() && $modelStatus->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success','Data berhasil disimpan');
                    } else {
                        //var_dump($modelLokasi->getErrors());
                        //var_dump($modelStatus->getErrors());
                        //exit();
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('error','Terjadi kesalahan, Data lokasi, data status tidak bisa disimpan');
                    }
                    return $this->redirect(['index']);
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                    return $this->redirect(['index']);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
                return $this->redirect(['index']);
            }
            //return $this->redirect(['view', 'id' => $model->mb_skpd_has_rekening_rincian_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelStatus' => $modelStatus,
                'modelLokasi' => $modelLokasi,
                'id_renja' => $id_renja
            ]);
        }
    }

    /**
     * Updates an existing MbUraianPekerjaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$modelLokasi = LokasiPekerjaan::findOne(['mb_uraian_pekerjaan_id' => $model->mb_uraian_pekerjaan_id]);
        //$modelStatus = UraianPekerjaanHasStatus::findOne(['mb_uraian_pekerjaan_id' => $model->mb_uraian_pekerjaan_id]);
        $modelLokasi = $this->findModelLokasi($id);
        $modelStatus = $this->findModelStatus($id);
        if ($model->load(Yii::$app->request->post()) && $modelLokasi->load(Yii::$app->request->post()) && $modelStatus->load(Yii::$app->request->post()) ) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save(false)) {
                    $modelLokasi->mb_uraian_pekerjaan_id = $model->mb_uraian_pekerjaan_id;
                    $modelStatus->mb_uraian_pekerjaan_id = $model->mb_uraian_pekerjaan_id;
                    if ($modelLokasi->save() && $modelStatus->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success','Data berhasil disimpan');
                    } else {
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                        return $this->redirect(['index']);
                    }
                    return $this->redirect(['index']);
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                    return $this->redirect(['index']);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
                return $this->redirect(['index']);
            }
            //return $this->redirect(['view', 'id' => $model->mb_skpd_has_rekening_rincian_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelStatus' => $modelStatus,
                'modelLokasi' => $modelLokasi,
                'id_renja' => $id
            ]);
        }
    }

    /**
     * Deletes an existing MbUraianPekerjaan model.
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

    public function actionUraiandetail()
    {
        $id = Yii::$app->request->post('expandRowKey');
        //$id = 1;
        $model = $this->findModel($id);

        return $this->renderPartial('_detailuraian', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the MbUraianPekerjaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MbUraianPekerjaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UraianPekerjaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelStatus($id)
    {
        if (($model = UraianPekerjaanHasStatus::findOne(['mb_uraian_pekerjaan_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
            //return '';
        }
    }

    protected function findModelLokasi($id)
    {
        if (($model = MbLokasiPekerjaan::findOne(['mb_uraian_pekerjaan_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
            //return '';
        }
    }
}
