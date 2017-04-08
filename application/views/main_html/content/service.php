<html>
 <head>
    <title>Dashboard SMS Center Polinema</title>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="SMS Center Politeknik Negeri Malang">
    <meta name="author" content="ILLYIN Studio">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="icon" sizes="178x68" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" sizes="178x68" href="images/icons/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/main.css')?>">

   <script type="text/javascript">
  function ajaxrunning()
  {
   if (window.XMLHttpRequest)
   {
    xmlhttp=new XMLHttpRequest();
   }
   else
   {
    xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
   }
 
   xmlhttp.onreadystatechange=function()
   {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    }
   }
 
   xmlhttp.open("GET","<?=base_url('admin/service/getallsms')?>");
   xmlhttp.send();
   setTimeout("ajaxrunning()", 5000);
  }
</script>
 </head>
 <body onload="ajaxrunning()">
 <div class="panel panel-default"> 
   <h1>SERVICE SMS GATEWAY, PLEASE DONT CLOSE THIS WINDOW!!!!</h1>
   <h3>SMS Server running...</h3>
 </div>
 </body>  
</html>

