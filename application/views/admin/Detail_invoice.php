<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice : <?php echo $Invoice->id_invoice ?></div></h4>

<table class="table table-bodered table-hover table-striped">
    <tr>
        <th>Id Barang</th>
        <th>Nama Produk</th>
        <th>Jumlah Pesanan</th>
        <th>Harga Satuan</th>
        <th>Sub-Total</th>

    </tr>
    <?php $total = 0;
    foreach ($Pesanan as $psn) : 
        $Subtotal = $psn ->jumlah * $psn->harga;
        $total += $Subtotal;
        ?>

        <tr>
            <td><?php echo $Psn->id_barang ?></td>
            <td><?php echo $Psn->nama_barang ?></td>
            <td><?php echo $Psn->jumlah ?></td>
            <td><?php echo number_format($Psn->harga, 0,',','.' ) ?></td>
            <td><?php echo number_format($subtotal, 0,',','.') ?></td>
        </tr>

        <?php endforeach; ?>

</table>

</div>