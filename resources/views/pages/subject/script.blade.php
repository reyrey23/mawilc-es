<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#assign, #edit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var Subject = button.data('all')
            var jsonobj = Subject
            var modal = $(this)

            modal.find('.modal-body #subject_scheduleID').val(jsonobj.subject_scheduleID);

            modal.find('.modal-body #subjectID').val(jsonobj.subjectID);
            modal.find('.modal-body #subjectCode').val(jsonobj.subjectCode);
            modal.find('.modal-body #subjectDescription').val(jsonobj.subjectDescription);

            modal.find('.modal-body #subjectStartTime').val(jsonobj.subjectStartTime);
            modal.find('.modal-body #subjectEndTime').val(jsonobj.subjectEndTime);
        });

        $('#request').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var Subject = button.data('all')
            var jsonobj = Subject
            var modal = $(this)

            modal.find('.modal-body #subject_scheduleID').val(jsonobj.subject_scheduleID);
            modal.find('.modal-body #subjectID').val(jsonobj.subjectID);
        });



         // $('#dtable').DataTable()
        // responsive: true;    });
    });
</script>
