<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
               <h4><?php echo  "<b>$item->title </b> Kaydı Düzenliyorsunuz";?></h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("site/guncelle/$item->id");?>" method="post" >

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Site Adı</label>
                                <input type="text" class="form-control" placeholder="Site Adı" name="title" value="<?php echo $item->title;?>">
                            </div>

                            <div class="form-group">
                                <label>Cari Kodu</label>
                                <input type="text" class="form-control" placeholder="Cari Kodu" name="site_code" value="<?php echo $item->site_code;?>">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
                    <a href="<?php echo base_url("site");?>" class="btn btn-md btn-danger">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
</div><!-- END column -->
</div>




