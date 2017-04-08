<section class="table-data phone-book">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <div class="action-grup">
                                <button id='tambah' class="btn btn-default btn-add" title="Tambah data baru" data-toggle="modal" data-target="#formbaru"> Tambah Grup <span class="glyphicon glyphicon-plus"></span></button>
<!--                                 <button id='tambah' class="btn btn-default btn-add" title="Tambah data baru" data-toggle="modal" data-target="#formtambah"> Tambah Kontak ke Grup <span class="glyphicon glyphicon-plus-sign"></span></button> -->
<!--                                 <button id='delete' class="btn btn-default btn-delselect" title="Hapus data terpilih"> Hapus <span class="glyphicon glyphicon-trash"></span></button> -->
<!--                                 <button id='delete' class="btn btn-default btn-import" title="Impor data dari komputer" data-toggle="modal" data-target="#formimpor"> Impor <span class="glyphicon glyphicon-folder-open"></span></button>
                                 -->
                                <div class="modal fade" id="formbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah Grup Baru</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="tambahgrup" id="tambahgrup" method="" action="">
                                                    <div class="form-group modal-select">
                                                        <label for="message-text" class="control-label">Nama Grup:</label>
                                                        <input type="text" name="namegrup" class="form-control" id="namegrup" placeholder="Masukkan Nama Grup Baru">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="sumbitcontact" id="submitcontact" value="Simpan" class="btn btn-default">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="formtambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah Kontak ke Grup</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="tambahcontact" id="tambahcontact" method="" action="">
                                                    <div class="form-group modal-select">
                                                        <label for="message-text" class="control-label">Grup:</label>
                                                        <select data-placeholder="Pilih Grup" name="grupcontact" id="grupcontact" multiple class="form-control chosen-select" tabindex="-1">
                                                            <option value=""></option>
                                                            <option value="1">All Unit</option>
                                                            <option value="2">KaSubag</option>
                                                            <option value="3">KPS</option>
                                                            <option value="4">PJKelas</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group modal-select">
                                                        <label for="message-text" class="control-label">Kontak:</label>
                                                        <select data-placeholder="Pilih Kontak" name="grupcontact" id="grupcontact" multiple class="form-control chosen-select" tabindex="-1">
                                                            <option value=""></option>
                                                            <option value="1">Achmad Komarudin</option>
                                                            <option value="2">Hari Siregar</option>
                                                            <option value="3">Kartika Windrajanti</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="sumbitcontact" id="submitcontact" value="Simpan" class="btn btn-default">
                                                    </div>
                                                </form>
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
                                        <th>Nama Grup</th>
                                        <th>Kontak</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $data = modules::run('grup/Grup/data'); ?>
                                <?php foreach ($data->result_array() as $rowGrup) { ?> 
                                    <tr>
                                        <td><?=$rowGrup['grup']?></td>
                                        <td>
                                            <?php $dataKontak = modules::run('grup/Grup/getKontakGrup', $rowGrup['ID']); ?>
                                            <?php
                                                foreach ($dataKontak->result_array() as $rowKontak) {
                                            ?>
                                                <label class="label label-info info-grup"><?=$rowKontak['nama']?></label>
                                            <?php        
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="#" class="label save" title="Ubah" data-toggle="modal" data-target="#formedit" onclick="getDataGrup(<?=$rowGrup['ID']?>)"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="#" class="label delete" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                
                                <div class="modal fade" id="formedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah Kontak</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="editgrup" id="editgrup" method="POST" action="">
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Grup:</label>
                                                        <input type="text" name="namecontact" class="form-control" id="enamecontact" placeholder="Masukkan Nama Grup Baru" disabled="disabled">
                                                        <input type="hidden" name="id_grup" class="form-control" id="eidcontact" placeholder="Masukkan Nama Grup Baru">
                                                    </div>
                                                    <div class="form-group modal-select">
                                                        <label for="message-text" class="control-label">Pilih Kontak:</label>
                                                        <select data-placeholder="Pilih Kontak" name="id_kontak" id="egrupcontact" multiple class="form-control chosen-select" tabindex="-1">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="sumbitcontact" id="submitcontact" value="Simpan" class="btn btn-default">
                                                    </div>
                                                </form>
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
            function getDataGrup(id){
                var select = document.getElementById("grupcontact");
                $.ajax({
                    type: 'get',
                    url: '<?=base_url('kontak/Kontak/getKontakGrup')?>/'+id,
                    data: $('#tambahcontact').serialize(),
                    success: function (i) {
                        var jsonObjectParse = JSON.parse(i);
                        var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                        var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                        // console.log(jsonObjectFinal.status);
                        if (jsonObjectFinal.status == "1") {
                            $("#enamecontact").val(jsonObjectFinal.nama_grup);
                            $("#eidcontact").val(jsonObjectFinal.id_grup);
                            var result = jsonObjectFinal.list;
                            for (var i = 0; i < result.length; i++) {                            
                                $("#egrupcontact").append(new Option(result[i].nama, result[i].ID));
                            }
                            $('#egrupcontact').chosen().trigger("chosen:updated");                
                            $('#egrupcontact').chosen().trigger("liszt:updated");                          
                        }else{
                        }
                    }
                });
            }
        </script>
        
        <!-- Datatables -->
        <script type="text/javascript" src="<?=base_url('assets/plugins/datatables/datatables.min.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#tambahgrup").on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: '<?=base_url('grup/Grup/tambahGrup')?>',
                        data: $('#tambahgrup').serialize(),
                        success: function (i) {
                            var jsonObjectParse = JSON.parse(i);
                            var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                            var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                            if (jsonObjectFinal.status == "2") {
                                $("#formbaru").modal("hide");
                            }else{
                            }
                        }
                    });                    
                });
                $("#editgrup").on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: '<?=base_url('grup/Grup/tambahContact')?>',
                        data: $('#editgrup').serialize(),
                        success: function (i) {
                            var jsonObjectParse = JSON.parse(i);
                            var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                            var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                            if (jsonObjectFinal.status == "2") {
                                $("#formedit").modal("hide");
                            }else{
                            }
                        }
                    });

                });

                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['excel', 'pdf', 'print']
                });
            });
            
            $(document).ready(function(){
                var oTable;

                /* Add a click handler to the rows - this could be used as a callback */
                $("#example tbody tr").click(function(e){
                    if($(this).hasClass('selected')){
                        // $(this).removeClass('selected');
                    }else{
                        // oTable.$('tr.selected')//.removeClass('row_selected');
                        // $(this).addClass('selected');
                    }
                });


                /* Add a click handler for the delete row */
                $('#delete').click(function(){
                    // var anSelected = fnGetSelected(oTable);
                    // $(anSelected).remove();
                });


                /* Init the table */
                oTable = $('#example').dataTable( );

                /* Get the rows which are currently selected */
                function fnGetSelected(oTableLocal){
                    // return oTableLocal.$('tr.selected');
                }
            });
        </script>