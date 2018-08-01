<?php
   $user_id=$this->session->userdata('user_id');
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" >
                <span class="glyphicon glyphicon-home"></span>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <?php if(isset($menu)) { ?>
                <?php foreach ($menu as $item){ ?>
                    <li> <a href="<?php echo base_url().$item->path;;?>"> <?= $item->title; ?> </a>  </li>
                <?php  }} ?>
            </ul>
            <?php if(isset($user_id)) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="<?php echo base_url('user/user_logout');?>" > Logout </a> </li>
                </ul>
            <?php } ?>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>