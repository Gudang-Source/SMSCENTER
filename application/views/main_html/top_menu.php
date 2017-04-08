        <header>
            <nav class="navbar navbar-default nav-dash">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="<?=base_url('assets/images/logo.png')?>" width="254" height="250" alt="Envelope Icon" class="img-responsive icon-sms"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="<?=base_url('admin/index/')?>">Beranda</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pesan <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('admin/index/write_message')?>">Tulis Baru</a></li>
                                    <li><a href="<?=base_url('admin/index/inbox')?>">Kotak Masuk</a></li>
                                    <li><a href="<?=base_url('admin/index/outbox')?>">Kotak Keluar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Telepon <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('admin/index/phone_book')?>">Kontak</a></li>
                                    <li><a href="<?=base_url('admin/index/grup')?>">Grup</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('admin/index/akun')?>">Akun</a></li>
                                    <li><a href="<?=base_url('admin/index/cek_pulsa')?>">Cek Pulsa</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=base_url('admin/service/')?>" target="_blank">Start Services</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Selamat datang, <label class="label label-success">admin</label></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('admin/index/change_profile')?>">Ubah Profil</a></li>
                                    <li><a href="<?=base_url('admin/index/logout')?>">Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>