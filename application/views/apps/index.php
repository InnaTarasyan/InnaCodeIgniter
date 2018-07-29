<!DOCTYPE html>
<html lang="en">
<head>
    <title>App Display</title>
    <?php $this->load->helper('html'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <meta name="description" content="I am Inna Tarasyan, I am web developer. ">
    <meta name="keywords" content="Inna Tarasyan, Laravel, Freelancer, PHP">
    <meta name="author" content="Inna Tarasyan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>

    <?php echo link_tag('assets/css/datatables.css'); ?>
    <?php echo link_tag('assets/css/modal.css'); ?>
    <?php echo link_tag('assets/css/home.css'); ?>
    <?php echo link_tag('assets/css/timeline.css'); ?>
    <?php echo link_tag('assets/css/about_us.css'); ?>

<!--     That snippet will output this HTML:-->
<!--     <link href="http://site.com/assets/css/mystyles.css" rel="stylesheet" type="text/css" />-->
</head>
<body>

</body>

<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- The Close Button -->
    <span class="close">&times;</span>
    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">
    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>

<br/>
<br/>

<?php
   $this->load->view('apps/menu');
   $this->load->view('apps/home');
   $this->load->view('apps/aboutUs');
   $this->load->view('apps/education');
   $this->load->view('apps/portfolio');
   $this->load->view('apps/contactUS');
?>

<div class="container">
    <button onclick="topFunction()" id="topBtn" title="Go to top"> Top </button>
</div>

<input type="hidden" value="<?php echo base_url() ?>" id="base_url">
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    function myMap() {
        var myCenter = new google.maps.LatLng(40.182344, 44.513337);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 6};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);
    }
</script>

<?php $this->config->load('custom_config'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('key');  ?>&callback=myMap"></script>
<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/home.js"></script>
</html>