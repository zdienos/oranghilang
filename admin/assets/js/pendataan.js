function validateFileType(){
        var fileName = document.getElementById("input-foto").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            document.getElementById("input-foto").value =null;
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    };