$(function() {
    /**
     * Add friend ajax request
     */
    $(".addFriendForm").submit(function (e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
            {
                url: formURL,
                type: "POST",
                data: postData,
                success: function (data, textStatus, jqXHR) {
                    //data: return data from server
                    alert(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('fail');
                }
            });
        e.preventDefault();
        e.unbind();
    });


    /**
     * Statuses Knockout
     * @type {Array}
     */
    var Status = function(id, status, createdAt, editedAt) {
        this.id = id;
        this.status = status;
        this.createdAt = createdAt;
        this.editedAt = editedAt;
    }

    var statusViewModel = {
        newStatus: ko.observable(),
        statusesFromDb: ko.observableArray(),

        getStatusesFromDb: function(statuses){
            for (var i=0; i<statuses.length; i++) {
                this.statusesFromDb.push(
                    new Status( statuses[i].id, statuses[i].status, statuses[i].created_at, statuses[i].edited_at )
                )
            }
        },

        addStatus: function(){
            if (this.newStatus().length > 0 ) {
                $.ajax({
                    url: "http://statushub.dev/user/7/status/",
                    type: "POST",
                    data: { 'status': this.newStatus(), '_token': $('input[name=_token]').val() },
                    success: function (statuses) {
                        console.log(statuses)
                        //statusViewModel.getStatusesFromDb( JSON.parse(statuses) )
                    }
                });
                this.statusesFromDb.unshift(
                    new Status( null, this.newStatus(), null, null )
                );
            }
        }
    };

    ko.applyBindings(statusViewModel);

    $.ajax({
        url: "http://statushub.dev/user/7/status/",
        success: function (statuses) {
            statusViewModel.getStatusesFromDb( JSON.parse(statuses) )
        }
    });

});


