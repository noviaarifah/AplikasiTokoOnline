<div class="container-fluid">
    <h4>Data Invoice Pemesanan Produk</h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
</tr>
<?php foreach ($Invoice as $Inv) : ?>
    <tr>
        <td><?php echo $Inv->id_invoice ?></td>
        <td><?php echo $Inv->nama ?></td>
        <td><?php echo $Inv->alamat ?></td>
        <td><?php echo $Inv->tgl_pesan ?></td>
        <td><?php echo $Inv->batas_bayar ?></td>
<?php endforeach; ?>
</table>

</div>