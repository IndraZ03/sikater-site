<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
   
    <?= $this->session->flashdata('pesan-sukses'); ?>
    <?= $this->session->flashdata('pesan-gagal'); ?>
    <?= $this->session->flashdata('pesan-sukses-hapus'); ?>
    <?= $this->session->set_flashdata('berhasil'); ?>

    <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar" style="overflow-x: auto;">
        <div class="table-wrapper ">
            <div class="table-title table-striped table-hover " >
                <div class="row">
                    <div class="col-sm-5">
                        <h2 class="justify-content-left"><b>Logbook Laboratorium Calibration</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#inputLogbook"> Tambah</button>
                    </div>
                </div>
                
            </div>
            <table id="log" class="table table-bordered  table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center col-md-2">Order</th>
                        <th rowspan="2" class="text-center col-md-2">Instansi</th>
                        <th colspan="1" class="text-center col-md-2">Alat</th>
                        <th rowspan="2" class="text-center col-md-3">Identifikasi</th>
                        <th colspan="2" class="text-center col-md-2">Sertifikat Kalibrasi</th>
                        <th colspan="4" class="text-center col-md-2">Status</th>
                        <th rowspan="2" class="text-center col-md-2">PETUGAS KALIBRASI</th>
                        <th rowspan="2" class="text-center col-md-2">Aksi</th>
                        
                    </tr>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">NAMA/MERK/TYPE/NO.SERI</th>
                        <th class="text-center">NOMOR</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Pembayaran</th>
                        <th class="text-center">Kalibrasi</th>
                        <th class="text-center">Sertifikat</th>
                        <th class="text-center">Selesai</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($logbook as $logbookk) {
                    if($sub_logbook){ ?>
                
                    <tr>
                <?php $rowspan = 0; foreach($sub_logbook as $sublogbook){
                        if($sublogbook->order == $logbookk->order){
                            $rowspan++;
                        };
                        
                } $a =1;
                 ?>   <?php if(!$rowspan == 0){

                    echo "  <td rowspan ='$rowspan'> $logbookk->order</td>
                    <td rowspan ='$rowspan'> $logbookk->tanggal</td>
                    <td rowspan ='$rowspan'>$logbookk->instansi</td>
                  "
                 ;};?>
                      
                        <?php foreach ($sub_logbook as $sublogbookk) {
                        if($sublogbookk->order==$logbookk->order){
                            if($a>1){echo "<tr>";} ;?>
                        <td> <?php echo $sublogbookk->alat; ?></td>
                        <td class="text-center"> <?php echo $sublogbookk->identifikasi; ?></td>
                        <td class="text-center"> <?php echo $sublogbookk->nomor; ?></td>
                        <td> <?php echo $sublogbookk->tanggal_k; ?></td>
                        <td class="text-center"> <?php if($sublogbookk->pembayaran == 1){
                            
                            echo "
                            <form method='post' action='pembayaran_logbook'> 
                            <input type='hidden' name='pembayaran' value='0'>
                            <input type='hidden' id='idp' name='idp' value='$sublogbookk->id'>
                            <button class='badge badge-success text-light text-center'style='border:none;width:  12px; height: 12px;' type='submit'> </button>
                            </form>
                           ";
                        }else{ echo "
                            <form method='post' action='pembayaran_logbook'> 
                            <input type='hidden' name='pembayaran' value='1'>
                            <input type='hidden' id='idp' name='idp' value='$sublogbookk->id'>
                            <button class='badge badge-danger text-light text-center'style='border:none;width:  12px; height: 12px;' type='submit'> </button>
                            </form>
                           ";}; ?>

                       </td>
                        <td class="text-center"> <?php if($sublogbookk->kalibrasi==1){ echo "
                            <form method='post' action='kalibrasi_logbook'> 
                            <input type='hidden' name='kalibrasi' value='0'>
                            <input type='hidden' id='idp' name='idp' value='$sublogbookk->id'>
                            <button class='badge badge-success text-light text-center'style='border:none;width:  12px; height: 12px;' type='submit'> </button>
                            </form>
                           ";
                        }else{ echo "
                            <form method='post' action='kalibrasi_logbook'> 
                            <input type='hidden' name='kalibrasi' value='1'>
                            <input type='hidden' id='idp' name='idp' value='$sublogbookk->id'>
                            <button class='badge badge-danger text-light text-center'style='border:none;width:  12px; height: 12px;' type='submit'> </button>
                            </form>
                           ";}; ?></td>
                        <td class="text-center"> <?php if($sublogbookk->sertifikat==1){ echo "
                            <form method='post' action='sertifikat_logbook'> 
                            <input type='hidden' name='sertifikat' value='0'>
                            <input type='hidden' id='idp' name='idp' value='$sublogbookk->id'>
                            <button class='badge badge-success text-light text-center'style='border:none;width:  12px; height: 12px;' type='submit'> </button>
                            </form>
                           ";
                        }else{ echo "
                            <form method='post' action='sertifikat_logbook'> 
                            <input type='hidden' name='sertifikat' value='1'>
                            <input type='hidden' id='idp' name='idp' value='$sublogbookk->id'>
                            <button class='badge badge-danger text-light text-center'style='border:none;width:  12px; height: 12px;' type='submit'> </button>
                            </form>
                           ";}; ?></td>
                        <td class="text-center"> <?php if($sublogbookk->selesai==1){ echo  "
                            <form method='post' action='selesai_logbook'> 
                            <input type='hidden' name='selesai' value='0'>
                            <input type='hidden' id='idp' name='idp' value='$sublogbookk->id'>
                            <button class='badge badge-success text-light text-center'style='border:none;width:  12px; height: 12px;' type='submit'> </button>
                            </form>
                           ";
                        }else{ echo "
                            <form method='post' action='selesai_logbook'> 
                            <input type='hidden' name='selesai' value='1'>
                            <input type='hidden' id='idp' name='idp' value='$sublogbookk->id'>
                            <button class='badge badge-danger text-light text-center'style='border:none;width:  12px; height: 12px;' type='submit'> </button>
                            </form>
                           ";}; ?></td>
                        <td class="text-center"> <?php echo $sublogbookk->petugas_kalibrasi; ?></td>
                        <td>
                                    <button style="border:none;" type='button' data-toggle="modal" data-target="#edit<?php echo $sublogbookk->id; ?>" class="badge rounded-pill bg-warning text-light">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
<div class="modal fade" id="edit<?php echo $sublogbookk->id; ?>" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputModalLabel">Edit Log Kalibrasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('upload/edit_logbook'); ?>" method="POST" >
                <input type="hidden" id="id" name="idl" value='<?php echo $logbookk->id; ?>'>
                <input type="hidden" id="id" name="ids" value='<?php echo $sublogbookk->id; ?>'>
                <div class=" form-group">
                
                        <label style="font-size: 16px;"  for="inputNama">No.Order</label>
                        <input type="text" class="form-control" value="<?php echo $logbookk->order; ?>" readonly>
                        <input type="text" class="form-control" id="order" name="order" placeholder="Masukkan No.Order">
                    </div>
                    <div style="font-size: 16px;" class=" form-group">
                        <label for="inputNama">Tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $logbookk->tanggal;?>" readonly>
                        <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal" required>
                    </div>
                    <div class=" form-group">
                        <label  style="font-size: 16px;" for="inputNama">Instansi</label>
                        <input type="text" class="form-control" value="<?php echo $logbookk->instansi;?>" readonly>
                        <input type="text" class="form-control"  name="instansi" placeholder="Masukkan Instansi" required>
                    </div>

                    <div>
                        <div class="control-group " >
                        <div class=" form-group">
                        <label style="font-size: 16px;" for="inputNama">Alat</label>
                        <input type="text" class="form-control" value="<?php echo $sublogbookk->alat;?>" readonly>
                        <br>
                        <div class="text-center" style="font-size: 14px;" >
                                <input   style="width:  200px; height: 21px;" type="text" name="input1[]" required>
                                <span>/</span>
                                <input style="width: 65px; height: 21px;" type="text" name="input2[]" required>
                                <span>/</span>
                                <input  style="width: 65px; height: 21px;" type="text" name="input3[]" required>
                                <span>/</span>
                                <input style="width: 65px; height: 21px;"  type="text" name="input4[]" required>
                                </div>
                        <div class=" form-group">
                        <label  style="font-size: 16px;" for="inputNama">Identifikasi</label>
                        <input type="text" class="form-control" value="<?php echo $sublogbookk->identifikasi;?>" readonly>
                        <input type="text" class="form-control"  name="identifikasi[]" placeholder="Masukkan Nomor Identifikasi" required>
                        </div>
                        <div class=" form-group">
                        <label for="inputNama" style="font-size: 16px;">Sertifikat Kalibrasi </label> <br>
                        <label style="font-size: 14px;" for="inputNama">Nomor</label> <br>
                        <input type="text" class="form-control" value="<?php echo $sublogbookk->nomor;?>" readonly>
                        <input type="text" class="form-control"  name="nomor[]" placeholder="Masukkan Nomor Sertifikat Kalibrasi" required>
                     </div>

                     <div class=" form-group">
                    <label style="font-size: 14px;"  for="inputNama">Tanggal Kalibrasi(Opsional)</label>
                    <input type="text" class="form-control" value="<?php echo $sublogbookk->tanggal_k;?>" readonly>
                    <input type="date" class="form-control" name="tanggal_k[]" value="NULL" placeholder="Masukkan Tanggal">
                    </div>
                    
                    <!--<div class=" form-group">
                    <label for="inputNama" style="font-size: 16px;">Status(Opsional)</label> <br>
                    <label style="font-size: 14px;" for="inputNama">Pembayaran</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input  type="checkbox" name="pembayaran[]" value="1">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                    <label style="font-size: 14px;" for="inputNama">Kalibrasi</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="checkbox" name="kalibrasi[]" value="1">  <br>
                    <label style="font-size: 14px;" for="inputNama">Sertifikat</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="checkbox" name="sertifikat[]" value="1">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <label style="font-size: 14px;" for="inputNama">Selesai</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <input type="checkbox" name="selesai[]" value="1">
                    </div > -->

                    <div class=" form-group">
                        <label style="font-size: 16px;" for="inputNama">Petugas Kalibrasi</label>
                        <textarea type="text" class="form-control"  readonly><?php echo $sublogbookk->petugas_kalibrasi;?> </textarea>
                        <select  class="form-control" name="petugas_kalibrasi1[]">
                        <option style="font-size: 14px;" > &nbsp;</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Ahmad Ghozali, S.Tr.">Ahmad Ghozali, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Dearninta Agatha P.S, S.Tr.">Dearninta Agatha P.S, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Fauziatul Azhimah, S.Tr. Inst.">Fauziatul Azhimah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Khindi Aufa Hibatullah, S.Tr. Inst.">Khindi Aufa Hibatullah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Lido Fanther, S.T., M.T.">Lido Fanther, S.T., M.T.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Human Maulana, S.Tr.">Human Maulana, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="M. Wildan Abdulmajid, S.Tr.">M. Wildan Abdulmajid, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Mora Pasca Panjaitan, S.Tr. Inst.">Mora Pasca Panjaitan, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Romeo Kondouw, S.Si.">Romeo Kondouw, S.Si.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Rizky Ananda P., S.Tr., MT.">Rizky Ananda P., S.Tr., MT.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Siska Sulistyaningrum, S.Tr.">Siska Sulistyaningrum, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Tri Marista, S.Tr.">Tri Marista, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Waslina Rangkuti, S.Tr.">Waslina Rangkuti, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Wiclif Fahunambuala Wa'u, S.T.">Wiclif Fahunambuala Wa'u, S.T.</option style="font-size: 14px;" >
                     </select>   
                    </div>

                    <div class=" form-group">
                        <select  class="form-control" name="petugas_kalibrasi2[]">
            <option style="font-size: 14px;" > &nbsp;</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Ahmad Ghozali, S.Tr.">Ahmad Ghozali, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Dearninta Agatha P.S, S.Tr.">Dearninta Agatha P.S, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Fauziatul Azhimah, S.Tr. Inst.">Fauziatul Azhimah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Khindi Aufa Hibatullah, S.Tr. Inst.">Khindi Aufa Hibatullah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Lido Fanther, S.T., M.T.">Lido Fanther, S.T., M.T.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Human Maulana, S.Tr.">Human Maulana, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="M. Wildan Abdulmajid, S.Tr.">M. Wildan Abdulmajid, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Mora Pasca Panjaitan, S.Tr. Inst.">Mora Pasca Panjaitan, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Romeo Kondouw, S.Si.">Romeo Kondouw, S.Si.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Rizky Ananda P., S.Tr., MT.">Rizky Ananda P., S.Tr., MT.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Siska Sulistyaningrum, S.Tr.">Siska Sulistyaningrum, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Tri Marista, S.Tr.">Tri Marista, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Waslina Rangkuti, S.Tr.">Waslina Rangkuti, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Wiclif Fahunambuala Wa'u, S.T.">Wiclif Fahunambuala Wa'u, S.T.</option style="font-size: 14px;" >
                     </select>   
                    </div>

                    <div class=" form-group">
                        <select  class="form-control" name="petugas_kalibrasi3[]">
                        <option style="font-size: 14px;" > &nbsp;</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Ahmad Ghozali, S.Tr.">Ahmad Ghozali, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Dearninta Agatha P.S, S.Tr.">Dearninta Agatha P.S, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Fauziatul Azhimah, S.Tr. Inst.">Fauziatul Azhimah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Khindi Aufa Hibatullah, S.Tr. Inst.">Khindi Aufa Hibatullah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Lido Fanther, S.T., M.T.">Lido Fanther, S.T., M.T.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Human Maulana, S.Tr.">Human Maulana, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="M. Wildan Abdulmajid, S.Tr.">M. Wildan Abdulmajid, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Mora Pasca Panjaitan, S.Tr. Inst.">Mora Pasca Panjaitan, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Romeo Kondouw, S.Si.">Romeo Kondouw, S.Si.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Rizky Ananda P., S.Tr., MT.">Rizky Ananda P., S.Tr., MT.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Siska Sulistyaningrum, S.Tr.">Siska Sulistyaningrum, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Tri Marista, S.Tr.">Tri Marista, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Waslina Rangkuti, S.Tr.">Waslina Rangkuti, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Wiclif Fahunambuala Wa'u, S.T.">Wiclif Fahunambuala Wa'u, S.T.</option style="font-size: 14px;" >
                     </select>   
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                                <br>
                                <br>
                        <form method='post' action="<?= base_url('upload/hapus_logbook') ?>">
                                    <input type="hidden" id="id" name="id" value='<?php echo $sublogbookk->id; ?>'>
                                    <button style="border:none;" type='button' data-toggle="modal" data-target="#hapus<?php echo $sublogbookk->id; ?>" class="badge rounded-pill bg-danger text-light">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <div class="modal fade" id="hapus<?php echo $sublogbookk->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content bg-danger">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Apakah Anda Yakin Untuk Menghapusnya?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-light">Pilih "Ya" untuk mengonfirmasi</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-success" type="submit">Ya</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        
                        <?php  if($a>1){echo "</tr>";}
                        $a++ ;}}?>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </table>
</div>





                            
                            
                            






<div class="modal fade" id="inputLogbook" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputModalLabel">Tambahkan Log Kalibrasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('upload/logbook'); ?>" method="POST" >
                <div class=" form-group">
                        <label style="font-size: 16px;"  for="inputNama">No.Order</label>
                        <input type="text" class="form-control" id="order" name="order" placeholder="Masukkan No.Order">
                    </div>
                    <div style="font-size: 16px;" class=" form-group">
                        <label for="inputNama">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal" required>
                    </div>
                    <div class=" form-group">
                        <label  style="font-size: 16px;" for="inputNama">Instansi</label>
                        <input type="text" class="form-control"  name="instansi" placeholder="Masukkan Instansi" required>
                    </div>
                    <div class=" form-group  after-add-more">
                   <button type="button" class="btn btn-success add-more">Tambah Alat</button>
                    </div>

                    <div class="copy">
                        <div class="control-group " >
                        <div class=" form-group">
                        <label style="font-size: 16px;" for="inputNama">Alat</label>
                        <div class="text-center" style="font-size: 14px;" >
                                <input   style="width:  200px; height: 21px;" type="text" name="input1[]" required>
                                <span>/</span>
                                <input style="width: 65px; height: 21px;" type="text" name="input2[]" required>
                                <span>/</span>
                                <input  style="width: 65px; height: 21px;" type="text" name="input3[]" required>
                                <span>/</span>
                                <input style="width: 65px; height: 21px;"  type="text" name="input4[]" required>
                                </div>
                        <div class=" form-group">
                        <label  style="font-size: 16px;" for="inputNama">Identifikasi</label>
                        <input type="text" class="form-control"  name="identifikasi[]" placeholder="Masukkan Nomor Identifikasi" required>
                        </div>
                        <div class=" form-group">
                        <label for="inputNama" style="font-size: 16px;">Sertifikat Kalibrasi </label> <br>
                        <label style="font-size: 14px;" for="inputNama">Nomor</label> <br>
                        <input type="text" class="form-control"  name="nomor[]" placeholder="Masukkan Nomor Sertifikat Kalibrasi" required>
                     </div>

                     <div class=" form-group">
                    <label style="font-size: 14px;"  for="inputNama">Tanggal Kalibrasi(Opsional)</label>
                    <input type="date" class="form-control" name="tanggal_k[]" value="NULL" placeholder="Masukkan Tanggal">
                    </div>
                    
                    <!--<div class=" form-group">
                    <label for="inputNama" style="font-size: 16px;">Status(Opsional)</label> <br>
                    <label style="font-size: 14px;" for="inputNama">Pembayaran</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input  type="checkbox" name="pembayaran[]" value="1">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                    <label style="font-size: 14px;" for="inputNama">Kalibrasi</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="checkbox" name="kalibrasi[]" value="1">  <br>
                    <label style="font-size: 14px;" for="inputNama">Sertifikat</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="checkbox" name="sertifikat[]" value="1">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <label style="font-size: 14px;" for="inputNama">Selesai</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <input type="checkbox" name="selesai[]" value="1">
                    </div > -->

                    <div class=" form-group">
                        <label style="font-size: 16px;" for="inputNama">Petugas Kalibrasi</label>
                        <select  class="form-control" name="petugas_kalibrasi1[]">
                        <option style="font-size: 14px;" > &nbsp;</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Ahmad Ghozali, S.Tr.">Ahmad Ghozali, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Dearninta Agatha P.S, S.Tr.">Dearninta Agatha P.S, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Fauziatul Azhimah, S.Tr. Inst.">Fauziatul Azhimah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Khindi Aufa Hibatullah, S.Tr. Inst.">Khindi Aufa Hibatullah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Lido Fanther, S.T., M.T.">Lido Fanther, S.T., M.T.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Human Maulana, S.Tr.">Human Maulana, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="M. Wildan Abdulmajid, S.Tr.">M. Wildan Abdulmajid, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Mora Pasca Panjaitan, S.Tr. Inst.">Mora Pasca Panjaitan, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Romeo Kondouw, S.Si.">Romeo Kondouw, S.Si.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Rizky Ananda P., S.Tr., MT.">Rizky Ananda P., S.Tr., MT.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Siska Sulistyaningrum, S.Tr.">Siska Sulistyaningrum, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Tri Marista, S.Tr.">Tri Marista, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Waslina Rangkuti, S.Tr.">Waslina Rangkuti, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Wiclif Fahunambuala Wa'u, S.T.">Wiclif Fahunambuala Wa'u, S.T.</option style="font-size: 14px;" >
                     </select>   
                    </div>

                    <div class=" form-group">
                        <select  class="form-control" name="petugas_kalibrasi2[]">
            <option style="font-size: 14px;" > &nbsp;</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Ahmad Ghozali, S.Tr.">Ahmad Ghozali, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Dearninta Agatha P.S, S.Tr.">Dearninta Agatha P.S, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Fauziatul Azhimah, S.Tr. Inst.">Fauziatul Azhimah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Khindi Aufa Hibatullah, S.Tr. Inst.">Khindi Aufa Hibatullah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Lido Fanther, S.T., M.T.">Lido Fanther, S.T., M.T.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Human Maulana, S.Tr.">Human Maulana, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="M. Wildan Abdulmajid, S.Tr.">M. Wildan Abdulmajid, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Mora Pasca Panjaitan, S.Tr. Inst.">Mora Pasca Panjaitan, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Romeo Kondouw, S.Si.">Romeo Kondouw, S.Si.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Rizky Ananda P., S.Tr., MT.">Rizky Ananda P., S.Tr., MT.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Siska Sulistyaningrum, S.Tr.">Siska Sulistyaningrum, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Tri Marista, S.Tr.">Tri Marista, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Waslina Rangkuti, S.Tr.">Waslina Rangkuti, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Wiclif Fahunambuala Wa'u, S.T.">Wiclif Fahunambuala Wa'u, S.T.</option style="font-size: 14px;" >
                     </select>   
                    </div>

                    <div class=" form-group">
                        <select  class="form-control" name="petugas_kalibrasi3[]">
                        <option style="font-size: 14px;" > &nbsp;</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Ahmad Ghozali, S.Tr.">Ahmad Ghozali, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Dearninta Agatha P.S, S.Tr.">Dearninta Agatha P.S, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Fauziatul Azhimah, S.Tr. Inst.">Fauziatul Azhimah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Khindi Aufa Hibatullah, S.Tr. Inst.">Khindi Aufa Hibatullah, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Lido Fanther, S.T., M.T.">Lido Fanther, S.T., M.T.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Human Maulana, S.Tr.">Human Maulana, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="M. Wildan Abdulmajid, S.Tr.">M. Wildan Abdulmajid, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Mora Pasca Panjaitan, S.Tr. Inst.">Mora Pasca Panjaitan, S.Tr. Inst.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Romeo Kondouw, S.Si.">Romeo Kondouw, S.Si.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Rizky Ananda P., S.Tr., MT.">Rizky Ananda P., S.Tr., MT.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Siska Sulistyaningrum, S.Tr.">Siska Sulistyaningrum, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Tri Marista, S.Tr.">Tri Marista, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Waslina Rangkuti, S.Tr.">Waslina Rangkuti, S.Tr.</option style="font-size: 14px;" >
            <option style="font-size: 14px;"  value="Wiclif Fahunambuala Wa'u, S.T.">Wiclif Fahunambuala Wa'u, S.T.</option style="font-size: 14px;" >
                     </select>   
                    </div>
                    <div class=" form-group">
                        <span> <button type="button" class="btn btn-danger remove">Hapus Alat</button> </span>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
