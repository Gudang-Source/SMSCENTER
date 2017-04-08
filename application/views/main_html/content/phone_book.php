        <section class="table-data phone-book">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <div class="action-grup">
                                <button id='tambah' class="btn btn-default btn-add" title="Tambah data baru" data-toggle="modal" data-target="#formtambah"> Tambah <span class="glyphicon glyphicon-plus"></span></button>
<!--                                 <button id='delete' class="btn btn-default btn-delselect" title="Hapus data terpilih"> Hapus <span class="glyphicon glyphicon-trash"></span></button>
                                <button id='delete' class="btn btn-default btn-import" title="Impor data dari komputer" data-toggle="modal" data-target="#formimpor"> Impor <span class="glyphicon glyphicon-folder-open"></span></button>
 -->                                
                                <div class="modal fade" id="formtambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah Kontak Baru</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="tambahcontact" id="tambahcontact" method="" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Nama:</label>
                                                        <input type="text" name="namecontact" class="form-control" id="namecontact" placeholder="Masukkan Nama Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Nomor:</label>
                                                        <input type="text" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Jabatan:</label>
                                                        <input type="text" name="jabatan" class="form-control" id="numcontact" placeholder="Masukkan Jabatan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Jurusan:</label>
                                                        <input type="text" name="jurusan" class="form-control" id="numcontact" placeholder="Masukkan Jurusan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Agama:</label>
                                                        <input type="text" name="agama" class="form-control" id="numcontact" placeholder="Masukkan Agama">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="sumbitcontact" id="submitcontact" value="Simpan" class="btn btn-default">
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="formimpor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Impor Kontak</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="tambahcontact" id="tambahcontact" method="" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Impor file contact (csv):</label>
                                                        <input type="file" name="filecontact" class="form-control" id="filecontact">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="submitimpor" id="submitimpor" value="Impor" class="btn btn-default">
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nomor</th>
                                        <!-- <th>Email</th> -->
                                        <!-- <th>Grup</th> -->
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kontak->result_array() as $row) { ?>
                                        <tr>
                                            <td><?=$row['name']?></td>
                                            <td><?=$row['number']?></td>
<!--                                             <td><label class="label label-info info-grup">PJKelas</label></td>
 -->                                            <td>
                                                <a class="label save" title="Ubah" onclick="getData(<?=$row['ID']?>)"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a href="#" class="label delete" title="Hapus" onclick="modalDelete(<?=$row['ID']?>)"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                
                                <div class="modal fade" id="formedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Ubah Kontak</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="editcontact" id="editcontact" method="" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Nama:</label>
                                                        <input type="text" name="namecontact" class="form-control" id="enamecontact" placeholder="Masukkan Nama Kontak">
                                                        <input type="hidden" name="idcontact" class="form-control" id="eidcontact" placeholder="Masukkan Nama Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Nomor:</label>
                                                        <input type="text" name="numcontact" class="form-control" id="enumcontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Nomor:</label>
                                                        <input type="text" name="alamatcontact" class="form-control" id="ealamatcontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Jabatan:</label>
                                                        <input type="text" name="jabatancontact" class="form-control" id="ejabatancontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Jurusan:</label>
                                                        <input type="text" name="jurusancontact" class="form-control" id="ejurusancontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Agama:</label>
                                                        <input type="text" name="agamacontact" class="form-control" id="eagamacontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" name="esumbitcontact" id="submitcontact" value="Simpan" class="btn btn-default">
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="formhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Ubah Kontak</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="editcontact" id="deletecontact" method="" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Nama:</label>
                                                        <input type="text" name="namecontact" class="form-control" id="hnamecontact" placeholder="Masukkan Nama Kontak">
                                                        <input type="hidden" name="idcontact" class="form-control" id="hidcontact" placeholder="Masukkan Nama Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Nomor:</label>
                                                        <input type="text" name="numcontact" class="form-control" id="hnumcontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Nomor:</label>
                                                        <input type="text" name="alamatcontact" class="form-control" id="halamatcontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Nomor:</label>
                                                        <input type="text" name="jabatancontact" class="form-control" id="hjabatancontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Nomor:</label>
                                                        <input type="text" name="jurusancontact" class="form-control" id="hjurusancontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Nomor:</label>
                                                        <input type="text" name="agamacontact" class="form-control" id="hagamacontact" placeholder="Masukkan Nomor Kontak">
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" name="hsumbitcontact" id="submitcontact" value="Hapus Data" class="btn btn-default">
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Javascript -->
        <script type="text/javascript" src="<?=base_url('assets/js/jquery-2.2.4.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/plugins/notify/pnotify.custom.min.js')?>"></script>

        <!-- Chosen -->
        <script type="text/javascript" src="<?=base_url('assets/plugins/chosen/chosen.js')?>"></script>
        <script type="text/javascript">
            function getData(id){
                $.ajax({
                    type: 'get',
                    url: '<?=base_url('kontak/Kontak/detail')?>/'+id,
                    data: $('#tambahcontact').serialize(),
                    success: function (i) {
                        var jsonObjectParse = JSON.parse(i);
                        var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                        var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                        console.log(jsonObjectFinal.status);
                        if (jsonObjectFinal.status == "1") {
                            // berhasil update
                            // reload halaman
                            $("#enamecontact").val(jsonObjectFinal.nama);
                            $("#enumcontact").val(jsonObjectFinal.nomor);
                            $("#ealamatcontact").val(jsonObjectFinal.alamat);
                            $("#ejabatancontact").val(jsonObjectFinal.jabatan);
                            $("#ejurusancontact").val(jsonObjectFinal.jurusan);
                            $("#eagamacontact").val(jsonObjectFinal.agama);
                            $("#eidcontact").val(jsonObjectFinal.id);
                            $('#formedit').modal('show');
                        }else{
                            // tampilkan kesalahan
                            new PNotify({
                                        title: 'Gagal',
                                        text: 'Kontak tidak ditemukan',
                                        type: 'error',
                                        hide: true,
                                        styling: 'bootstrap3'
                                      });
                        }
                    }
                });
            }
            function modalDelete(id){
                $.ajax({
                    type: 'get',
                    url: '<?=base_url('kontak/Kontak/detail')?>/'+id,
                    data: $('#tambahcontact').serialize(),
                    success: function (i) {
                        var jsonObjectParse = JSON.parse(i);
                        var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                        var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                        console.log(jsonObjectFinal.status);
                        if (jsonObjectFinal.status == "1") {
                            // berhasil update
                            // reload halaman
                            $("#hnamecontact").val(jsonObjectFinal.nama);
                            $("#hnumcontact").val(jsonObjectFinal.nomor);
                            $("#halamatcontact").val(jsonObjectFinal.alamat);
                            $("#hjabatancontact").val(jsonObjectFinal.jabatan);
                            $("#hjurusancontact").val(jsonObjectFinal.jurusan);
                            $("#hagamacontact").val(jsonObjectFinal.agama);
                            $("#hidcontact").val(jsonObjectFinal.id);
                            $('#formhapus').modal('show');
                        }else{
                            // tampilkan kesalahan
                            new PNotify({
                                        title: 'Gagal',
                                        text: 'Kontak tidak ditemukan',
                                        type: 'error',
                                        hide: true,
                                        styling: 'bootstrap3'
                                      });
                        }
                    }
                });                
            }
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
        <!-- Datatables -->
        <script type="text/javascript" src="<?=base_url('assets/plugins/datatables/datatables.min.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['excel', 'pdf', 'print']
                });
            });            
            $(document).ready(function(){
                $('#tambahcontact').on('submit', function(e){
                  e.preventDefault();
                  $.ajax({
                    type: 'post',
                    url: '<?=base_url('kontak/save')?>',
                    data: $('#tambahcontact').serialize(),
                    success: function (i) {
                      if(i == 'true'){
                        new PNotify({
                                            title: 'Sukses',
                                            text: 'Tambah Kontak Sukses',
                                            type: 'success',
                                            hide: true,
                                            styling: 'bootstrap3'
                                        });
                        $('#formtambah').modal('hide');
                        window.reload(1);
                      }else{
                        new PNotify({
                                        title: 'Sukses',
                                        text: 'Tambah Kontak Gagal',
                                        type: 'error',
                                        hide: true,
                                        styling: 'bootstrap3'
                                      });
                      }
                    }
                  });
                });                
                $('#editcontact').on('submit', function(e){
                  e.preventDefault();
                  $.ajax({
                    type: 'post',
                    url: '<?=base_url('kontak/Kontak/update')?>',
                    data: $('#editcontact').serialize(),
                    success: function (i) {
                      if(i == 'true'){
                        new PNotify({
                                            title: 'Sukses',
                                            text: 'Tambah Kontak Sukses',
                                            type: 'success',
                                            hide: true,
                                            styling: 'bootstrap3'
                                        });
                        $('#formedit').modal('hide');
                        window.reload();
                      }else{
                        new PNotify({
                                        title: 'Sukses',
                                        text: 'Tambah Kontak Gagal',
                                        type: 'error',
                                        hide: true,
                                        styling: 'bootstrap3'
                                      });
                      }
                    }
                  });
                });
                $('#deletecontact').on('submit', function(e){
                  e.preventDefault();
                  $.ajax({
                    type: 'post',
                    url: '<?=base_url('kontak/Kontak/delete')?>',
                    data: $('#deletecontact').serialize(),
                    success: function (i) {
                      if(i == 'true'){
                        new PNotify({
                                            title: 'Sukses',
                                            text: 'Tambah Kontak Sukses',
                                            type: 'success',
                                            hide: true,
                                            styling: 'bootstrap3'
                                        });
                        $('#formhapus').modal('hide');
                        window.reload();
                      }else{
                        new PNotify({
                                        title: 'Gagal',
                                        text: 'Tambah Kontak Gagal',
                                        type: 'error',
                                        hide: true,
                                        styling: 'bootstrap3'
                                      });
                      }
                    }
                  });
                });



                var oTable;

                /* Add a click handler to the rows - this could be used as a callback */
                $("#example tbody tr").click(function(e){
                    if($(this).hasClass('selected')){
                        $(this).removeClass('selected');
                    }else{
                        oTable.$('tr.selected')//.removeClass('row_selected');
                        $(this).addClass('selected');
                    }
                });


                /* Add a click handler for the delete row */
                $('#delete').click(function(){
                    var anSelected = fnGetSelected(oTable);
                    $(anSelected).remove();
                });


                /* Init the table */
                oTable = $('#example').dataTable( );

                /* Get the rows which are currently selected */
                function fnGetSelected(oTableLocal){
                    return oTableLocal.$('tr.selected');
                }
            });
        </script>