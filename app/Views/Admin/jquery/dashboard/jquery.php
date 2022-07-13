<script src="<?= base_url('') ?>/public/lp/assets/OwlCarousel/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        stagePadding: 50,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        nav: true,
        dots: true,
        loop: true,
        responsive: {
            0: {
                stagePadding: 20,
                items: 1,
                nav: false

            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1400: {
                items: 4
            }
        }
    });

    $('.ruangan').on('click', function() {
        id = $(this).data('id');
        var student = '';
        $.ajax({
            url: "<?= base_url('Admin/Dashboard/getRuanganKategori'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                var i = 1;
                if (data['length'] > 0) {
                    $.each(data, function(index, item) {
                        bed = item.jml_bed - item.count
                        student += '<tr>';
                        student += '<td>' + item.kategori + '</td>';
                        student += '<td>' + bed + '</td>';
                        student += '<td>' + item.jml_bed + '</td>';
                        student += '<td>' + item.count_l + '</td>';
                        student += '<td>' + item.count_p + '</td>';
                        student += '</tr>';
                        i++;
                    });
                } else {
                    student += '<td colspan="3" class="dataTables_empty" valign="top">No data available in table</td>';
                }
                $('#dataLanding tbody').html(student);

            }
        });
    });

    $(document).ready(function() {
        $('#dataLanding').DataTable({
            "length": false,
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false
        });
    });
</script>