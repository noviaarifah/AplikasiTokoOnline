<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA BARANG</h3>

    <?php foreach($Barang as $Brg) : ?>
        
        <form action="<?php echo base_url().'admin/Data_barang/update' ?>" method="post">
        
        <div class="for-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?php echo $Brg->nama_barang ?>">          
        </div>

        <div class="for-group">
            <label>Keterangan</label>
            <input type="hidden" name="id_barang" class="form-control" value="<?php echo $Brg->id_barang ?>">
            <input type="text" name="keterangan" class="form-control" value="<?php echo $Brg->keterangan ?>">          
        </div>

        <div class="for-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?php echo $Brg->kategori ?>">          
        </div>

        <div class="for-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $Brg->harga ?>">          
        </div>

        <div class="for-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" value="<?php echo $Brg->stok ?>">          
        </div>

        <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan</button>
    
    </form>
    
        <?php endforeach; ?>
</div>