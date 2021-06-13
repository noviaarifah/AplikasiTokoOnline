<div class="container-fluid">
        <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">

        <?php foreach($Barang as $Brg): ?>
            <div class="row">
                <div class="col-md-4"> 
                <img src="<?php echo base_url().'/uploads/'.$Brg->gambar ?>" class="card-img-top"></div>

                <div class="col-md-8"> 
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?php echo $Brg->nama_barang ?></strong></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><strong><?php echo $Brg->keterangan ?></strong></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><strong><?php echo $Brg->kategori ?></strong></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><strong><?php echo $Brg->stok ?></strong></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($Brg->harga,0,',','.') ?></div></strong></td>
                        </tr>

                    </table>
                    <?php echo anchor('Dashboard/Tambah_ke_Keranjang/'.$Brg->id_barang,'<div class="btn btn-sm btn-primary"> Tambah ke Keranjang </div>') ?>
                    <?php echo anchor('Dashboard/index/','<div class="btn btn-sm btn-danger">Kembali</div>') ?>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
        </div>

</div>