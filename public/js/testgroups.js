$(function(){
    $("[data-toggle='tooltip']").tooltip();
    $('#move-testgroup').on('click', moveTestGroup);
    $('#parent-testgroup').on('click', parentTestGroup);
    $('#move-here').on('click', changeParentGroup);
    $('#modal-move-testgroup').on('click', '.btn-childtestgroup', childTestGroup)
})

function moveTestGroup(event){
    event.preventDefault();

    var modal = $('#modal-move-testgroup');
    var group_id = modal.find('#testgroup-title').data('id');
    var url = '/testgroups/listtestgroups/' + group_id;

    loader.show();
    $.getJSON({
        url: url
    }).done(function(data){
        mountModal(data)
        modal.modal('show');
    }).always(function(){
        loader.hide();
    })
}

function parentTestGroup(event){
    event.preventDefault();
    var group_id = $('#modal-move-testgroup #testgroup-title').data('parentid');
    getTestGroup(group_id)
}

function childTestGroup(event){
    event.preventDefault();
    var group_id = $(this).data('groupid');
    getTestGroup(group_id)
}

function getTestGroup(group_id){
    var url = '/testgroups/listtestgroups/' + group_id;

    loader.show();
    $.getJSON({
        url: url
    }).done(function(data){
        mountModal(data)
    }).always(function(){
        loader.hide();
    })
}

function mountModal(data){
    var modal = $('#modal-move-testgroup');
    var spanElement = modal.find('#testgroup-title')
    var children = modal.find('#children-testgroups')

    spanElement.data('id', data.id);
    spanElement.data('parentid', data.parent_id);
    spanElement.html(data.title);
    children.html(data.children)

    if(data.parent_id){
        modal.find('#parent-testgroup').show()
    }else{
        modal.find('#parent-testgroup').hide()
    }
}

function changeParentGroup(event){
    event.preventDefault();
    var id = $('#testgroup-id').val()
    var url = '/testgroups/changeparentgroup/' + id
    var parent_id = $('#modal-move-testgroup #testgroup-title').data('id')

    loader.show();
    $.post({
        url: url,
        dataType: 'json',
        data: {
            parent_id: parent_id
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).done(function(data){
        $('#modal-move-testgroup').modal('hide');
        if(data.error){
            $('#message').html(data.message);
            $('#message').slideDown();
            setTimeout(() => {
                $('#message').slideUp();
            }, 5000);
        }else{
            window.location = '/testgroups/' + parent_id
        }
    }).always(function(){
        loader.hide();
    })
}
