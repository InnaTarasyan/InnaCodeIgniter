<html>
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
       <?php echo link_tag('assets/css/buttons.css'); ?>
       <?php echo link_tag('assets/css/comments.css'); ?>
       <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/comment-reply.js"></script>
       <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/myscripts.js"></script>
       <style>
           .responsive {
               width: 30%;
               height: auto;
           }
       </style>
   </head>
   <body>
   <div class="container">
       <div class="container" style="background-color: white">
           <div class="row justify-content-center">
               <div class="col-md-12">
                   <div class="card">
                       <div class="card-body">
                           <div class="wrap_result"></div>


                            <div class="w3-container">
                               <div style="text-align: center">
                                   <div class="site-title text-center ">
                                       <h3> Application - <?= $application->name ?> </h3>
                                   </div>
                                   <br/>

                                   <div class="row">
                                       <div class="col-lg-6">
                                          <img src="<?= base_url().'assets/images/apps/'.$application->img ?>" title="<?= $application->name ?>"  class="responsive" />
                                       </div>
                                       <div class="col-lg-6" style="text-align: left">
                                           <div style="text-indent: 50px;"> <?= $application->desc; ?>  </div>
                                       </div>
                                   </div>
                                   <br/>
                               </div>
                               <br/>
                               <div>
                                   <h5>Comments</h5>
                                   <br/>
                                   <div>
                                      <?php if(count($comments) > 0) { ?>
                                          <?php
                                              $com = array();
                                              foreach($comments as $val) {
                                                  $com[$val['parent_id']][] = $val;
                                              }
                                          ?>
                                          <ol class="commentlist group">
                                              <?php  foreach($com as $k => $comments) { ?>
                                                  <?php  if($k !== 0) {
                                                      break; } ?>
                                                  <?php $this->load->view('apps/comment', ['items' => $comments, 'com' => $com]); ?>
                                              <?php  } ?>
                                          </ol>
                                      <?php } ?>
                                   </div>
                               </div>
                           </div>
                           <br/>


                           <!-- END TRACKBACK & PINGBACK -->
                           <div id="respond">
                               <h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
                               <form action="<?= base_url(); ?>index.php/MyApp/index/<?= $application->id ?>#commentform" method="post" id="commentform">

                                   <p class="user-info comment-form-author"><label for="author">Name</label> <input id="name" name="name" type="text" value="" size="30" aria-required="true" /></p>
                                   <p class="user-info comment-form-email"><label for="email">Email</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>


                                   <p class="user-info comment-form-url"><label for="url">Website</label><input id="url" name="site" type="text" value="" size="30" /></p>

                                   <p class="comment-form-comment"><label for="comment">Your comment</label><textarea class="my-comment" id="comment" name="text" cols="45" rows="8"></textarea></p>
                                   <div class="clear"></div>

                                   <p class="form-submit">
                                       <input id="comment_post_ID" type="hidden" name="comment_post_ID" value="" />
                                       <input id="comment_parent" type="hidden" name="comment_parent" value="0" />
                                       <input name="submit" type="submit" id="submit" value="Post Comment" />
                                   </p>
                               </form>
                           </div>
                           <!-- #respond -->
                       </div>
                       <!-- END COMMENTS -->
                   </div>
               </div>
           </div>
       </div>
   </div>
   </body>
   <footer>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   </footer>
</html>