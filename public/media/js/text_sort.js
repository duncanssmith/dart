$(function () {
    $('#text-sortable').sortable().bind('sortupdate', function(e, ui) {
        var id = $('tbody.text-sortable tr').map(function(){ 
            return $(this).data("id");
        }).get();
        
        var group_id = $('table.group').map(function(){
            return $(this).data("groupid");
        }).get();

        var uuid = "<?php echo$uuid; ?>";

        //console.log("id, group_id, uuid: ") ;
        //console.log(id);
        //console.log(group_id);
        //console.log(uuid);

        $.ajax({
            type: "POST",
            url: "/save_page_texts_order",
            dataType: "json",
            data: {id: id, group_id: group_id, uuid: uuid},
            success: function(order){
                console.log(group_id, id)
            }
        });
    });
});
