        <section class="forms">
            <div class="container">
                <div class="row">
                    <div class="form-content">
                        <form name="newmsg" id="newmsg" method="POST" action="<?=base_url('outbox/Outbox/sendMessage')?>">
                            <div class="form-group form-item" id="inputmsg">
                                <select name="selectmsg" id="selectmsg" class="form-control">
                                    <option value="0">- Pilih Tipe Kontak -</option>
                                    <option value="1">Individu</option>
                                    <option value="2">Grup</option>
                                    <option value="3">Nomor</option>
                                </select>
                            </div>
                            <input type="hidden" name="recipientmsg" id="recipientmsg" value="">
                            <div class="form-group form-item" id="inputnumber">
                                <input type="text" name="numbermsg" id="numbermsg" placeholder="Masukkan Nomor" class="form-control"></input>
                                <span class="glyphicon glyphicon-phone"></span>
                            </div>
                            <div class="form-group form-item" id="inputgrup">
                                <select name="selectgrup" id="selectgrup" class="form-control">
                                    <option value="0">- Pilih Grup -</option>
                                    <?php foreach ($grup->result_array() as $row) { ?>
                                        <option value="<?=$row['ID']?>"><?=$row['grup']?></option>                                        
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group form-item" id="inputindividu">
                                <select data-placeholder="Pilih Kontak" name="phonemsg[]" id="phonemsg" multiple class="form-control chosen-select" tabindex="-1">
                                    <option value=""></option>
                                    <?php foreach ($kontak->result_array() as $row) { ?>
                                        <option value="<?=$row['number']?>"><?=$row['name']?></option>                                        
                                    <?php } ?>
                                </select>
                                <span class="glyphicon glyphicon-phone"></span>
                            </div>
                            <div class="form-group form-item">
                                <textarea name="textmsg" id="textmsg" class="form-control" placeholder="Masukkan isi pesan" rows="10"></textarea>
                            </div>
                            <input type="submit" name="loginbtn" id="loginbtn" class="btn btn-action" value="Kirim">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Javascript -->
        <script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/plugins/notify/pnotify.custom.min.js')?>"></script>
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
        <!-- SUBMIT FORM -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#newmsg').on('submit', function(e){
                    e.preventDefault();                   
                    $.ajax({
                      type: $('form').attr("method"),
                      url: $('form').attr("action"),
                      data: $('form').serialize(),
                      success: function (i) {
                        if (i == 'true') {
                          // tidak ada data jadi buat anggota baru
                          new PNotify({
                                    title: 'Pengiriman Pesan',
                                    text: 'Pengiriman Pesan Berhasil',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                            document.getElementById("newmsg").reset();
                        }else{
                          // tidak ada data jadi buat anggota baru
                          new PNotify({
                                    title: 'Pengiriman Pesan',
                                    text: 'Pengiriman Pesan Gagal',
                                    type: 'warning',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });        
                        }
                      }    
                    });                    
                });
            });
        </script>
        <!-- SUBMIT FORM -->
        <!-- Pilih Tipe -->
        <script type="text/javascript">
                $('#inputgrup').hide();
                $('#inputindividu').hide();
                $('#inputnumber').hide();
                var recipienttype = 0;
            
                $('#selectmsg').change(function(){
                    var tipe = $(this).val();
                    if(tipe == '1'){
                        $('#inputindividu').show();
                        $('#inputgrup').hide();
                        $('#inputnumber').hide();
                        recipienttype = "1";
                    }else if(tipe == '2'){
                        $('#inputgrup').show();
                        $('#inputindividu').hide();
                        $('#inputnumber').hide();
                        recipienttype = "2";
                    }
                    else if(tipe == '3'){
                        $('#inputgrup').hide();
                        $('#inputindividu').hide();
                        $('#inputnumber').show();
                        recipienttype = "3";
                    }
                    document.getElementById("recipientmsg").value = recipienttype;
                });
            
        </script>        