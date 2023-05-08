<!-- /.content-wrapper -->
<footer class="main-footer">
  {{--  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>--}}
</footer>

</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script >
    var speakers = document.getElementById('speakers')
    var add_more_fields = document.getElementById('add_more_fields');
    var remove_fields = document.getElementById('remove_fields');
    console.log(speakers)
    console.log(add_more_fields)
    console.log(remove_fields)
    add_more_fields.onclick = function(){
        var newField = document.createElement('input');
        newField.setAttribute('type','text');
        newField.setAttribute('style','margin-top: 5px');
        newField.setAttribute('name','speakers[]');
        newField.setAttribute('class','form-control speakers');
        newField.setAttribute('siz',50);
        newField.setAttribute('placeholder','Спикер');
        speakers.appendChild(newField);
    }

    remove_fields.onclick = function(){
        var input_tags = speakers.getElementsByTagName('input');
        if(input_tags.length > 0) {
            speakers.removeChild(input_tags[(input_tags.length) - 1]);
        }
    }
    document.getElementById('print-values-btn').onclick = function() {
        let allTextBoxes = document.getElementsByName('speakers[]');
        for(let i of allTextBoxes){
            console.log(i.value) //here you will be able to see all values in the console
        }
    }

</script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
{{--<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
</script>--}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('#preview').html('<img class="img-bordered" src="'+event.target.result+'" width="250" height="auto"/>');
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    $("#cover").change(function () {
        imagePreview(this);
    });
</script>
<script>

    const uploadInput = document.getElementById("file");
    uploadInput.addEventListener(
        "change",
        () => {
            // Calculate total size
            let numberOfBytes = 0;
            for (const file of uploadInput.files) {
                numberOfBytes += file.size;
            }

            // Approximate to the closest prefixed unit
            const units = [
                "Б",
                "КиБ",
                "МиБ",
                "ГиБ",
                "ТиБ",
                "ПиБ",
                "ЕиБ",
                "ЗиБ",
                "ЙиБ",
            ];
            const exponent = Math.min(
                Math.floor(Math.log(numberOfBytes) / Math.log(1024)),
                units.length - 1
            );
            const approx = numberOfBytes / 1024 ** exponent;
            const output =
                exponent === 0
                    ? `${numberOfBytes} байтс`
                    : `${approx.toFixed(3)} ${
                        units[exponent]
                    } (${numberOfBytes} байтс)`;

            document.getElementById("fileNum").textContent = uploadInput.files.length;
            document.getElementById("fileSize").textContent = output;
        },
        false
    );
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>

<script src="{{asset('plugins/fullcalendar/main.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{asset('dist/js/demo.js')}}"></script>--}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>--}}

@yield('scripts')

