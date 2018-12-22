
<table class="table table-stripped" id="bencana" class="display" style="width:100%">
<thead>
  <tr>
    <th>No</th>
    <th>ID Bencana</th>
    <th>Jenis Bencana Alam</th>
    <th>Regenci</th>
    <th>District</th>
    <th>Village</th>
    <th>Nama Bencana</th>
    <th>Tanggal</th>
    <th>Keterangan</th>
  </tr>
</thead>
<tfoot>
  <?php foreach($bencana as $data){ ?>
    <tr>
      <td>1</td>
      <td><?= $data->id ?></td>
      <td><?= $data->nama_jenis_bencana_alam ?></td>
      <td><?= $data->name_provinces ?></td>
      <td><?= $data->name_regencies ?></td>
      <td><?= $data->name_villages ?></td>
      <td><?= $data->nama_bencana_alam ?></td>
      <td><?= $data->tgl_waktu ?></td>
      <td><?= $data->keterangan ?></td>
    </tr>
  <?php } ?>
  </tfoot>
</table>
<script>
  $(document).ready(function() {
    $('#bencana').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "localhost/stiki/admin/bencana/dataTableServerRender"
    } );
} );
</script>