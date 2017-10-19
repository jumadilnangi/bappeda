<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Bappeda Mubar</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/site'],],
                    [
                        'label' => 'Master Data',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            
                           ['label' => 'Tahun Anggaran', 'icon' => 'calendar-check-o', 'url' => ['/mb-tahun-anggaran'],],
                            [
                                'label' => 'RPJMD',
                                'icon' => 'suitcase',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Visi', 'icon' => 'vine', 'url' => ['/mb-rpjmd-visi'],],
                                    ['label' => 'Misi', 'icon' => 'medium', 'url' => ['/mb-rpjmd-misi'],],
                                    ['label' => 'Tujuan', 'icon' => 'try', 'url' => ['/mb-rpjmd-tujuan'],],
                                    ['label' => 'Sasaran', 'icon' => 'usd', 'url' => ['/mb-rpjmd-sasaran'],],
                                    ['label' => 'Indikator Kinerja', 'icon' => 'italic', 'url' => ['/mb-indikator-kinerja'],],
                                    
                                    
                                ],
                            ],
                            
                            ['label' => 'Data Urusan', 'icon' => 'sitemap', 'url' => ['/mb-urusan'],],
                            ['label' => 'Data SKPD', 'icon' => 'sitemap', 'url' => ['/mb-skpd'],],
                            ['label' => 'Data Urusan & SKPD', 'icon' => 'sitemap', 'url' => ['/mb-urusan-has-skpd'],],
                            ['label' => 'Prioritas Daerah', 'icon' => 'check-circle', 'url' => ['/mb-prioritas'],],
                            ['label' => 'Sasaran Daerah', 'icon' => 'check-circle', 'url' => ['/mb-sasaran'],],
                            ['label' => 'Data Kecamatan', 'icon' => 'institution', 'url' => ['/mb-kecamatan'],],
                            ['label' => 'Data Desa', 'icon' => 'bank', 'url' => ['/mb-kelurahan-desa'],],
                            ['label' => 'Data Program', 'icon' => 'tasks', 'url' => ['/mb-program'],],
                            ['label' => 'Data Kegiatan', 'icon' => 'tasks', 'url' => ['/mb-kegiatan'],],
                            
                        ],
                    ],
                    [
                        'label' => 'Master Rekening',
                        'icon' => 'credit-card',
                        'url' => '#',
                        'items' => [
                            
                            ['label' => 'Struk Rekening', 'icon' => 'check-circle', 'url' => ['/mb-rekening-struk'],],
                            ['label' => 'Kelompok Rekening', 'icon' => 'check-circle', 'url' => ['/mb-rekening-kelompok'],],
                            ['label' => 'Jenis Rekening', 'icon' => 'check-circle', 'url' => ['/mb-rekening-jenis'],],
                            ['label' => 'Obyek Rekening', 'icon' => 'check-circle', 'url' => ['/mb-rekening-obyek'],],
                            ['label' => 'Rincian Rekening', 'icon' => 'check-circle', 'url' => ['/mb-rekening-rincian'],],
                            
                            
                        ],
                    ],
                    [
                        'label' => 'Dok. Perencanaan',
                        'icon' => 'briefcase',
                        'url' => '#',
                        'items' => [
                            
                            ['label' => 'Rencana Kerja (RENJA)', 'icon' => 'check-circle', 'url' => ['/mb-renja'],],
                            ['label' => 'Uraian RENJA', 'icon' => 'check-circle', 'url' => ['/mb-uraian-pekerjaan'],],
                            ['label' => 'Lokasi RENJA', 'icon' => 'check-circle', 'url' => ['/mb-lokasi-pekerjaan'],],
                            ['label' => 'Musrenbang Kecamatan', 'icon' => 'check-circle', 'url' => ['/mb-musrenbang-kecamatan'],],
                            ['label' => 'Forum SKPD', 'icon' => 'check-circle', 'url' => ['/mb-forum-skpd'],],
                            ['label' => 'Musrenbang Kabupaten', 'icon' => 'check-circle', 'url' => ['/mb-musrenbang-kabupaten'],],
                            ['label' => 'RKPD', 'icon' => 'check-circle', 'url' => ['/mb-rkpd'],],
                            
                            
                        ],
                    ],
                    [
                        'label' => 'Transaksi Anggaran',
                        'icon' => 'send',
                        'url' => '#',
                        'items' => [
                            
                            ['label' => 'Penyusunan Anggaran', 'icon' => 'check-circle', 'url' => ['/mb-skpd-has-rekening-rincian'],],
                           
                            
                        ],
                    ],
                    [
                        'label' => 'Laporan APBD',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            
                            ['label' => 'Ringkasan APBD', 'icon' => 'check-circle', 'url' => ['/apbd-ringkasan'],],
                            ['label' => 'Rincian APBD', 'icon' => 'check-circle', 'url' => ['/apbd-rincian'],],
                            ['label' => 'Rks. Belanja (Urusan)', 'icon' => 'check-circle', 'url' => ['/apbd-ringkasan-belanja-urusan'],],
                            ['label' => 'Rks. Belanja (Program)', 'icon' => 'check-circle', 'url' => ['/apbd-ringkasan-belanja-program'],],
                            ['label' => 'Rekapitulasi Belanja', 'icon' => 'check-circle', 'url' => ['/apbd-rekapitulasi-belanja'],],
                            ['label' => 'Rks. APBD (Sumber Dana)', 'icon' => 'check-circle', 'url' => ['/apbd-ringkasan-sumber-dana'],],
                            
                            
                        ],
                    ],
                    [
                        'label' => 'Laporan RKA',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            
                            ['label' => 'RKA Pendapatan', 'icon' => 'check-circle', 'url' => ['/rka-pendapatan'],],
                            ['label' => 'RKA Belanja Tdk Langsung', 'icon' => 'check-circle', 'url' => ['/rka-belanja-tidak-langsung'],],
                            ['label' => 'RKA Belanja Langsung', 'icon' => 'check-circle', 'url' => ['/rka-belanja-langsung'],],
                            ['label' => 'Penerimaan Pembiayaan', 'icon' => 'check-circle', 'url' => ['/rka-penerimaan-pembiayaan'],],
                            ['label' => 'Pengeluaran Pembiayaan', 'icon' => 'check-circle', 'url' => ['/rka-pengeluaraan-pembiyaan'],],
                            ['label' => 'Ringkatan RKA', 'icon' => 'check-circle', 'url' => ['/rka'],],
                            
                            
                        ],
                    ],
                    [
                        'label' => 'Laporan DPA',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            ['label' => 'DPA SKPD Pendapatan', 'icon' => 'check-circle', 'url' => ['/dpa-skpd-pendapatan'],],
                            ['label' => 'DPA SKPD Belanja (TL)', 'icon' => 'check-circle', 'url' => ['/dpa-skpd-belanja-tidak-langsung'],],
                            ['label' => 'DPA SKPD Belajang (L)', 'icon' => 'check-circle', 'url' => ['/dpa-skpd-belanja-langsung'],],
                        ],
                    ],
                    [
                        'label' => 'Manajemen Pengguna',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Daftar Pengguna', 'icon' => 'user-circle', 'url' => ['/user']],
                            ['label' => 'Tambah Pengguna Baru', 'icon' => 'user-plus', 'url' => ['/user/create']],
                            ['label' => 'Admin Manajemen', 'icon' => '', 'url' => ['/admin/assignment']],
                        ]
                    ],
                   
                    
                    
                ],
            ]
        ) ?>

    </section>

</aside>
