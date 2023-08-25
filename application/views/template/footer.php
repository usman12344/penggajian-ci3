   <!--**********************************
            Footer start
        ***********************************-->
   <div class="footer">
       <div class="copyright">
           <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
       </div>
   </div>
   <!--**********************************
            Footer end
        ***********************************-->
   </div>
   <!--**********************************
        Main wrapper end
    ***********************************-->

   <!--**********************************
        Scripts
    ***********************************-->
   <script src="<?= base_url('assets/') ?>plugins/common/common.min.js"></script>
   <script src="<?= base_url('assets/') ?>js/custom.min.js"></script>
   <script src="<?= base_url('assets/') ?>js/settings.js"></script>
   <script src="<?= base_url('assets/') ?>js/gleek.js"></script>
   <script src="<?= base_url('assets/') ?>js/styleSwitcher.js"></script>

   <!-- Chartjs -->
   <script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.bundle.min.js"></script>
   <!-- Circle progress -->
   <script src="<?= base_url('assets/') ?>plugins/circle-progress/circle-progress.min.js"></script>
   <!-- Datamap -->
   <script src="<?= base_url('assets/') ?>plugins/d3v3/index.js"></script>
   <script src="<?= base_url('assets/') ?>plugins/topojson/topojson.min.js"></script>
   <script src="<?= base_url('assets/') ?>plugins/datamaps/datamaps.world.min.js"></script>
   <!-- Morrisjs -->
   <script src="<?= base_url('assets/') ?>plugins/raphael/raphael.min.js"></script>
   <script src="<?= base_url('assets/') ?>plugins/morris/morris.min.js"></script>
   <!-- Pignose Calender -->
   <script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
   <script src="<?= base_url('assets/') ?>plugins/pg-calendar/js/pignose.calendar.min.js"></script>
   <!-- ChartistJS -->
   <script src="<?= base_url('assets/') ?>plugins/chartist/js/chartist.min.js"></script>
   <script src="<?= base_url('assets/') ?>plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



   <script src="<?= base_url('assets/') ?>js/dashboard/dashboard-1.js"></script>

   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
   <script>
       $(document).ready(function() {
           $('#example').DataTable({
               dom: 'Bfrtip',
               buttons: [{
                   extend: 'pdfHtml5',
                   orientation: 'landscape',
                   pageSize: 'LEGAL'
               }],
               pageLength: 10,
           });
       });

       //    $(function() {
       //        var dateFormat = "mm/dd/yy",
       //            from = $("#from")
       //            .datepicker({
       //                defaultDate: "+1w",
       //                changeMonth: true,
       //                numberOfMonths: 3
       //            })
       //            .on("change", function() {
       //                to.datepicker("option", "minDate", getDate(this));
       //            }),
       //            to = $("#to").datepicker({
       //                defaultDate: "+1w",
       //                changeMonth: true,
       //                numberOfMonths: 3
       //            })
       //            .on("change", function() {
       //                from.datepicker("option", "maxDate", getDate(this));
       //            });

       //        function getDate(element) {
       //            var date;
       //            try {
       //                date = $.datepicker.parseDate(dateFormat, element.value);
       //            } catch (error) {
       //                date = null;
       //            }

       //            return date;
       //        }
       //    });
   </script>
   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
   </body>

   </html>