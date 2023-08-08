<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Penimbangan Balita</h3>
        </div>
    </div>
    <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <form method ="POST" action="<?php echo base_url()."Penimbangan_Balita/processAdd/"?>">
                                   
                                <h2> Informasi Pribadi </h2>
                                    <div class="form-group">
                                        <label>Identitas</label>
                                        <!-- <input class="form-control" name="idLansia" type="ntext" title="Nomor Identitas Lansia" required> -->
                                        <select name="idBalita" id="" class="form-control" >
                                            <?php
                                                foreach ($balita as $key) {
                                            ?>
                                            <option value="<?= $key['id']; ?>"><?= $key['idBalita']; ?>|<?= $key['namaBayi']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>                               
                                    <!-- <div class="form-group">
                                        <label>Nama Lansia</label>
                                        <input class="form-control" name="namaLansia" type="text"  onkeypress="return hanyaHuruf(event)" title="Nama Lansia" required>
                                    </div> -->
                                    
                                        <!-- <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <br>
                                            <label class="radio-inline">
                                                <input type="radio" name="jk" id="optionsRadiosInline1" value="Laki-Laki" checked>Laki - Laki
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jk" id="optionsRadiosInline2" value="Perempuan">Perempuan
                                            </label>
                                        </div> -->
                                    
                                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" name="tanggalLahir" title="Tanggal Lahir" type="date" required>
                                        </div>
                                    </div> -->
                                    <h2>Informasi Kesehatan</h2>
                                    <hr>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Penimbangan</label>
                                            <input class="form-control" name="tgl_skrng" title="Tanggal Penimbangan" type="date" required>
                                        </div>
                                    </div>
                                    
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Berat</label>
                                                <input class="form-control" name="beratLahir" title="Berat Lahir" step="0.01" type="number" placeholder="dalam kg" required> 
                                            </div>
                                        </div>

					<div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Lingkar Kepala</label>
                                                <input class="form-control" name="lingkar_kepala" title="lingkar" step="0.01" type="number" placeholder="dalam cm" required> 
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Panjang</label>
                                                <input class="form-control" name="panjangLahir" title="Panjang Lahir" step="0.01" type="number" placeholder="dalam cm" required> 
                                            </div>
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function hanyaHuruf(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode >32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 39)

        return false;
      return true;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

