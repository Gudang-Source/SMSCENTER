        <section class="table-data">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <div class="action-grup">
                                <button id='delete' class="btn btn-default btn-delselect" title="Hapus data terpilih"> Hapus data terpilih <span class="glyphicon glyphicon-trash"></span></button>
                            </div>
                            <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th data-field="tanggal">Tanggal</th>
                                        <th data-field="jam">Jam</th>
                                        <th data-field="nomor">Nomor</th>
                                        <th data-field="konten">Konten</th>
                                        <th data-field="menu" class="col-menu">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>05 Sep 2016</td>
                                        <td>08:32</td>
                                        <td>Dharma Wanita</td>
                                        <td>Selamat Siang Ibu2 Dharma Wanita Polinema, hari ini ada rapat koordinasi terkait lomba busana kebaya dalam rangka memperingati hari Kartini. Rapat dilaksanakan pada jam 13.00 di Ruang Rapat.</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td>04 Sep 2016</td>
                                        <td>08:30</td>
                                        <td>PUDIR</td>
                                        <td>Yth. Bapak/Ibu Pembantu Direktur, Selamat Pagi, Dengan ini saya, Kartika selaku KaSubag PSI, menginformasikan bahwa hari ini akan dilaksanakan rapat terkait sosialisasi website SIAPPolinema pada jam 10.00 di Ruang Rapat. Sekian dan Terimakasih.</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td>03 Sep 2016</td>
                                        <td>07:00</td>
                                        <td>ALL UNIT</td>
                                        <td>Yth. Bapak/Ibu, Selamat Pagi, Innalillahi wa innalillahi rajiuun, Telah berpulang Ayah dari saudara kita, Ibu Salamah dari unit Akademik, pada jam 19.00 tanggal 2 September 2016. Melalui ini pula, kami berharap keluarga yang ditinggalkan dapat diberikan ketabahan. Sekian dan terimakasih.</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                                
                                <div class="modal fade" id="formpesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Form Pesan</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form name="tambahcontact" id="tambahcontact" method="" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Kontak:</label>
                                                        <input type="text" name="contactreply" class="form-control" id="contactreply" placeholder="Masukkan Kontak">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Isi Pesan:</label>
                                                        <textarea name="msgreply" class="form-control" id="msgreply" placeholder="Isi Pesan" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="sumbitcontact" id="submitcontact" value="Kirim" class="btn btn-default">
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
                    buttons: ['excel', 'pdf', 'print'],
                    "order": [[ 0, "desc" ]]
                });
            });
            
            $(document).ready(function(){
                var oTable;

                /* Add a click handler to the rows - this could be used as a callback */
                $("#example tbody tr").click( function( e ) {
                    if ( $(this).hasClass('selected') ) {
                        $(this).removeClass('selected');
                    }else {
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