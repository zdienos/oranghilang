$(document).ready(function(){
  var base_urls = 'http://localhost/stiki/admin/bencana/'
  var id_province = $('#input-id_provinces').find(":selected").val();

  $.ajax({
    type: "POST",
    url: base_urls + "getregencies/"+id_province,
    dataType: "html",  
    beforeSend: function(e) {
      if(e && e.overrideMimeType) {
        e.overrideMimeType("application/json;charset=UTF-8");
      }
    },
    success: function(response){ 
      $("#input-id_regencies").html(response).show();
      var id_regencie = $('#input-id_regencies').find(":selected").val();
      $.ajax({
        type: "POST",
        url: base_urls + "getdistricts/"+id_regencie,
        dataType: "html",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#input-id_districts").html(response).show();
            var id_district = $('#input-id_districts').find(":selected").val();
      
            $.ajax({
              type: "POST",
              url: base_urls + "getvillages/"+id_district,
              dataType: "html",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#input-id_villages").html(response).show();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
              }
            });
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    },
    error: function (xhr, ajaxOptions, thrownError) { 
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
    }
  });

  $("#input-id_provinces").change(function(){
    $("#input-id_regencies").prop('disabled',false);
    $("#input-id_districts").prop('disabled',false);
    $("#input-id_villages").prop('disabled',false);
    var id_province = $('#input-id_provinces').find(":selected").val();
    console.log(id_province);
    
    $.ajax({
      type: "POST",
      url: base_urls + "getregencies/"+id_province,
      dataType: "html",  
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        $("#input-id_regencies").html(response).show();
        var id_regencie = $('#input-id_regencies').find(":selected").val();
        $.ajax({
          type: "POST",
          url: base_urls + "getdistricts/"+id_regencie,
          dataType: "html",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#input-id_districts").html(response).show();
              var id_district = $('#input-id_districts').find(":selected").val();
        
              $.ajax({
                type: "POST",
                url: base_urls + "getvillages/"+id_district,
                dataType: "html",
                beforeSend: function(e) {
                  if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                  }
                },
                success: function(response){ 
                  $("#input-id_villages").html(response).show();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
              });
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }
        });
      },
      error: function (xhr, ajaxOptions, thrownError) { 
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
      }
    });
  });

  $("#input-id_regencies").change(function(){ 
    $("#input-id_districts").prop('disabled',false);
    var id_regencie = $('#input-id_regencies').find(":selected").val();
         
    $.ajax({
      type: "POST",
      url: base_urls + "getdistricts/"+id_regencie,
      dataType: "html",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        $("#input-id_districts").html(response).show();
          var id_district = $('#input-id_districts').find(":selected").val();
          
          $.ajax({
            type: "POST",
            url: base_urls + "getvillages/"+id_district,
            dataType: "html",
            beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
              }
            },
            success: function(response){ 
              $("#input-id_villages").html(response).show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });
      },
      error: function (xhr, ajaxOptions, thrownError) { 
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
    });
  });

  $("#input-id_districts").change(function(){ 
    $("#input-id_villages").prop('disabled',false);
    var id_district = $('#input-id_districts').find(":selected").val();
    
    $.ajax({
      type: "POST",
      url: base_urls + "getvillages/"+id_district,
      dataType: "html",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        $("#input-id_villages").html(response).show();
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
    });
  });

});