<?php
use yii\helpers\Html;
use backend\models\customs\Rkpd;

// set Header
echo Html::beginTag('table', ['width' => '100%']);
    echo Html::beginTag('tr');
        echo Html::tag('td', Html::img('@web/img/logo-mubar.png', ['width' => '100px']), ['width' => '150px', 'rowspan' => '3']);
        echo Html::tag('td', '<h2>PEMERINTAH KABUPATEN MUNA BARAT</h2>', ['align' => 'center']);
    echo Html::endTag('tr');
    echo Html::beginTag('tr');
        echo Html::tag('td', '<h3>Program dan Kegiatan SKPD</h3>', ['align' => 'center']);
    echo Html::endTag('tr');
    echo Html::beginTag('tr');
        echo Html::tag('td', '<h3>Tahun Anggaran '.$ta.'</h3>', ['align' => 'center']);
    echo Html::endTag('tr');
echo Html::endTag('table');
echo "<hr>";
//content
echo Html::beginTag('table', ['class' => 'table table-striped table-bordered']);
    echo Html::beginTag('thead', ['class' => 'bg-yellow-gold bg-font-yellow-gold']);
        echo Html::beginTag('tr');
            echo Html::tag('th', 'Kode', ['rowspan' => '2', 'width' => '50px', 'style' => 'vertical-align: middle; text-align: center;']);
            echo Html::tag('th', 'Urusan/Bidang Urusan Pemerintahan Daerah Dan Program/Kegiatan', ['rowspan' => '2', 'width' => '250px', 'style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', 'Indikator Kinerja Program/Kegiatan', ['rowspan' => '2', 'width' => '200px', 'style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', 'Rencana Tahun '.$ta, ['colspan' => '3', 'style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', 'Perkiraan Maju Rencana Tahun '.$ta, ['colspan' => '2', 'style' => 'vertical-align: middle; text-align: center']);
        echo Html::endTag('tr');
        echo Html::beginTag('tr');
            echo Html::tag('th', 'Lokasi', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', 'Target Capaian Kinerja', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', 'Kebutuhan Dana/Pagu Indikatif', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', 'Target Capaian Kinerja', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', 'Pagu Maju (n + 1)', ['style' => 'vertical-align: middle; text-align: center', 'width' => '100px']);
        echo Html::endTag('tr');
        echo Html::beginTag('tr');
            echo Html::tag('th', '1', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', '2', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', '3', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', '4', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', '5', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', '6', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', '7', ['style' => 'vertical-align: middle; text-align: center']);
            echo Html::tag('th', '8', ['style' => 'vertical-align: middle; text-align: center']);
        echo Html::endTag('tr');
    echo Html::endTag('thead');

    echo Html::beginTag('tbody');
        $jenisUrusan = Rkpd::urusanJenis($ta, $id_skpd);
        if ($jenisUrusan) {
            foreach ($jenisUrusan as $jenis) {
                echo Html::beginTag('tr');
                    echo Html::tag('td', '<b>'.$jenis['jenis_nama'].'</b>', ['colspan' => '8']);
                echo Html::endTag('tr');

                $urusan = Rkpd::Urusan($ta, $id_skpd, $jenis['mb_urusan_jenis_id']);
                foreach ($urusan as $urus) {
                    echo Html::beginTag('tr');
                        echo Html::tag('td', '<b>'.$urus['urus_nama'].'</b>', ['colspan' => '8']);
                    echo Html::endTag('tr');

                    $skpd = Rkpd::Skpd($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id']);
                    foreach ($skpd as $opd) {
                        echo Html::beginTag('tr');
                            echo Html::tag('td', '<b>'.$opd['skpd_nama'].'</b>', ['colspan' => '8']);
                        echo Html::endTag('tr');

                        $program = Rkpd::Program($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id']);
                        foreach ($program as $prog) {
                            echo Html::beginTag('tr');
                                echo Html::tag('td', '<b>'.$prog['prog_nama'].'</b>', ['colspan' => '8']);
                            echo Html::endTag('tr');

                            $kegiatan = Rkpd::Kegiatan($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id'], $prog['mb_program_id']);
                            foreach ($kegiatan as $renj) {
                                echo Html::beginTag('tr');
                                    echo Html::tag('td', $renj['keg_kode']);
                                    echo Html::tag('td', $renj['mb_kegiatan_nama']);
                                    echo Html::tag('td', $renj['mb_renja_indikator_kegiatan']);
                                    echo Html::tag('td', $renj['mb_kabupaten_nama']);
                                    echo Html::tag('td', $renj['mb_renja_target_capaian']);
                                    echo Html::tag('td', number_format($renj['mb_renja_pagu_indikatif'],0,',','.'));
                                    echo Html::tag('td', $renj['mb_renja_target_capaian_thn_maju']);
                                    echo Html::tag('td', number_format($renj['mb_uraian_pekerjaan_pagu_tahun_maju'],0,',','.'));
                                echo Html::endTag('tr');
                            }
                        }
                    }
                }
            }
        } else {
            echo Html::beginTag('tr');
                echo Html::tag('td', 'Data tidak ada', ['colspan' => '8']);
            echo Html::endTag('tr');
        }
    echo Html::endTag('tbody');
echo Html::endTag('table');