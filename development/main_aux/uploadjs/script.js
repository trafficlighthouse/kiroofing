$(function(){

	 var pbarObj = null;
    var ul = $('#upload ul');

    $('#drop a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
			  pbarObj = document.getElementById('MPCprog').firstChild;
			  pbarObj.style.backgroundPosition='0 0'; // blue prog bar
			  $('#ufname').html(data.files[0].name);	// fname --> screen
			  $('#bnBrowse').prop('disabled',true);

           var jqXHR = data.submit(); // upload immediately
        },

		  // bump progress bar
        progress: function(e, data){
            var progress = parseInt(data.loaded / data.total * 100, 10);
				pbarObj.style.width = progress +'%';				
        },

        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');
        }

    });

    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

});
