    $('#input-isi').summernote({
      height: 500,

      toolbar: [    
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],       
        ['insert',['picture','resizedDataImage', 'link']],
        ['misc',['fullscreen']]      
      ],    
      //set callback image tuk upload ke serverside
      callbacks: {
          onImageUpload: function(files) {
            uploadFile(files[0])
        }
      }

    });
    function uploadFile(image) {
            data = new FormData();
            data.append("file", image);
            $.ajax({
                data: data,
                type: "POST",
                url: base_url + "/berita/save",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {                                                                      
                 $('#input-isi').summernote("insertImage", url);
                }
            });
        }