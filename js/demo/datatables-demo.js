// Call the dataTables jQuery plugin
// $(document).ready(function() {
//   $('#dataTable').DataTable();
// });

$(document).ready(function() {
    // DataTable
    $('#dataTable').DataTable({
        initComplete: function () {

            //Apply select search
            this.api().columns('.dt-filter-select').every(function () {
                var column = this;
                var select = $('<select class="form-control form-control-sm rounded-0"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false)
                            .draw();
                    });
                column.data().unique().sort().each(function (d,j) {
                    select.append('<option value="'+d+'">'+d+'</option>')
                });
            });

            //Apply text search
            this.api().columns('.dt-filter-text').every(function () {
                var title = $(this.footer()).text();
                $(this.footer()).html('<input class="form-control form-control-sm rounded-0" type="text" placeholder="Search '+title+'" />');
                var that = this;
                $('input',this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        }
    });

    // For table 2

    $('#dataTable2').DataTable({
        initComplete: function () {

            //Apply select search
            this.api().columns('.dt-filter-select').every(function () {
                var column = this;
                var select = $('<select class="form-control form-control-sm rounded-0"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false)
                            .draw();
                    });
                column.data().unique().sort().each(function (d,j) {
                    select.append('<option value="'+d+'">'+d+'</option>')
                });
            });

            //Apply text search
            this.api().columns('.dt-filter-text').every(function () {
                var title = $(this.footer()).text();
                $(this.footer()).html('<input class="form-control form-control-sm rounded-0" type="text" placeholder="Search '+title+'" />');
                var that = this;
                $('input',this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        }
    });
});
