<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#edit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var instructor = button.data('all')
            var jsonobj = instructor
            var modal = $(this)

            modal.find('.modal-body #instructorID').val(jsonobj.instructorID);
            modal.find('.modal-body #instructorName').val(jsonobj.instructorName);
            modal.find('.modal-body #instructorDescription').val(jsonobj.instructorDescription);
        });

         // $('#dtable').DataTable()
        // responsive: true;    });
    });
</script>
