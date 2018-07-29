<div class="container" id="contactUs">
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