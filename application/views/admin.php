<html>

<head>
    <?php $this->load->view('components/headerAdmin'); ?>
</head>

<body>
    <h1>Halo</h1>
    <?php $this->load->view('components/script'); ?>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('a.galleryAdmin').simpleLightbox();
        });
    </script>
</body>

</html>