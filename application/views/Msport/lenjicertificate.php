<div class="content-wrapper">
<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">Waraqaa Ragaa Leenjii Leenjisummaa</i></h3>


<div class="box box-default">
          <div class="box-headerS with-border">
           <h3 class="box-title"><a href="<?php echo base_url('MSport/Leenjisummaa') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left">Back To List </i></a> : <a class="btn btn-primary" onclick="myfun('divone')"><i class="fa fa-bars">Print </i></a></h3>
          </div>
          <div class="box-body" id="divone">
    <div style="color: black; display: table;
                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;" >
        <div style="border: 20px solid tan;
                width: 750px;
                height: 563px;
                display: table-cell;
                vertical-align: middle;" >
            <div style="  color: tan;" >
              <img style="height: 70px;" src="<?php echo base_url();?>dist/img/youthlogo.jpg" class="img-circle" alt="User Image"> Biiroo Dargaggoo fi Ispoortii Oromiyaa
            </div>

            <div style=" color: tan;
                font-size: 48px;
                margin: 20px;">
                Waraqaa Gahumsaa
            </div>

            <div style="margin: 20px;">
                Waraqaan Gahumsaa kun kan kennaameef
            </div>

            <div style="border-bottom: 2px solid black;
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 400px;">
                 <h3>Obbo/Aadde <?php echo $lenji->maqalenjia;?></h3>
            </div>

            <div style="margin: 20px;">
                Leenjii Leenjisummaa Gosa Ispoortii <strong><?php echo $lenji->type;?></strong> tin Sadarkaa Leenjii <strong> "<?php echo $lenji->slenji;?>"</strong> barachuun Guyyaa <?php echo $lenji->len_dob;?>  waraqaa gahumsaa kana badhafamaniiruu.
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  
  function mywholepage(){
    window.print();
  }
  function myfun(divone){
    var backup = document.body.innerHTML;
    var divcontent = document.getElementById('divone').innerHTML;
    document.body.innerHTML = divcontent;
    window.print();
    document.body.innerHTML = backup;
  }
</script>

