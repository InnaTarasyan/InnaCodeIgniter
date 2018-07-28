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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    <?php echo link_tag('assets/css/datatables.css'); ?>
    <?php echo link_tag('assets/css/modal.css'); ?>

<!--     That snippet will output this HTML:-->
<!--     <link href="http://site.com/assets/css/mystyles.css" rel="stylesheet" type="text/css" />-->
</head>
<body>

    <div class="site-title text-center ">
        <h3>Portfolio </h3>
    </div>

    <ul class="nav nav-tabs" style=" display: flex;justify-content: center;">
        <li class="active"><a data-toggle="tab" href="#portfolio">Android Applications</a></li>
        <li><a data-toggle="tab" href="#menu1">Web Applications</a></li>
    </ul>

    <div class="tab-content">
        <div id="portfolio" class="tab-pane fade in active">
            <h3 style="text-align: center">Android Applications</h3>
            <p>
                <div class="container">
                    <h2>Apps List</h2>
                    <div class="table-responsive">
                        <table id="app-table" class="table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <td style="text-align: center"> App Name </td>
                                    <td style="text-align: center"> App Description </td>
                                    <td style="text-align: center"> Image </td>
                                    <td style="text-align: center"> App URL </td>
                                    <td style="text-align: center"> Type </td>
                                    <td style="text-align: center"> Download Count </td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </p>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3 style="text-align: center"> Web Applications</h3>
            <p>
                <div class="container">
                    <h2>Web Apps Table</h2>
                    <br/>
                    <div class="table-responsive">
                        <table id="web-app-table" class="table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <td style="text-align: center"> App Name </td>
                                    <td style="text-align: center"> App Description </td>
                                    <td style="text-align: center"> Image </td>
                                    <td style="text-align: center"> App URL </td>
                                    <td style="text-align: center"> Type </td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </p>
        </div>
    </div>


    <div class="container">
        <div class="row text-center">
            <div class="site-title text-center ">
                <h3> Contact us </h3>
            </div>
            <br/> <br/>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="map" style="width:100%;height:20em;background:yellow"></div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="contact_us">
                <form action='<?= base_url(); ?>#contact_us' method="post">
                    <div class="m-demo__preview">
                        <div class="form-group m-form__group">
                            <input  class="form-control m-input m-input--square input-lg"  name="name" placeholder="Username">
                            <span style="color: red;"> <?= form_error('name') ?> </span>
                        </div>
                        <div class="form-group m-form__group">
                            <input type="text" class="form-control m-input input-lg" placeholder="Email" name="email">
                            <span style="color: red;"> <?= form_error('email') ?> </span>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <textarea name="text" class="form-control" data-provide="markdown" rows="15" placeholder="Text" id="editor"></textarea>
                                <span style="color: red;"> <?= form_error('text') ?> </span>
                            </div>
                        </div>
                        <button type="submit" class="btn m-btn--pill  btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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

<input type="hidden" value="<?php echo base_url() ?>" id="base_url">
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