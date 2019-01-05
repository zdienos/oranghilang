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
      ajax: {"url": base_url + "berita/json", "type": "POST"},
      columns: [
          {
            "data": "id_berita",
            "orderable": false
          },
          {
            "data": "judul_berita",
            "orderable": false
          },
          {
            "data": "nama_grup",
            "orderable": false
          },
          {
            "data": "date",
            "orderable": false
          },
          {
            "data": "status"
          },
          {
            "data": "aksi",
            "orderable": false
          }
      ],
      order: [[4, 'desc']],
      rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).html(index);
      }
  });
});