<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use common\models\LoginForm;
use common\models\UserAkses;

use backend\models\MbSkpd;
/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$getSkpd = Yii::$app->db->createCommand("SELECT mb_skpd_nama FROM mb_skpd ORDER BY mb_skpd_id ASC")->queryAll();
        //$skpd = ArrayHelper::getColumn($getSkpd, 'mb_skpd_nama');
        $query = Yii::$app->db->createCommand("SELECT opd.mb_skpd_nama, ta.mb_tahun_anggaran_nama,
                    SUM(urai.mb_uraian_pekerjaan_vol*mb_uraian_pekerjaan_harga_satuan) AS pagu
                FROM mb_skpd AS opd
                LEFT JOIN mb_urusan_has_skpd AS hopd ON opd.mb_skpd_id = hopd.mb_skpd_id
                LEFT JOIN mb_program AS prog ON hopd.mb_urusan_has_skpd_id = prog.mb_urusan_has_skpd_id
                LEFT JOIN mb_kegiatan AS giat ON prog.mb_program_id = giat.mb_program_id
                LEFT JOIN mb_renja AS renja ON giat.mb_kegiatan_id = renja.mb_kegiatan_id
                LEFT JOIN mb_uraian_pekerjaan AS urai ON renja.mb_renja_id = urai.mb_renja_id
                JOIN mb_tahun_anggaran AS ta ON renja.mb_tahun_anggaran_id = ta.mb_tahun_anggaran_id
                GROUP BY opd.mb_skpd_id
                ORDER BY opd.mb_skpd_id, ta.mb_tahun_anggaran_nama ASC")
            ->queryAll();
        $skpd = ArrayHelper::getColumn($query, 'mb_skpd_nama');
        $tahun = ArrayHelper::getColumn($query, 'mb_tahun_anggaran_nama');
        $pagu = ArrayHelper::getColumn($query, 'pagu');

        $_pagu = implode(', ', $pagu);
        //$json = [];
        $out = '[';
        foreach ($query as $key => $value) {
            //$json = [
            //    'name' => $value['mb_tahun_anggaran_nama'],
            //    'data' => $pagu
            //];
            $out .= "{
                name: '".$value['mb_skpd_nama']."',
                data: [".$value['pagu']."]
            },";
        }
        $out .= ']';
        //echo $out;
        
        //$jsonEncode[] = $json;
        return $this->render('index', [
            'skpd' => $skpd,
            'tahun' => $tahun,
            'pagu' => $pagu,
            //'json' => json_encode($jsonEncode),
            'json' => $out,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $session = Yii::$app->session;
        //Yii::$app->session[Yii::$app->components['session']['name']]['id_smt'])
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $_akses = UserAkses::findOne(['user_id' => Yii::$app->user->getId()]);
            $akses = $_akses ? $_akses->skpd_id : '';

            $session[Yii::$app->components['session']['name']] = ['skpd_id' => $akses];
            //echo "<pre>";
            //print_r($akses);
            //echo "</pre>";
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
