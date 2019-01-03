$(document).ready(function() {
  $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
  {
      return {
          "iStart": oSettings._iDisplayStart,
          "iEnd": oSettings.fnDisplayEnd(),
          "iLength": oSettings._iDisplayLength,
          "iTotal": oSettings.fnRecordsTotal(),
          "iFilteredTotal": oSettings.fnRecordsDisplay(),
          "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
          "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
  };
  const asd = 'asd';
  const gender = {"Laki-Laki" : "L","Perempuan" : "P"}
  var t = $("#mytable").dataTable({
    
      initComplete: function() {
          var api = this.api();
          $('#mytable_filter input')
                  .off('.DT')
                  .on('keyup.DT', function(e) {
                      if (e.keyCode == 13) {
                          api.search(this.value).draw();
              }
          });
      },
      oLanguage: {
          sProcessing: "Loading ..."
      },
      processing: true,
      serverSide: true,
      ajax: {"url": base_url+"/pendataan/json/"+id, "type": "POST"},
      columns: [
          {
            "data": "id",
            "orderable": false
          },
          {
            "data": "id",
            "orderable": false
          },
          {
            "data": "nama_bencana_alam",
            "orderable": false
          },
          {
            "data": "tgl_laporan"
          },
          {
            "data" : "name",
            "orderable": false
          }
          ,
          {
            "data": "jenage",
            "orderable": false
          },
          {
            "data": "alamat",
            "orderable": false},
          {
            "data" : "aksi",
            "orderable" : false
          }
          
      ],
      order: [[3, 'asc']],
      rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).html(index);
      }
  });
});