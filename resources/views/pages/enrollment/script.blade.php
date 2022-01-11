<script type="text/javascript">
    $(document).ready(function () {
        // $('#select').click(function () {
        //     var result = $('input[type="checkbox"]:checked');
        //     if (result.length > 0) {
        //         var resultString = result.length;
        //         result.each(function () {
        //             resultString += $(this).val() + "<br/>";
        //         });
        //         $('#row').html(resultString);
        //     }
        //     else {
        //         $('#row').html("No checkbox checked");
        //     } 
        // });

        $('#select').click(function () {
            var getSelectedValues =  $(".add-subject input:checked").parents("tr").clone().appendTo($(".create-table tbody")).add(getSelectedValues);
        });
    })
</script>