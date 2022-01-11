<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#edit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var Subject = button.data('all')
            var jsonobj = Subject
            var modal = $(this)

            modal.find('.modal-body #enrollmentID ').val(jsonobj.enrollmentID );
            modal.find('.modal-body #enrollmentYear').val(jsonobj.enrollmentYear);
            modal.find('.modal-body #enrollmentStatus').val(jsonobj.enrollmentStatus);

            modal.find('.modal-body #user_id').val(jsonobj.user_id);
            modal.find('.modal-body #subjectID').val(jsonobj.subjectID);
            modal.find('.modal-body #subject_scheduleID').val(jsonobj.subject_scheduleID);
        });

         // $('#dtable').DataTable()
        // responsive: true;    });
    });
</script>
