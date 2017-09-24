<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\MbSkpdHasRekeningRincian;
use backend\models\MbSkpdHasRekeningRincianSearch;

use backend\models\customs\RekeningStruk;
use backend\models\customs\RekeningKelompok;
use backend\models\customs\RekeningJenis;
use backend\models\customs\RekeningObyek;
use backend\models\customs\RekeningRinci;
use backend\models\customs\Urusan;
use backend\models\customs\UrusanHasSkpd;

/**
 * MbSkpdHasRekeningRincianController implements the CRUD actions for MbSkpdHasRekeningRincian model.
 */
class MbSkpdHasRekeningRincianController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 
                            'create', 'update', 'delete', 
                            'detailanggaran', 'suburusan',
                            'substruk', 'subkelompok',
                            'subobyek', 'subrekening'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'detailanggaran' => ['POST']
                ],
            ],
        ];
    }

    /**
     * Lists all MbSkpdHasRekeningRincian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MbSkpdHasRekeningRincianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MbSkpdHasRekeningRincian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MbSkpdHasRekeningRincian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MbSkpdHasRekeningRincian();
        $modelStruk = new RekeningStruk();
        $modelUrusan = new Urusan();
        $modelKelompok = new RekeningKelompok();
        $modelJenis = new RekeningJenis();
        $modelObyek = new RekeningObyek();
        $modelRinci = new RekeningRinci();

        if ($model->load(Yii::$app->request->post())) {
            //var_dump($model->save());
            //exit();
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
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
                return $this->redirect(['index']);
            }
            //return $this->redirect(['view', 'id' => $model->mb_skpd_has_rekening_rincian_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelStruk' => $modelStruk,
                'modelUrusan' => $modelUrusan,
                'modelKelompok' => $modelKelompok,
                'modelJenis' => $modelJenis,
                'modelObyek' => $modelObyek,
                'modelRinci' => $modelRinci
            ]);
        }
    }

    /**
     * Updates an existing MbSkpdHasRekeningRincian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mb_skpd_has_rekening_rincian_id]);
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
                    Yii::$app->session->setFlash('success','Data berhasil dirubah');
                    return $this->redirect(['index']);
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa dirubah');
                    return $this->redirect(['index']);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa dirubah');
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MbSkpdHasRekeningRincian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDetailanggaran()
    {
        $id = Yii::$app->request->post('expandRowKey');
        //$id = 1;
        $model = $this->findModel($id);

        return $this->renderPartial('_detailhasrekeningrincian', [
            'model' => $model
        ]);
        //echo $id;
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

    public function actionSubstruk()
    {
        $out = [];
        if (Yii::$app->request->post('depdrop_parents')) {
            $parents = Yii::$app->request->post('depdrop_parents');
            if ($parents != null) {
                $id = $parents[0];
                $out = self::getKelompok($id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionSubkelompok()
    {
        $out = [];
        if (Yii::$app->request->post('depdrop_parents')) {
            $parents = Yii::$app->request->post('depdrop_parents');
            if ($parents != null) {
                $id = $parents[0];
                $out = self::getJenis($id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionSubobyek()
    {
        $out = [];
        if (Yii::$app->request->post('depdrop_parents')) {
            $parents = Yii::$app->request->post('depdrop_parents');
            if ($parents != null) {
                $id = $parents[0];
                $out = self::getSubobyek($id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionSubrekening()
    {
        $out = [];
        if (Yii::$app->request->post('depdrop_parents')) {
            $parents = Yii::$app->request->post('depdrop_parents');
            if ($parents != null) {
                $id = $parents[0];
                $out = self::getSubrekening($id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function getSubrekening($id='')
    {
        $queryKelompok = Yii::$app->db->createCommand("SELECT mb_rekening_rincian_id AS id, 
                    CONCAT(mb_rekening_rincian_kode, ' - ', mb_rekening_rincian_nama) AS name
                FROM mb_rekening_rincian
                WHERE mb_rekening_obyek_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $queryKelompok;
    }

    public function getSubobyek($id='')
    {
        $queryKelompok = Yii::$app->db->createCommand("SELECT mb_rekening_obyek_id AS id, 
                    CONCAT(mb_rekening_obyek_kode, ' - ',mb_rekening_obyek_nama) AS name
                FROM mb_rekening_obyek
                WHERE mb_rekening_jenis_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $queryKelompok;
    }

    public function getJenis($id='')
    {
        $queryKelompok = Yii::$app->db->createCommand("SELECT mb_rekening_jenis_id AS id, 
                    CONCAT(mb_rekening_jenis_kode, ' - ',mb_rekening_jenis_nama) AS name
                FROM mb_rekening_jenis
                WHERE mb_rekening_kelompok_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $queryKelompok;
    }

    public function getKelompok($id='')
    {
        $queryKelompok = Yii::$app->db->createCommand("SELECT mb_rekening_kelompok_id AS id, 
                    CONCAT(mb_rekening_kelompok_kode, ' - ', mb_rekening_kelompok_nama) AS name
                FROM mb_rekening_kelompok
                WHERE mb_rekening_struk_id = :cari")
            ->bindValue(':cari', $id)
            ->queryAll();
        return $queryKelompok;
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

    /**
     * Finds the MbSkpdHasRekeningRincian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MbSkpdHasRekeningRincian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MbSkpdHasRekeningRincian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
