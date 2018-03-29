</section>
</section>
<!--main content end-->
</section>
<!-- container section start -->
<script src="{!! asset('smart/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('smart/js/jquery.scrollTo.min.js') !!}"></script>
<script src="{!! asset('smart/js/jquery.nicescroll.js') !!}" type="text/javascript"></script>

<!-- bootstrap -->

<!-- nice scroll -->
<!-- charts scripts -->
<script src="{!! asset('smart/assets/jquery-knob/smart/js/jquery.knob.js') !!}"></script>
<script src="{!! asset('smart/js/jquery.sparkline.js" type="text/javascript') !!}"></script>
<script src="{!! asset('smart/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') !!}"></script>
<script src="{!! asset('smart/js/owl.carousel.js') !!}" ></script>
<!-- jQuery full calendar -->
<<script src="{!! asset('smart/js/fullcalendar.min.js') !!}"></script> <!-- Full Google Calendar - Calendar -->
<script src="{!! asset('smart/assets/fullcalendar/fullcalendar/fullcalendar.js') !!}"></script>
<!--script for this page only-->
<script src="{!! asset('smart/js/calendar-custom.js') !!}"></script>
<script src="{!! asset('smart/js/jquery.rateit.min.js') !!}"></script>
<!-- custom select -->
<script src="{!! asset('smart/js/jquery.customSelect.min.js') !!}" ></script>
<script src="{!! asset('smart/assets/chart-master/Chart.js') !!}"></script>

<!--custome script for all page-->
<script src="{!! asset('smart/js/scripts.js') !!}"></script>
<!-- custom script for this page-->
<script src="{!! asset('smart/js/sparkline-chart.js') !!}"></script>
<script src="{!! asset('smart/js/easy-pie-chart.js') !!}"></script>
<script src="{!! asset('smart/js/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! asset('smart/js/jquery-jvectormap-world-mill-en.js') !!}"></script>
<script src="{!! asset('smart/js/xcharts.min.js') !!}"></script>
<script src="{!! asset('smart/js/jquery.autosize.min.js') !!}"></script>
<script src="{!! asset('smart/js/jquery.placeholder.min.js') !!}"></script>
<script src="{!! asset('smart/js/gdp-data.js') !!}"></script>
<script src="{!! asset('smart/js/morris.min.js') !!}"></script>
<script src="{!! asset('smart/js/sparklines.js') !!}"></script>
<script src="{!! asset('smart/js/charts.js') !!}"></script>
<script src="{!! asset('smart/js/jquery.slimscroll.min.js') !!}"></script>
<script>

    //knob
    $(function() {
        $(".knob").knob({
            'draw' : function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function(){
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code){
                el.html(el.html()+' (GDP - '+gdpData[code]+')');
            }
        });
    });



</script>

</body>
</html>
