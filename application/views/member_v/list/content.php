<style>
    .dataTables_filter{
        float: right;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ege Sedef Avize Sipariş Listesi
            <a href="<?php echo base_url("member/yeni_ekle"); ?>" class="btn btn-outline btn-primary btn-sm pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Sipariş Listesi</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="table-responsive">
                        <table id="table" class="table table-hover table-striped table-bordered content-container" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th style="text-align: center;">İsim Soyisim</th>
                                    <th style="text-align: center;">Ürünü Aldığı Site</th>
                                    <th style="text-align: center;">Sipariş No</th>
                                    <th style="text-align: center;">Ürün Adı</th>
                                    <th style="text-align: center;">Adet</th>
                                    <th style="text-align: center;">Fatura No</th>
                                    <th style="text-align: center;">İade</th>
                                    <th style="text-align: center;">Detaylar</th>
                                    <th style="text-align: center;">Düzenle</th>
                                    <th style="text-align: center;">Sil</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center"></tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
