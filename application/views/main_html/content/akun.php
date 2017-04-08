        <section class="table-data phone-book">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <div class="action-grup">
                                <button id='tambah' class="btn btn-default btn-add" title="Tambah data baru" data-toggle="modal" data-target="#formtambah"> Tambah <span class="glyphicon glyphicon-plus"></span></button>
                                <button id='delete' class="btn btn-default btn-delselect" title="Hapus data terpilih"> Hapus <span class="glyphicon glyphicon-trash"></span></button>
                                <button id='delete' class="btn btn-default btn-import" title="Impor data dari komputer" data-toggle="modal" data-target="#formimpor"> Impor <span class="glyphicon glyphicon-folder-open"></span></button>
                                
                                <div class="modal fade" id="formtambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah Akun Baru</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="tambahcontact" id="tambahcontact" method="" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Username:</label>
                                                        <input type="text" name="namecontact" class="form-control" id="namecontact" placeholder="Masukkan Username Akun">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Email:</label>
                                                        <input type="email" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan Email Akun">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Password:</label>
                                                        <input type="password" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan Password Akun">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Masukkan kembali Password:</label>
                                                        <input type="password" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan kembali Password Akun">
                                                    </div>
                                                    <div class="form-group modal-select">
                                                        <label for="message-text" class="control-label">Unit:</label>
                                                        <select name="grupcontact" id="grupcontact" class="form-control">
                                                            <option value="0">- Pilih Unit -</option>
                                                            <option value="1">SubBag PSI</option>
                                                            <option value="2">SubBag Akademik</option>
                                                            <option value="3">SubBag Keuangan</option>
                                                            <option value="4">SubBag Administrasi</option>
                                                        </select>
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
                                                <h4 class="modal-title" id="exampleModalLabel">Impor Akun</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="tambahakun" id="tambahakun" method="" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Impor data akun (csv):</label>
                                                        <input type="file" name="fileakun" class="form-control" id="filecontact">
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
                                        <th>Email</th>
                                        <th>Unit</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Achmad Komarudin</td>
                                        <td>budi@polinema.ac.id</td>
                                        <td><label class="label label-info info-grup">SubBag Akademik</label></td>
                                        <td>
                                            <a href="#" class="label save" title="Ubah" data-toggle="modal" data-target="#formedit"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="#" class="label delete" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kartika Windrajanti</td>
                                        <td>kartika@polinema.ac.id</td>
                                        <td><label class="label label-info info-grup">SubBag PSI</label></td>
                                        <td>
                                            <a href="#" class="label save" title="Ubah" data-toggle="modal" data-target="#formedit"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="#" class="label delete" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hari Siregar</td>
                                        <td>hari@yahoo.co.id</td>
                                        <td><label class="label label-info info-grup">SubBag Keuangan</label></td>
                                        <td>
                                            <a href="#" class="label save" title="Ubah" data-toggle="modal" data-target="#formedit"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="#" class="label delete" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                                        </td>
                                    </tr>
                                </tbody>
                                
                                <div class="modal fade" id="formedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah Akun Baru</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="tambahcontact" id="tambahcontact" method="" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Username:</label>
                                                        <input type="text" name="namecontact" class="form-control" id="namecontact" placeholder="Masukkan Username Akun">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Email:</label>
                                                        <input type="email" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan Email Akun">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Password:</label>
                                                        <input type="password" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan Password Akun">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Masukkan kembali Password:</label>
                                                        <input type="password" name="numcontact" class="form-control" id="numcontact" placeholder="Masukkan kembali Password Akun">
                                                    </div>
                                                    <div class="form-group modal-select">
                                                        <label for="message-text" class="control-label">Unit:</label>
                                                        <select name="grupcontact" id="grupcontact" class="form-control">
                                                            <option value="0">- Pilih Unit -</option>
                                                            <option value="1">SubBag PSI</option>
                                                            <option value="2">SubBag Akademik</option>
                                                            <option value="3">SubBag Keuangan</option>
                                                            <option value="4">SubBag Administrasi</option>
                                                        </select>
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
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Javascript -->
        <script type="text/javascript" src="<?=base_url('assets/js/jquery-2.2.4.min.js')?>"></script>
        
        <!-- Datatables -->
        <script type="text/javascript" src="<?=base_url('assets/plugins/datatables/Bootstrap-3.3.6/js/bootstrap.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/plugins/datatables/datatables.min.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
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