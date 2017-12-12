<?php

namespace backend\controllers;

use Yii;
use backend\models\MbKegiatan;
use backend\models\MbKegiatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

use backend\models\MbSkpd;
/**
 * MbKegiatanController implements the CRUD actions for MbKegiatan model.
 */
class MbKegiatanController extends Controller
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
     * Lists all MbKegiatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MbKegiatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MbKegiatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MbKegiatan();
        $modelSkpd = new MbSkpd();

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
                'modelSkpd' => $modelSkpd,
            ]);
        }
    }

    /**
     * Updates an existing MbKegiatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelSkpd = new MbSkpd();

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
                'modelSkpd' => $modelSkpd
            ]);
        }
    }

    /**
     * Deletes an existing MbKegiatan model.
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

    public function getProgram($id='')
    {
        $queryProgram = Yii::$app->db->createCommand("SELECT prog.mb_program_id AS id,
                    CONCAT(prog.mb_program_kode,' - ', prog.mb_program_nama) AS name
                FROM mb_program AS prog
                JOIN mb_urusan_has_skpd AS hskpd USING(mb_urusan_has_skpd_id)
                JOIn mb_skpd AS skpd USING(mb_skpd_id)
                WHERE skpd.mb_skpd_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $queryProgram;
    }

    /**
     * Finds the MbKegiatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MbKegiatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MbKegiatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
