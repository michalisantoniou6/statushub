$(function() {
    /**
     * Add friend ajax request
     */
    $(".addFriendForm").submit(function (e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        var removeThis = $(this).attr('id');

        $.ajax(
            {
                url: formURL,
                type: "POST",
                data: postData,
                success: function (data, textStatus, jqXHR) {
                    bootbox.alert('Congratulations! You made a new friend!');
                    $('#' + removeThis).remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    bootbox.alert('fail');
                }
            });

        e.preventDefault();
        e.unbind();
    });



    /**
     * Remove friend ajax request
     */
    $(".removeFriendForm").submit(function (e) {
        var formUrl = $(this).attr("action");
        var postData = $(this).serializeArray();
        var name = $(this).closest(".box").text();
        var removeThis = $(this).attr('id');

        $.ajax(
            {
                url: formUrl,
                type: "DELETE",
                data: postData,
                success: function (data, textStatus, jqXHR) {
                    bootbox.alert('You are no longer friends with' + name);
                    $('#' + removeThis).remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    bootbox.alert('fail');
                }
            });

        e.preventDefault();
        e.unbind();
    });




    /**
     * Statuses Knockout
     * @type {Array}
     */
    var Status = function(status) {
        this.id = status.id;
        this.status = status.status;
        this.created_at = status.created_at;
    }

    var statusViewModel = {
        newStatus: ko.observable(),
        statusesFromDb: ko.observableArray()
    };

    statusViewModel.statusesFromDb( JSON.parse(varsFromBE.myStatuses) );


    ko.applyBindings(statusViewModel);


    $(".addNewStatusForm").submit(function(e) {
        var url = $(this).attr("action");
        var postData = $(this).serializeArray();

        $.ajax({
            url: url,
            type: "POST",
            data: postData,
            success: function (saved) {
                var saved = JSON.parse(saved);
                statusViewModel.statusesFromDb.unshift(
                    new Status( saved )
                );
                $("#statusTextBox").val("");
            }
        });

        e.preventDefault();
        e.unbind();
    });


    /**
     * Link to edit status page
     */
    $(".edit-status").click(function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var url = $(this).attr('href');
        var redirectTo = url + '/' + id + '/edit';

        window.location.href = redirectTo;

    });



});


