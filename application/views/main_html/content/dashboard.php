        <section class="welcome">
            <div class="container">
                <div class="row">
                    <img src="<?=base_url('assets/images/icons/smartphone.png')?>" width="438" height="761" alt="Envelope Icon" class="img-responsive">
                    <div class="title">
                        <h1>SMS Center</h1>
                        <h3>Politeknik Negeri Malang</h3>            
                    </div>
                </div>
            </div>
        </section>
        
        <section class="notification">
            <div class="container">
                <div class="row">
                    <div class="notif-date">
                        <p class="today"><span class="glyphicon glyphicon-calendar"></span> <?=date('l')?>, <?=date('d M Y')?></p>
                        <div class="date-separator"></div>
                    </div>
                    <div class="content-msg">
                        <div class="message">
                            <p class="msg-title"><span class="glyphicon glyphicon-envelope"></span> Pesan Masuk</p>
                            <div class="msg-info">
                                <?php
                                    $timeCur = "00:00";
                                    if($lastInbox != 'false'){
                                        $time = new DateTime($lastInbox->row()->ReceivingDateTime);
                                        $timeCur = $time->format("H:i:s");
                                        $timeCur = explode(":", $timeCur);
                                    }
                                ?>
                                <span class="time"><?=$timeCur[0]?>:<?=$timeCur[1]?></span>
                                <a href="tel:<?=$lastInbox!='false'?$lastInbox->row()->SenderNumber:"No Data"?>"><?=$lastInbox!='false'?$lastInbox->row()->SenderNumber:"No Data"?></a>
                                <p class="msg-detail"><?=$lastInbox!='false'?$lastInbox->row()->Text:"No Data"?></p>
                            </div>
                        </div>
                        <div class="message">
                            <p class="msg-title"><span class="glyphicon glyphicon-send"></span> Pesan Keluar</p>
                            <div class="msg-info">
                                <?php
                                    $timeCur = "00:00";
                                    if($lastSent != 'false'){
                                        $time = new DateTime($lastSent->row()->DeliveryDateTime);
                                        $timeCur = $time->format("H:i:s");
                                        $timeCur = explode(":", $timeCur);
                                    }
                                ?>
                                <span class="time"><?=$timeCur[0]?>:<?=$timeCur[1]?></span>
                                <a href="#"><?=$lastSent!='false'?$lastSent->row()->DestinationNumber:"No Data"?></a>
                                <p class="msg-detail">
                                    <?=$lastSent!='false'?$lastSent->row()->TextDecoded:"No Data"?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Javascript -->
        <script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js')?>"></script>
                
        <!-- Bootstrap -->
        <script type="text/javascript" src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>        