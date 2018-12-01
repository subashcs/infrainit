$('document').ready(function(){
   //file upload code
   var Upload = function (file) {
    this.file = file;
};

Upload.prototype.getType = function() {
    return this.file.type;
};
Upload.prototype.getSize = function() {
    return this.file.size;
};
Upload.prototype.getName = function() {
    return this.file.name;
};
Upload.prototype.doUpload = function () {
    var that = this;
    var formData = new FormData();
    var hous=$("#hidhouse").val();
   
    // add assoc key values, this will be posts values
    formData.append("file", this.file, this.getName());
    formData.append("upload_file", true);
    formData.append("house", hous);

    $.ajax({
        type: "POST",
        url: "house_image_add.php",
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', that.progressHandling, false);
            }
            return myXhr;
        },
        success: function (data) {
          $("#progress-wrp .status").text("loading upload to server");  
          
          alert(data);
          location.reload();
          
          //what to show 
        },
        error: function (error) {
            // handle error
            alert(error);
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
    });
};

Upload.prototype.progressHandling = function (event) {
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    var progress_bar_id = "#progress-wrp";
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }
    // update progressbars classes so it fits your code
    $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
    $(progress_bar_id + " .status").text(percent + "%");
};
  
//Change id to your id
$("#added_image").on("change", function (e) {
    var file = $(this)[0].files[0];
    var upload = new Upload(file);

    // maby check size or type here with upload.getSize() and upload.getType()

    // execute upload
    upload.doUpload();
});
    var house_id=$("#hidhouse").val();
    
     $("#arc_name").focusout(function(){
         var to=$("#arc_name").val();
         var data="upd="+to+"&house="+house_id;
         
         $.ajax({
            url:"arc_name_edit.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
     });
     $("#floors").focusout(function(){
         var to=$("#floors").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"floor_no.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
     });
     $("#bedrooms").focusout(function(){
         var to=$("#bedrooms").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"br_no.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
     });
     $("#bed_room_desc").focusout(function(){
         var to=$("#bed_room_desc").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"br_desc.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
     });
     
     $("#livrooms").focusout(function(){
            var to=$("#livrooms").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"lr_no.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
    });
    $("#living_room_desc").focusout(function(){
        var to=$("#living_room_desc").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"lr_desc.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
    });    
    $("#washrooms").focusout(function(){
        var to=$("#washrooms").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"wr_no.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
    });    
    $("#wash_desc").focusout(function(){
        var to=$("#wash_desc").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"wr_desc.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
    });
    $("#arc_description").focusout(function(){
        var to=$("#arc_description").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"arc_desc_edit.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
        });
    $("#garagebays").focusout(function(){
        var to=$("#garagebays").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"gr_no.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
        });    
    $("#garage_desc").focusout(function(){
        var to=$("#garage_desc").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"gr_desc.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
        });   
    $("#phone").focusout(function(){
        var to=$("#phone").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"ph_edit.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
        });  
        
    $("#budget").focusout(function(){
        var to=$("#budget").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"est_budget.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
        });   
        
    $("#garden").focusout(function(){
        var to=$("#garden").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"garden.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
        });   
    $("#length").focusout(function(){
        var to=$("#length").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"length.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
        });   
    $("#bredth").focusout(function(){
        var to=$("#bredth").val();
         var data="upd="+to+"&house="+house_id;
         $.ajax({
            url:"bredth.php",
            type:"post",
            data:data,
            success:function(data){
                alert(data);
            },
            error:function(){
                alert("error !");
            }
         });
        });    
        
 
    
});