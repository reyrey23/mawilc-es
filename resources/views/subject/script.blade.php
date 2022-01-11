<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#edit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var Subject = button.data('all')
            var jsonobj = Subject
            var modal = $(this)

            modal.find('.modal-body #subjectID').val(jsonobj.subjectID);
            modal.find('.modal-body #subjectCode').val(jsonobj.subjectCode);
            modal.find('.modal-body #subjectDescription').val(jsonobj.subjectDescription);
        });

         // $('#dtable').DataTable()
        // responsive: true;    });
    });
</script>
