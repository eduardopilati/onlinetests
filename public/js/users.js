$(function(){
    $("[data-toggle='tooltip']").tooltip()
    $('.add-usergroups').on('click', userGroups)
    $('.unlinkusergroup').on('click', unlinkUserGroup)
    $('#sendemail').on('click', sendEmail)
})

function modalListeners(){
    $('.btn-linkgroup').on('click', linkUserGroup)
}

function sendEmail(event){
    event.preventDefault()
    loader.show();

    $.getJSON({
        url: urlsendemail
    }).done(function(data){
        $('#message').html(data.message);
        $('#message').slideDown();
        setTimeout(() => {
            $('#message').slideUp();
        }, 5000);
    }).always(function(){
        loader.hide();
    })
}

function userGroups(event){
    event.preventDefault()
    loader.show();

    $.get({
        url: urlusergroups
    }).done(function(html){
        $('#users-modal').html(html)
        $('#users-modal .modal').modal('show')
        modalListeners()
    }).always(function(){
        loader.hide();
    })
}

function linkUserGroup(event){
    event.preventDefault();
    var groupId = $(this).data('group')
    loader.show();

    $.post({
        url: urllinkusergroup,
        data: { 'group_id' : groupId },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).done(function(){
        window.location.reload();
    }).always(function(){
        loader.hide();
    })
}

function unlinkUserGroup(event){
    event.preventDefault();
    var groupId = $(this).data('group')
    loader.show();

    $.post({
        url: urlunlinkusergroup,
        data: { 'group_id' : groupId },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).done(function(){
        window.location.reload();
    }).always(function(){
        loader.hide();
    })
}
