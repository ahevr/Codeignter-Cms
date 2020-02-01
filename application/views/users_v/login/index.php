<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/head");?>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_style");?>

    <style>
        .mySlides {
            position: fixed;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="scs">
<div class="w3-content w3-section">
    <img class="mySlides" src="uploads/02.jpg">
    <img class="mySlides" src="uploads/03.jpg">
    <img class="mySlides" src="uploads/04.jpg">
    <img class="mySlides" src="uploads/05.jpg">
    <img class="mySlides" src="uploads/06.jpg">
    <img class="mySlides" src="uploads/07.jpg">
    <img class="mySlides" src="uploads/08.jpg">
    <img class="mySlides" src="uploads/09.jpg">
    <img class="mySlides" src="uploads/10.jpg">
    <img class="mySlides" src="uploads/11.jpg">
    <img class="mySlides" src="uploads/12.jpg">
    <img class="mySlides" src="uploads/13.jpg">
    <img class="mySlides" src="uploads/14.jpg">
    <img class="mySlides" src="uploads/15.jpg">
    <img class="mySlides" src="uploads/16.jpg">
    <img class="mySlides" src="uploads/17.jpg">
    <img class="mySlides" src="uploads/18.jpg">
    <img class="mySlides" src="uploads/19.jpg">
    <img class="mySlides" src="uploads/20.jpg">
    <img class="mySlides" src="uploads/21.jpg">
    <img class="mySlides" src="uploads/22.jpg">
    <img class="mySlides" src="uploads/23.jpg">
    <img class="mySlides" src="uploads/24.jpg">
    <img class="mySlides" src="uploads/25.jpg">
    <img class="mySlides" src="uploads/26.jpg">
    <img class="mySlides" src="uploads/27.jpg">
    <img class="mySlides" src="uploads/28.jpg">
    <img class="mySlides" src="uploads/29.jpg">
    <img class="mySlides" src="uploads/30.jpg">

</div>
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/content");?>

<?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_script");?>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 10000); // Change image every 2 seconds
    }
</script>
</body>
</html>