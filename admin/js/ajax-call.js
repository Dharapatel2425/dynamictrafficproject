//Ajax Call
setInterval(function() {
    // body...
    //console.log("entry!!);
    //code for running insertsensordata.php in background
    // $.ajax({
    //     method: "POST",
    //     url: "insertsensordata.php",
    //     }).done(function( msg ) {
    // });
    
    //code for running livesensorupdates.php in background
    $.ajax({
        method: "POST",
        url: "livesensorupdates.php",
        }).done(function( msg ) {
    });

            
},20000);