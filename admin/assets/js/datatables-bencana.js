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
      ajax: {"url": base_url + "bencana/json", "type": "POST"},
      columns: [
          {
            "data": "ID",
            "orderable": false
          },
          {
            "data": "ID",
            "orderable": false
          },
          {
            "data": "Jenis",
            "orderable": false
          },
          {
            "data": "Provinsi",
            "orderable": false
          },
          {
            "data": "Kabupaten",
            "orderable": false
          },
          {
            "data": "Kecamatan",
            "orderable": false},
          {
            "data": "Desa",
            "orderable": false},
          {
            "data": "Bencana",
            "orderable": false},
          {
            "data": "Tanggal",
          },
          {
            "data": "Keterangan",
            "orderable": false},
          {
            "data": "aksi",
            "orderable": false}
      ],
      order: [[8, 'desc']],
      rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).html(index);
      }
  });
});