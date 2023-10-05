<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Task </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('AdminLTE2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('AdminLTE2/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('AdminLTE2/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('AdminLTE2/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('AdminLTE2/dist/css/skins/_all-skins.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('template.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('template.sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Data Task
       
      </h1>

       


      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box box-info">
            <div class="box-header">
                 <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             Add
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    

                  <form>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Task</label>
                            <div class="col-sm-10">
                            
                            <select class="form-control" id="task">

                            <?php 
                            $get_task = DB::select("select  * from m_category_task");
                            foreach ($get_task as $item) {
                            ?> 

                           
                                <option value="<?=$item->id?>"> <?=$item->item_category?> </option>
                               
                         

                           <?php } ?>

                           </select>


                           
                            </div>
                        </div>


                        <input type="hidden" value="<?=auth()->user()->id?>" id="id_user">
                        </form>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="save_data()" >Submit </button>
                  </div>
                </div>
              </div>
            </div>



           <br>
          
          

           


            </div>


            


            <div class="box-body">
                      <table class="table" id="example">
                    <thead>
                        <tr>
                        <th scope="col"> No</th>
                        <th scope="col"> Nama</th>
                        <th scope="col">Task</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>

                     <?php
                     $id_user = auth()->user()->id;

                      $data_page = DB::select("SELECT *,a.created_at insert_date,a.id id_task FROM task a left join m_category_task b on a.id_category=b.id where a.id_user = '$id_user' ");


                     $no=1; 
                     foreach($data_page as $row){
                      ?>

                        <tr>
                            <td><?=$no++?></td>
                            <td>
                                <?php 
                                $data_page = DB::select("select * from users where id = '$id_user' ");
                                echo $data_page[0]->name;

                                ?>
                            </td>
                            <td> <?=$row->item_category?></td>
                           
                            <td> 
                                <?=$row->insert_date?>

                                
                            </td>
                            <td>
                                  

                                   
                                      <button class="btn btn-danger" onclick="delete_data(<?php echo $row->id_task?>)"> Delete </button>

                                             <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaledit<?php echo $row->id_task?>">
                                        Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModaledit<?php echo $row->id_task?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">edit  </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                

                                            <form>
                                               <!-- <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Task</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="<?=$row->insert_date?>"> 
                                                    </div>
                                                </div> -->

                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Task</label>
                                                    <div class="col-sm-10">
                                                       
                                                    <select class="form-control" id="task<?=$row->id_task?>">
                                                       

                                                        <?php 
                                                        $get_task = DB::select("select  * from m_category_task");
                                                        foreach ($get_task as $item) {
                                                        ?> 
                                                            <option value="<?=$item->id?>"> <?=$item->item_category?> </option>
                                                    
                                                        <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>
                                                
                                              

                                              
                                              

                                            

                                                </form>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="update(<?php echo $row->id_task?>)" > Update</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                    </table>


                   
            </div>
           
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('template.footer')

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('AdminLTE2/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('AdminLTE2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('AdminLTE2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('AdminLTE2/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE2/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE2/dist/js/demo.js') }}"></script>



<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  
<!-- <script  type="text/javascript" charset="utf8" src="  https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script  type="text/javascript"  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script  type="text/javascript"  src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script  type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script  type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script  type="text/javascript"  src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
 <script  type="text/javascript"  src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>


 <!-- library exel -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"> </script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script>
        // let table = new DataTable('#example', {
        //     dom: 'Bfrtip',
        //                 buttons: [
        //                     'excel','pdf','copy'
        //                 ]
        // });

        $('#example').DataTable( {
            dom: 'Bfrtip',
                buttons: [
                    'excel','pdf','copy'
                ]
        } );

    </script>




<script>
      function save_data() {
        let task = $('#task').val()
        let id_user = $('#id_user').val()
        
       
      
        if(task == '' ){ alert('Mohon isi task ... ')}
        else{

            let formData = new FormData();
            formData.append('task', task);
            formData.append('id_user', id_user);
           
            
        

            fetch('{{ route('simpan_task') }}',
                    {
                        method:'POST',
                        body:formData,
                        headers: {
                              'X-CSRF-TOKEN': '{{ csrf_token() }}',
                          },
                    }
                )
                    .then(json => json.text())
                    .then(
                        function (res){
                        alert(res)
                        console.log(res)
                        location.reload()
                        }
                    )

              }

       
        
    }


    function update_foto (id) {
            let foto2 = document.getElementById('foto_change'+id);

            let formData = new FormData();
            formData.append('foto', foto2.files[0]);
            formData.append('id', id);

            fetch('{{ route('update_foto') }}',
                    {
                        method:'POST',
                        body:formData,
                        headers: {
                              'X-CSRF-TOKEN': '{{ csrf_token() }}',
                          },
                    }
                )
                    .then(json => json.text())
                    .then(
                        function (res){
                        alert(res)
                        console.log(res)
                        location.reload()
                        }
                    )

    }


    function update(id) {
        let task = $('#task'+id).val()
       
        

        if(task == '' ){ alert('Mohon isi task ... ')}
        else{

            let formData = new FormData();
            formData.append('id', id);
            formData.append('task', task);
           
        

            fetch('{{ route('update_task') }}',
                    {
                        method:'POST',
                        body:formData,
                        headers: {
                              'X-CSRF-TOKEN': '{{ csrf_token() }}',
                          },
                    }
                )
                    .then(json => json.text())
                    .then(
                        function (res){
                        alert(res)
                        console.log(res)
                        location.reload()
                        }
                    )

              }

       
        
    }


    function delete_data(id) {
  //  alert(id)


   let conf = confirm('Yakin ... ?')
       if(conf){
            let formData = new FormData();
            formData.append('id', id);

             
               fetch('{{ route('delete_task') }}',
                    {
                        method:'POST',
                        body:formData,
                        headers: {
                              'X-CSRF-TOKEN': '{{ csrf_token() }}',
                          },
                    }
                )
                    .then(json => json.text())
                    .then(
                        function (res){
                        alert(res)
                        console.log(res)
                        location.reload()
                        }
                    )
       }


  }



</script>




<script>
      let H = {};
    // window.unescape = window.unescape || window.decodeURI;

    H.ExcelToJSON = async (files) => {
        return new Promise((resolve)=>{
            let result;
            // XLSX.utils.json_to_sheet(data, 'out.xlsx');
            if(files){
                let fileReader = new FileReader();
                fileReader.readAsBinaryString(files);
                fileReader.onload = async (event)=>{
                    let data = event.target.result;
                    let workbook = XLSX.read(data,{type:"binary", cellDates: true});

                    //  workbook.SheetNames.forEach(sheet => {
                    //       let rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheet]);
                    //     //   document.getElementById("jsondata").innerHTML = JSON.stringify(rowObject,undefined,4)
                    //  });
                    result = XLSX.utils.sheet_to_row_object_array(workbook.Sheets['Sheet1']);

                    result.map( obj => {
                        Object.keys(obj).forEach((key) => {
                            var replacedKey = key.trim().replace(/\s\s+/g, "_");
                            if (key !== replacedKey) {
                                obj[replacedKey] = obj[key];
                                delete obj[key];
                            }
                        });
                    })

                    return resolve(result)
                }
            }
        })

    }


    const doImport = async () => {
        const selectedFile = $('#excelFile')[0].files[0];
        if(selectedFile){
            let btn = document.getElementById('btn_import')
                 btn.innerHTML = 'Loading ...';
                 btn.disabled = true;

            const dataFromFile = await H.ExcelToJSON(selectedFile);
            // let data = Object.keys(dataFromFile).reduce((prev, current) => ({ ...prev, [current.toLowerCase()]: dataFromFile[current]}), {});

            console.log(dataFromFile);
           

            var form_data = new FormData();
            form_data.append('data', JSON.stringify(dataFromFile));

           await  fetch('{{ route('import') }}',
                    {
                        method:'POST',
                        body:form_data,
                        headers: {
                              'X-CSRF-TOKEN': '{{ csrf_token() }}',
                          },
                    }
                )
                .then( res => res.text())
                .then( res => {
                        alert(res);
                        location.reload();
                })

        }else{
            alert('Mohon isi file ...')
        }
    }

</script>


</body>
</html>
