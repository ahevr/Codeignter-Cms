<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Site Listesi
            <?php if (isAdmin()) { ?>
                <a href="<?php echo base_url("site/yeni_ekle"); ?>" class="btn btn-outline btn-primary btn-sm pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            <?php } ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("site/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="w50">#id</th>
                        <th class="text-center">Site Adı</th>
                        <th>Cari Kodu</th>
                        <th class="text-center">İşlem</th>
                    </thead>
                    <tbody>

                    <?php foreach($items as $item) { ?>

                        <tr>
                            <td class="text-center" style="width: 50px;">#<?php echo $item->id; ?></td>
                            <td class="text-center"><?php echo $item->title; ?></td>
                            <td class="text-center" style="width: 100px;"><?php echo $item->site_code; ?></td>
                            <td class="text-center" style="width: 450px;">
                                <button
                                        data-url="<?php echo base_url("site/sil/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                                <a href="<?php echo base_url("site/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                            </td>
                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>


