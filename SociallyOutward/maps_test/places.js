$.ajax('grabLateplates.php',
    {type: 'POST',    
     cache: false,
     success: function (data) {generateLateplates(data)},
     error: function () {
         alert('Failed');}
    }); 