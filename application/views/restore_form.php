<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<h3>Restore Database</h3>
<hr>
<?php echo $error;?>
<?php echo $this->session->flashdata('pesan');?>
<?php echo form_open_multipart('hddman/prosesrestore');?>
<table class="table table-striped">
<tr>
<th>
Pilih File<br>
<input type="file" class="form-control" 
name="resfile" id="resfile" required>
</th>
<td><br>
<button type="submit" name="submit" 
class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Restore 
Database</button>
</td>
</tr>
</table>
<?php echo form_close();?>
</div>
</div>
</div> 