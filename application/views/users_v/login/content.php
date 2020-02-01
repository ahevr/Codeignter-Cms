<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="index.html">
            <span><i class="fa fa-gg"></i></span>
            <span><b>Ege Sedef</b> Aydınlatma</span>
        </a>
    </div>
    <div class="simple-page-form animated flipInY" id="login-form">
        <div class="fullBackground"></div>
        <h4 class="form-title m-b-xl text-center">Yönetim Paneline Erişmek İçin Lütfen Giriş Yapınız</h4>
        <form action="<?php echo base_url("userop/do_login");?>" method="post">
            <div class="form-group">
                <input id="sign-in-email" type="email" class="form-control" placeholder="Email" name="user_email">
                <?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("user_email"); ?></small>
                <?php } ?>
            </div>
            <div class="form-group">
                <input id="sign-in-password" type="password" class="form-control" placeholder="Şifre" name="user_password">
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div>
</div>