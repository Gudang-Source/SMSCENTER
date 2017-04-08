        <section class="forms">
            <div class="container">
                <div class="row">
                    <div class="form-content">
                        <form name="tambahcontact" id="tambahcontact" method="" action="">
                            <div class="form-group form-item">
                                <input type="text" name="namecontact" class="form-control" id="namecontact" placeholder="Masukkan Username Akun">
                                <span class="glyphicon glyphicon-user"></span>
                            </div>
                            <div class="form-group form-item">
                                <input type="email" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan Email Akun">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </div>
                            <div class="form-group form-item">
                                <input type="password" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan Password Akun">
                                <span class="glyphicon glyphicon-lock"></span>
                            </div>
                            <div class="form-group form-item">
                                <input type="password" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan kembali Password Akun">
                                <span class="glyphicon glyphicon-retweet"></span>
                            </div>
                            <div class="form-group form-item" id="inputindividu">
                                <select name="grupcontact" id="grupcontact" class="form-control">
                                    <option value="0">- Pilih Unit -</option>
                                    <option value="1">SubBag PSI</option>
                                    <option value="2">SubBag Akademik</option>
                                    <option value="3">SubBag Keuangan</option>
                                    <option value="4">SubBag Administrasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="sumbitcontact" id="submitcontact" value="Simpan" class="btn btn-action">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Javascript -->
        <script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js')?>"></script>
                
        <!-- Bootstrap -->
        <script type="text/javascript" src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
                
        <!-- Chosen -->
        <script type="text/javascript" src="<?=base_url('assets/plugins/chosen/chosen.js')?>"></script>
        <script type="text/javascript">
            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        </script>