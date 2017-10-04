<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

use backend\models\MbRenja;
use backend\models\MbRenjaSearch;
use backend\models\customs\Renja;
use backend\models\customs\Urusan;
use backend\models\customs\UrusanHasSkpd;
use backend\models\customs\Program;
use backend\models\customs\Kegiatan;
use backend\models\customs\Prioritas;
use backend\models\customs\UraianPekerjaan;
//use backend\models\MbUraianPekerjaanSearch;
use backend\models\customs\search\UraianPekerjaanSearch;

/**
 * MbRenjaController implements the CRUD actions for MbRenja model.
 */
class MbRenjaController extends Controller
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
     * Lists all MbRenja models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MbRenjaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MbRenja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Renja();
        $modelUrusan = new Urusan();
        $modelSkpd = new UrusanHasSkpd();
        $modelProgram = new Program();
        $modelKegiatan = new Kegiatan();
        $modelPrioritas = new Prioritas();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->mb_renja_id]);
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Data berhasil disimpan');
                    return $this->redirect(['index']);
                } else {
                    //echo "<pre>";
                    //print_r($model->getErrors());
                    //echo "</pre>";
                    //exit();
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                    return $this->redirect(['index']);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                //echo "<pre>";
                //print_r($e);
                //echo "</pre>";
                //exit();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelUrusan' => $modelUrusan,
                'modelSkpd' => $modelSkpd,
                'modelProgram' => $modelProgram,
                'modelKegiatan' => $modelKegiatan,
                'modelPrioritas' => $modelPrioritas,
            ]);
        }
    }

    /**
     * Updates an existing MbRenja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUrusan = new Urusan();
        $modelSkpd = new UrusanHasSkpd();
        $modelProgram = new Program();
        $modelKegiatan = new Kegiatan();
        $modelPrioritas = new Prioritas();

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mb_renja_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelUrusan' => $modelUrusan,
                'modelSkpd' => $modelSkpd,
                'modelProgram' => $modelProgram,
                'modelKegiatan' => $modelKegiatan,
                'modelPrioritas' => $modelPrioritas,
            ]);
        }*/
        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->mb_renja_id]);
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Data berhasil disimpan');
                    return $this->redirect(['index']);
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                    return $this->redirect(['index']);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                //echo "<pre>";
                //print_r($e);
                //echo "</pre>";
                //exit();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelUrusan' => $modelUrusan,
                'modelSkpd' => $modelSkpd,
                'modelProgram' => $modelProgram,
                'modelKegiatan' => $modelKegiatan,
                'modelPrioritas' => $modelPrioritas,
            ]);
        }
    }

    /**
     * Deletes an existing MbRenja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();

        //return $this->redirect(['index']);
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

    public function actionSuburusan()
    {
        $out = [];
        if (Yii::$app->request->post('depdrop_parents')) {
            $parents = Yii::$app->request->post('depdrop_parents');
            if ($parents != null) {
                $id = $parents[0];
                $out = self::getHasSkpd($id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionSubprogram()
    {
        $out = [];
        if (Yii::$app->request->post('depdrop_parents')) {
            $parents = Yii::$app->request->post('depdrop_parents');
            if ($parents != null) {
                $id = $parents[0];
                $out = self::getProgram($id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionSubkegiatan()
    {
        $out = [];
        if (Yii::$app->request->post('depdrop_parents')) {
            $parents = Yii::$app->request->post('depdrop_parents');
            if ($parents != null) {
                $id = $parents[0];
                $out = self::getKegiatan($id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionSubsasaran()
    {
        $out = [];
        if (Yii::$app->request->post('depdrop_parents')) {
            $parents = Yii::$app->request->post('depdrop_parents');
            if ($parents != null) {
                $id = $parents[0];
                $out = self::getSasaran($id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function getSasaran($id='')
    {
        $queryProgram = Yii::$app->db->createCommand("SELECT mb_sasaran_id AS id, 
                mb_sasaran_nama AS name
            FROM mb_sasaran
            WHERE mb_prioritas_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $queryProgram;
    }

    public function getKegiatan($id='')
    {
        $queryProgram = Yii::$app->db->createCommand("SELECT mb_kegiatan_id AS id, 
                    CONCAT(mb_kegiatan_kode, ' - ', mb_kegiatan_nama) AS name
                FROM mb_kegiatan
                WHERE mb_program_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $queryProgram;
    }

    public function getProgram($id='')
    {
        $queryProgram = Yii::$app->db->createCommand("SELECT mb_program_id AS id,
                    CONCAT(mb_program_kode,' - ', mb_program_nama) AS name
                FROM mb_program
                WHERE mb_urusan_has_skpd_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $queryProgram;
    }

    public function getHasSkpd($id='')
    {
        $querySkpd = Yii::$app->db->createCommand("SELECT 
                    hs.mb_urusan_has_skpd_id AS id, sk.mb_skpd_nama AS name
                FROM mb_urusan_has_skpd AS hs
                JOIN mb_skpd AS sk ON hs.mb_skpd_id = sk.mb_skpd_id
                WHERE hs.mb_urusan_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $querySkpd;
    }

    public function actionDetailrenja()
    {
        $id = Yii::$app->request->post('expandRowKey');
        $model = $this->findModel($id);

        //$modelUraian = UraianPekerjaan::findOne(['mb_renja_id' => $id]);
        $searchModel = new UraianPekerjaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere([
            'mb_renja_id' => $id
        ]);

        //echo "<pre>";
        //print_r($model);
        //echo "</pre>";
        return $this->renderPartial('_detailrenja', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTambahuraian($id='')
    {
        echo "Test";
    }

    /**
     * Finds the MbRenja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MbRenja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Renja::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
