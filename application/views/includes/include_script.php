<script src="<?php echo base_url("assets");?>/libs/bower/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url("assets");?>/libs/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url("assets");?>/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="<?php echo base_url("assets");?>/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
<script src="<?php echo base_url("assets");?>/libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url("assets");?>/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?php echo base_url("assets");?>/libs/bower/PACE/pace.min.js"></script>
<!-- endbuild -->

<?php $this->load->view("includes/library");?>
<script src="<?php echo base_url("assets");?>/assets/js/plugins.js"></script>
<script src="<?php echo base_url("assets");?>/assets/js/app.js"></script>
<!-- endbuild -->
<script src="<?php echo base_url("assets");?>/libs/bower/moment/moment.js"></script>
<script src="<?php echo base_url("assets");?>/libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url("assets");?>/libs/bower/switchery/dist/switchery.js"></script>
<script src="<?php echo base_url("assets");?>/assets/js/fullcalendar.js"></script>

<script src="<?php echo base_url("assets");?>/assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url("assets");?>/assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url("assets");?>/assets/js/iziToast.min.js"></script>

<script src="<?php echo base_url("assets");?>/assets/js/custom.js"></script>

<?php $this->load->view("includes/alert");?>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

<script src="<?php echo base_url("assets");?>/assets/stok/stok.js"></script>
<script src="<?php echo base_url("assets");?>/assets/map/map.js"></script>
<script src="<?php echo base_url("assets");?>/assets/harita/svg-turkiye-haritasi.js"></script>


<script>
    svgturkiyeharitasi();
</script>

<script type="text/javascript">
var table = $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "orderCellsTop": true,
        "fixedHeader": true,
        "ajax": {
            "url": "<?php echo site_url('member/datatables_data')?>",
            "type": "POST"
        },
        "language": {
            "url":"<?php echo base_url('assets/assets/Turkish.json')?>",
        },




    });

                $("#table").on("click",".btn-delete", function(){
                  Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu veriyi gerçekten silmek istiyor musunuz?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText:"Hayır Şaka Yaptım xd!"
            }).then((result) => {
            if (result.value) {
              window.location.href = $(this).data('url');
            }
            });
                });

</script>
