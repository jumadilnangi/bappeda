<?php 
use yii\helpers\Html; 
use yii\bootstrap\Nav;
use mdm\admin\components\Helper;
$this->registerJs('$(\'.profile\').initial();');
?>
<header class="main-header">
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<?php 
					echo Html::a('<b>'.Yii::$app->name.'</b>',Yii::$app->homeUrl,['class' => 'navbar-brand']);
				?>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<!--div class="collapse navbar-collapse pull-left" id="navbar-collapse"-->
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<?php
					$itemsLeft = [
						['label' => '<i class="fa fa-home"></i> Beranda', 'url' => ['/site/index'],],
						[
							'label' => '<i class="fa fa-suitcase"></i> Master Data',
							'items' => [
								['label' => '<i class="fa fa-circle-o"></i> Visi', 'url' => ['/mb-rpjmd-visi/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Misi', 'url' => ['/mb-rpjmd-misi/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Tujuan', 'url' => ['/mb-rpjmd-tujuan/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Sasaran', 'url' => ['/mb-rpjmd-sasaran/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Indikator Kinerja', 'url' => ['/mb-indikator-kinerja/index'],],
							],
						],
						[
							'label' => '<i class="fa fa-database"></i> Master Data',
							'items' => [
								['label' => '<i class="fa fa-circle-o"></i> Tahun Anggaran', 'url' => ['/mb-tahun-anggaran/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Data Urusan', 'url' => ['/mb-urusan/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Data SKPD', 'url' => ['/mb-skpd/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Data Urusan & SKPD', 'url' => ['/mb-urusan-has-skpd/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Prioritas Daerah', 'url' => ['/mb-prioritas/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Sasaran Daerah', 'url' => ['/mb-sasaran/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Data Kecamatan', 'url' => ['/mb-kecamatan/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Data Desa', 'url' => ['/mb-kelurahan-desa/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Data Program', 'url' => ['/mb-program/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Data Kegiatan', 'url' => ['/mb-kegiatan/index'],],
							]
						],
	                    [
	                        'label' => '<i class="fa fa-credit-card"></i> Master Rekening',
	                        'items' => [
	                            ['label' => '<i class="fa fa-circle-o"></i> Struk Rekening', 'url' => ['/mb-rekening-struk/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Kelompok Rekening', 'url' => ['/mb-rekening-kelompok/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Jenis Rekening', 'url' => ['/mb-rekening-jenis/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Obyek Rekening', 'url' => ['/mb-rekening-obyek/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Rincian Rekening', 'url' => ['/mb-rekening-rincian/index'],],
	                            
	                            
	                        ],
	                    ],
	                    [
	                        'label' => '<i class="fa fa-briefcase"></i> Dok. Perencanaan',
	                        'items' => [
	                            ['label' => '<i class="fa fa-circle-o"></i> Rencana Kerja (RENJA)', 'url' => ['/mb-renja/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Uraian RENJA', 'url' => ['/mb-uraian-pekerjaan/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Lokasi RENJA', 'url' => ['/mb-lokasi-pekerjaan/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Musrenbang Kecamatan', 'url' => ['/mb-musrenbang-kecamatan/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Forum SKPD', 'url' => ['/mb-forum-skpd/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> Musrenbang Kabupaten', 'url' => ['/mb-musrenbang-kabupaten/index'],],
	                            ['label' => '<i class="fa fa-circle-o"></i> RKPD', 'url' => ['/mb-rkpd/index'],],
	                            
	                            
	                        ],
	                    ],
	                    [
	                        'label' => '<i class="fa fa-send"></i> Transaksi Anggaran',
	                        'items' => [
	                            ['label' => '<i class="fa fa-circle-o"></i> Penyusunan Anggaran', 'url' => ['/mb-skpd-has-rekening-rincian/index'],],
	                           
	                            
	                        ],
	                    ],
						];
					echo Nav::widget([
						'options' => ['class' => 'navbar-nav'],
						'encodeLabels' => false,
						'items' => Helper::filter($itemsLeft),
					]);
					
					$itemsRightUser = [
						'<li class="dropdown user user-menu active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img data-name="'.Yii::$app->user->identity->username.'" class="user-image profile" alt="'.Yii::$app->user->identity->username.'">
								<span class="hidden-xs">
									'.Yii::$app->user->identity->username.'
								</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img data-name="'.Yii::$app->user->identity->username.'" class="img-circle profile" alt="'.Yii::$app->user->identity->username.'">
									<p>
										'.Yii::$app->user->identity->username.'
										<small></small>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-left">'
										.Html::a('Profil',['/profil'],['class' => 'btn btn-default btn-flat']).
									'</div>
									<div class="pull-right">'
										.Html::a(
											'Sign out',
											['/site/logout'],
											['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
										).
									'</div>
								</li>
							</ul>
						</li>'
					];

					$itemsRightSetting = [
						[
							'label' => '<i class="fa fa-cogs"></i>',
							'items' => [
								['label' => '<i class="fa fa-circle-o"></i> Manajemen User', 'url' => ['/user/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Advance Manajemen User', 'url' => ['/admin/assignment']],
							],
						],
					];
					
					
					echo Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'encodeLabels' => false,
						//'items' => Helper::filter($itemsRight)
						'items' => Helper::filter($itemsRightSetting)
					]);

					echo Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'encodeLabels' => false,
						//'items' => Helper::filter($itemsRight)
						'items' => $itemsRightUser
					]);
					/*echo Nav::widget([
					    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
					]);*/
				?>
			</div>
		</div>
	</nav>	
</header>
