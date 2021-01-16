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
    $.getJSON({
        url: urlsendemail
    }).done(function(data){
        $('#message').html(data.message);
        $('#message').slideDown();
        setTimeout(() => {
            $('#message').slideUp();
        }, 5000);
    })
}

function userGroups(event){
    event.preventDefault()
    $.get({
        url: urlusergroups
    }).done(function(html){
        $('#users-modal').html(html)
        $('#users-modal .modal').modal('show')
        modalListeners()
    })
}

function linkUserGroup(event){
    event.preventDefault();
    var groupId = $(this).data('group')
    $.post({
        url: urllinkusergroup,
        data: { 'group_id' : groupId },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).done(function(){
        window.location.reload();
    })
}

function unlinkUserGroup(event){
    event.preventDefault();
    var groupId = $(this).data('group')
    $.post({
        url: urlunlinkusergroup,
        data: { 'group_id' : groupId },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).done(function(){
        window.location.reload();
    })
}
