<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Kullanıcı Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("site/kaydet"); ?>" method="post">


                    <div class="form-group">
                        <label>Site Adı</label>
                        <input class="form-control" placeholder="Site Adını Giriniz" name="title">
                    </div>

                    <div class="form-group">
                        <label>Site Cari Bilgisi</label>
                        <input class="form-control" placeholder="Site Cari Kodunu Giriniz" name="site_code">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("site"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>