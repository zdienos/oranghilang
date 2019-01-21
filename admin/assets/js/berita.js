function validateFileType2(){
        var fileName = document.getElementById("input-foto_thumbnail").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            document.getElementById("input-foto_thumbnail").value =null;
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    };
function validateFileType(){
        var fileName = document.getElementById("input-foto_header").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
        	document.getElementById("input-foto_header").value =null;
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    };
    