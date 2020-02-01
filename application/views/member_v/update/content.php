<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
               <h4><?php echo  "<b>$item->full_name </b> Kaydı Düzenliyorsunuz";?></h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("member/guncelle/$item->id");?>" method="post" >

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adı Soyadı</label>
                                <input type="text" class="form-control" placeholder="Adı Soyadı" name="full_name" value="<?php echo $item->full_name;?>">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("full_name"); ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>İl</label>
                                <input type="text" class="form-control" placeholder="İl" name="province" value="<?php echo $item->province;?>">
                            </div>

                            <div class="form-group">
                                <label>İlçe</label>
                                <input type="text" class="form-control" placeholder="İl" name="district" value="<?php echo $item->district;?>">
                            </div>

                            <div class="form-group">
                                <label>Telefon</label>
                                <input type="text" class="form-control" placeholder="Telefon Numarası" name="phone" value="<?php echo $item->phone;?>">
                            </div>

                            <div class="form-group">
                                <label>Ürünü Aldığı Site</label>
                                <input type="text" class="form-control" placeholder="Ürünü Aldığı Site" name="site" value="<?php echo $item->site;?>">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("site"); ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Siparis Numarası</label>
                                <input type="text" class="form-control" placeholder="Siparis Numarası" name="siparisNo" value="<?php echo $item->siparisNo;?>">
                            </div>

                            <div class="form-group">
                                <label>Siparis Tarihi</label>
                                <input type="text" class="form-control" placeholder="Siparis Tarihi" name="siparisTarihi" value="<?php echo $item->siparisTarihi;?>">
                            </div>

                            <div class="form-group">
                                <label>Fatura No</label>
                                <input type="text" class="form-control" placeholder="Fatura No" name="faturaNo" value="<?php echo $item->faturaNo;?>">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("faturaNo"); ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Ürün Adı</label>
                                <input type="text" class="form-control" placeholder="Ürün Adı" name="urunAdi" value="<?php echo $item->urunAdi;?>">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("urunAdi"); ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Ürün Adet</label>
                                <input type="text" class="form-control" placeholder="Ürün Adet" name="urunAdet" value="<?php echo $item->urunAdet;?>">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("urunAdet"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ürün Fiyatı</label>
                                <input type="text" class="form-control" placeholder="Ürün Fiyatı" name="urunFiyat" value="<?php echo $item->urunFiyat;?>">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("urunFiyat"); ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Stok Kodu</label>
                                <input type="text" class="form-control" placeholder="Stok Kodu" name="stock_code" value="<?php echo $item->stock_code;?>">
                            </div>

                            <div class="form-group">
                                <label>Kargo Firması</label>
                                <input type="text" class="form-control" placeholder="Kargo Firması" name="kargo_firmasi" value="<?php echo $item->kargo_firmasi;?>">
                            </div>

                            <div class="form-group">
                                <label>Kargo Bedeli</label>
                                <input type="text" class="form-control" placeholder="Kargo Bedeli" name="kargo_bedeli" value="<?php echo $item->kargo_bedeli;?>">
                            </div>

                            <div class="form-group">
                                <label>Hizmet Bedeli</label>
                                <input type="text" class="form-control" placeholder="Hizmet Bedeli" name="hizmet_bedeli" value="<?php echo $item->hizmet_bedeli;?>">
                            </div>

                            <div class="form-group">
                                <label>Komisyon Bedeli</label>
                                <input type="text" class="form-control" placeholder="Komisyon Bedeli" name="komisyon_bedeli" value="<?php echo $item->komisyon_bedeli;?>">
                            </div>

                            <div class="form-group">
                                <label>İade Fatuası</label>
                                <input type="text" class="form-control" placeholder="İade Faturası" name="iade_faturasi" value="<?php echo $item->iade_faturasi;?>">
                            </div>

                            <div class="form-group">
                                <label>İade</label>
                                <input type="text" class="form-control" placeholder="İade" name="iade" value="<?php echo $item->iade;?>">
                            </div>

                            <div class="form-group">
                                <label>Tarih</label>
                                <input type="text" class="form-control" placeholder="Tarih" name="createdAt" value="<?php echo $item->createdAt;?>"disabled>
                            </div>


                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="desc" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                                    <?php echo $item->desc; ?>
                                </textarea>
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
                    <a href="<?php echo base_url("member");?>" class="btn btn-md btn-danger">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
</div><!-- END column -->
</div>




