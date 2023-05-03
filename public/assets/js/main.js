$(document).ready(function () {
    var providerTable = $('#provider-table').DataTable({
        ajax: 'table',
        serverSide: true,
        processing: true,
        columns:[
            {data: 'provider_name', name: 'provider_name'},
            {data: 'provider_url', name: 'provider_url'},
            {data: 'action', name: 'action'},
        ]
    });

    $('#add-form').validate({});

    $('#add-submit-btn').click(function(){
        if($('#add-form').valid()){
            $('#add-submit-btn').prop('disabled',true)
            var provider_name = $("#provider_name").val()
            var provider_url = $("#provider_url").val()
            $.ajax({
                url: '/add',
                type: 'POST',
                data: {provider_name:provider_name,provider_url:provider_url,_token:token},
                success: function (result) 
                {
                    $("#add-modal").modal('hide');
                    $('#add-submit-btn').prop('disabled',false)
                    $("#provider_name").val("")
                    $("#provider_url").val("")
                    providerTable.ajax.reload();
                }
            })
        }
    })


    $('#provider-table').on('click','.btn-get', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/getimage',
            type: 'POST',
            data: {id:id,_token:token},
            success: function (result) 
            {
                if(result.code || result == 'None'){
                    $("#image-container").html("<h3 style='text-align:center'>No Image Response</h3>")
                    $("#image-modal").modal('show')
                }else{
                    $("#image-container").html("<img src='"+ result +"' style='width:100%;height:auto;'>");
                    $("#image-modal").modal('show')
                }
            }
        })
    })

    $('#provider-table').on('click','.btn-view', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/view',
            type: 'POST',
            data: {id:id,_token:token},
            success: function (result) 
            {
               $("#update-container").html(result)
               $("#update-modal").modal("show");
               $('#update-form').validate({});
            }
        })
    })
    
    $('#update-submit-btn').click(function(){
        if($('#update-form').valid()){
            $('#update-submit-btn').prop('disabled',true)
            var id = $("#id_edit").val()
            var provider_name = $("#provider_name_edit").val()
            var provider_url = $("#provider_url_edit").val()
            $.ajax({
                url: '/update',
                type: 'POST',
                data: {id:id,provider_name:provider_name,provider_url:provider_url,_token:token},
                success: function (result) 
                {
                    $("#update-modal").modal('hide');
                    $('#update-submit-btn').prop('disabled',false)
                    $("#update-container").html("")
                    providerTable.ajax.reload();
                }
            })
        }
    })

    $('#provider-table').on('click','.btn-delete', function() {
        if(confirm('Are you sure you want to delete this provider?')){
            var id = $(this).attr('data-id');
            $.ajax({
            url: '/delete',
            type: 'POST',
            data: {id:id,_token:token},
            success: function (result) 
            {
                providerTable.ajax.reload();
            }
            })
        }
    })
});