<input type="file" multiple="multiple" class="dz-hidden-input" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
<div class="daterangepicker ltr show-calendar opensright" style="top: 1611.16px; left: 1143.5px; right: auto; display: none;"><div class="ranges"></div><div class="drp-calendar left"><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><span></span></th><th colspan="5" class="month">Apr 2023</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off ends available" data-title="r0c0">26</td><td class="off ends available" data-title="r0c1">27</td><td class="off ends available" data-title="r0c2">28</td><td class="off ends available" data-title="r0c3">29</td><td class="off ends available" data-title="r0c4">30</td><td class="off ends available" data-title="r0c5">31</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="weekend available" data-title="r1c6">8</td></tr><tr><td class="weekend available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="today active start-date active end-date available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="weekend available" data-title="r3c6">22</td></tr><tr><td class="weekend available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="weekend available" data-title="r4c6">29</td></tr><tr><td class="weekend available" data-title="r5c0">30</td><td class="off ends available" data-title="r5c1">1</td><td class="off ends available" data-title="r5c2">2</td><td class="off ends available" data-title="r5c3">3</td><td class="off ends available" data-title="r5c4">4</td><td class="off ends available" data-title="r5c5">5</td><td class="weekend off ends available" data-title="r5c6">6</td></tr></tbody></table></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-calendar right"><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">May 2023</th><th class="next available"><span></span></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off ends available" data-title="r0c0">30</td><td class="available" data-title="r0c1">1</td><td class="available" data-title="r0c2">2</td><td class="available" data-title="r0c3">3</td><td class="available" data-title="r0c4">4</td><td class="available" data-title="r0c5">5</td><td class="weekend available" data-title="r0c6">6</td></tr><tr><td class="weekend available" data-title="r1c0">7</td><td class="available" data-title="r1c1">8</td><td class="available" data-title="r1c2">9</td><td class="available" data-title="r1c3">10</td><td class="available" data-title="r1c4">11</td><td class="available" data-title="r1c5">12</td><td class="weekend available" data-title="r1c6">13</td></tr><tr><td class="weekend available" data-title="r2c0">14</td><td class="available" data-title="r2c1">15</td><td class="available" data-title="r2c2">16</td><td class="available" data-title="r2c3">17</td><td class="available" data-title="r2c4">18</td><td class="available" data-title="r2c5">19</td><td class="weekend available" data-title="r2c6">20</td></tr><tr><td class="weekend available" data-title="r3c0">21</td><td class="available" data-title="r3c1">22</td><td class="available" data-title="r3c2">23</td><td class="available" data-title="r3c3">24</td><td class="available" data-title="r3c4">25</td><td class="available" data-title="r3c5">26</td><td class="weekend available" data-title="r3c6">27</td></tr><tr><td class="weekend available" data-title="r4c0">28</td><td class="available" data-title="r4c1">29</td><td class="available" data-title="r4c2">30</td><td class="available" data-title="r4c3">31</td><td class="off ends available" data-title="r4c4">1</td><td class="off ends available" data-title="r4c5">2</td><td class="weekend off ends available" data-title="r4c6">3</td></tr><tr><td class="weekend off ends available" data-title="r5c0">4</td><td class="off ends available" data-title="r5c1">5</td><td class="off ends available" data-title="r5c2">6</td><td class="off ends available" data-title="r5c3">7</td><td class="off ends available" data-title="r5c4">8</td><td class="off ends available" data-title="r5c5">9</td><td class="weekend off ends available" data-title="r5c6">10</td></tr></tbody></table></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected">04/12/2023 - 04/12/2023</span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div></div>
<div class="daterangepicker ltr show-calendar opensright" style="top: 1697.16px; left: 973px; right: auto; display: none;"><div class="ranges"></div><div class="drp-calendar left"><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><span></span></th><th colspan="5" class="month">Apr 2023</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off ends available" data-title="r0c0">26</td><td class="off ends available" data-title="r0c1">27</td><td class="off ends available" data-title="r0c2">28</td><td class="off ends available" data-title="r0c3">29</td><td class="off ends available" data-title="r0c4">30</td><td class="off ends available" data-title="r0c5">31</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="weekend available" data-title="r1c6">8</td></tr><tr><td class="weekend available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="today active start-date active end-date available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="weekend available" data-title="r3c6">22</td></tr><tr><td class="weekend available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="weekend available" data-title="r4c6">29</td></tr><tr><td class="weekend available" data-title="r5c0">30</td><td class="off ends available" data-title="r5c1">1</td><td class="off ends available" data-title="r5c2">2</td><td class="off ends available" data-title="r5c3">3</td><td class="off ends available" data-title="r5c4">4</td><td class="off ends available" data-title="r5c5">5</td><td class="weekend off ends available" data-title="r5c6">6</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12" selected="selected">12</option></select> : <select class="minuteselect"><option value="0" selected="selected">00</option><option value="30">30</option></select> <select class="ampmselect"><option value="AM" selected="selected">AM</option><option value="PM">PM</option></select></div></div><div class="drp-calendar right"><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">May 2023</th><th class="next available"><span></span></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off ends available" data-title="r0c0">30</td><td class="available" data-title="r0c1">1</td><td class="available" data-title="r0c2">2</td><td class="available" data-title="r0c3">3</td><td class="available" data-title="r0c4">4</td><td class="available" data-title="r0c5">5</td><td class="weekend available" data-title="r0c6">6</td></tr><tr><td class="weekend available" data-title="r1c0">7</td><td class="available" data-title="r1c1">8</td><td class="available" data-title="r1c2">9</td><td class="available" data-title="r1c3">10</td><td class="available" data-title="r1c4">11</td><td class="available" data-title="r1c5">12</td><td class="weekend available" data-title="r1c6">13</td></tr><tr><td class="weekend available" data-title="r2c0">14</td><td class="available" data-title="r2c1">15</td><td class="available" data-title="r2c2">16</td><td class="available" data-title="r2c3">17</td><td class="available" data-title="r2c4">18</td><td class="available" data-title="r2c5">19</td><td class="weekend available" data-title="r2c6">20</td></tr><tr><td class="weekend available" data-title="r3c0">21</td><td class="available" data-title="r3c1">22</td><td class="available" data-title="r3c2">23</td><td class="available" data-title="r3c3">24</td><td class="available" data-title="r3c4">25</td><td class="available" data-title="r3c5">26</td><td class="weekend available" data-title="r3c6">27</td></tr><tr><td class="weekend available" data-title="r4c0">28</td><td class="available" data-title="r4c1">29</td><td class="available" data-title="r4c2">30</td><td class="available" data-title="r4c3">31</td><td class="off ends available" data-title="r4c4">1</td><td class="off ends available" data-title="r4c5">2</td><td class="weekend off ends available" data-title="r4c6">3</td></tr><tr><td class="weekend off ends available" data-title="r5c0">4</td><td class="off ends available" data-title="r5c1">5</td><td class="off ends available" data-title="r5c2">6</td><td class="off ends available" data-title="r5c3">7</td><td class="off ends available" data-title="r5c4">8</td><td class="off ends available" data-title="r5c5">9</td><td class="weekend off ends available" data-title="r5c6">10</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3" selected="selected">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select> : <select class="minuteselect"><option value="0">00</option><option value="30" selected="selected">30</option></select> <select class="ampmselect"><option value="AM">AM</option><option value="PM" selected="selected">PM</option></select></div></div><div class="drp-buttons"><span class="drp-selected">04/12/2023 12:00 AM - 04/12/2023 03:30 PM</span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div></div>
<div class="daterangepicker ltr show-ranges opensright show-calendar" style="display: none; top: 1783.16px; left: 1104.5px; right: auto;"><div class="ranges"><ul><li data-range-key="Today" class="">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days" class="active">Last 7 Days</li><li data-range-key="Last 30 Days" class="">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul></div><div class="drp-calendar left"><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><span></span></th><th colspan="5" class="month">Mar 2023</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off ends available" data-title="r0c0">26</td><td class="off ends available" data-title="r0c1">27</td><td class="off ends available" data-title="r0c2">28</td><td class="available" data-title="r0c3">1</td><td class="available" data-title="r0c4">2</td><td class="available" data-title="r0c5">3</td><td class="weekend available" data-title="r0c6">4</td></tr><tr><td class="weekend available" data-title="r1c0">5</td><td class="available" data-title="r1c1">6</td><td class="available" data-title="r1c2">7</td><td class="available" data-title="r1c3">8</td><td class="available" data-title="r1c4">9</td><td class="available" data-title="r1c5">10</td><td class="weekend available" data-title="r1c6">11</td></tr><tr><td class="weekend available" data-title="r2c0">12</td><td class="available" data-title="r2c1">13</td><td class="available" data-title="r2c2">14</td><td class="available" data-title="r2c3">15</td><td class="available" data-title="r2c4">16</td><td class="available" data-title="r2c5">17</td><td class="weekend available" data-title="r2c6">18</td></tr><tr><td class="weekend available" data-title="r3c0">19</td><td class="available" data-title="r3c1">20</td><td class="available" data-title="r3c2">21</td><td class="available" data-title="r3c3">22</td><td class="available" data-title="r3c4">23</td><td class="available" data-title="r3c5">24</td><td class="weekend available" data-title="r3c6">25</td></tr><tr><td class="weekend available" data-title="r4c0">26</td><td class="available" data-title="r4c1">27</td><td class="available" data-title="r4c2">28</td><td class="available" data-title="r4c3">29</td><td class="available" data-title="r4c4">30</td><td class="available" data-title="r4c5">31</td><td class="weekend off ends available" data-title="r4c6">1</td></tr><tr><td class="weekend off ends available" data-title="r5c0">2</td><td class="off ends available" data-title="r5c1">3</td><td class="off ends available" data-title="r5c2">4</td><td class="off ends available" data-title="r5c3">5</td><td class="off ends active start-date available" data-title="r5c4">6</td><td class="off ends in-range available" data-title="r5c5">7</td><td class="weekend off ends in-range available" data-title="r5c6">8</td></tr></tbody></table></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-calendar right"><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Apr 2023</th><th class="next available"><span></span></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off ends available" data-title="r0c0">26</td><td class="off ends available" data-title="r0c1">27</td><td class="off ends available" data-title="r0c2">28</td><td class="off ends available" data-title="r0c3">29</td><td class="off ends available" data-title="r0c4">30</td><td class="off ends available" data-title="r0c5">31</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="active start-date available" data-title="r1c4">6</td><td class="in-range available" data-title="r1c5">7</td><td class="weekend in-range available" data-title="r1c6">8</td></tr><tr><td class="weekend in-range available" data-title="r2c0">9</td><td class="in-range available" data-title="r2c1">10</td><td class="in-range available" data-title="r2c2">11</td><td class="today active end-date in-range available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="weekend available" data-title="r3c6">22</td></tr><tr><td class="weekend available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="weekend available" data-title="r4c6">29</td></tr><tr><td class="weekend available" data-title="r5c0">30</td><td class="off ends available" data-title="r5c1">1</td><td class="off ends available" data-title="r5c2">2</td><td class="off ends available" data-title="r5c3">3</td><td class="off ends available" data-title="r5c4">4</td><td class="off ends available" data-title="r5c5">5</td><td class="weekend off ends available" data-title="r5c6">6</td></tr></tbody></table></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected">04/06/2023 - 04/12/2023</span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div><script>

</body>
</html>
