<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
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
       Data User
       
      </h1>

        <a href="{{ url('user') }}?level=1" class="btn btn-info"> Level 1 </a>
        
        <a href="{{ url('user') }}?level=2" class="btn btn-info"> Level 2 </a>
       
        <a href="{{ url('user') }}?level=3" class="btn btn-info"> Level 3 </a>


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
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control" id="nama" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control" id="level" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label"> Email</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control" id="email" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label"> Pasword</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control" id="password" >
                            </div>
                        </div>

                       

                        </form>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="save_data()" >Save changes</button>
                  </div>
                </div>
              </div>
            </div>



           <br>
           <br>
            <a href="http://localhost/laravel8-com/public/excel-import/import-data-user-laravel8.xlsx" class="btn btn-success"> file format excel nya </a>
           <br> <br>
            <form class="form-inline">
                        <div class="form-group mb-2" style="margin-right: 10px;">
                         <strong> File Excel </strong>
                        </div>
                        <div class="form-group mx-sm-3 mb-2" style="margin-right: 10px;">
                            <label for="inputPassword2" class="sr-only">Password</label>
                            <input class="form-control" type="file" id="excelFile" accept=".xls,.xlsx"  >
                        </div>
                        <button id="btn_import" class="btn btn-primary" type="button" onclick="doImport()">Import</button>
            </form>


            <a href="{{ url('/user/scan') }}" class="btn btn-info"> Scan </a>
            <a href="{{ url('/user/add_row') }}" class="btn btn-info"> Add Row Javascript </a>


            </div>


            


            <div class="box-body">
                      <table class="table" id="example">
                    <thead>
                        <tr>
                        <th scope="col"> No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Level</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                       
                        <th scope="col">Foto </th>
                        <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>

                     <?php
                     

                      if(isset($_GET['level'])){  $level=$_GET['level']; }
                      else{  $level='1'; }

                      $data_page = DB::select("select  * from (
                        select * from users where level = '$level' 
                        ) v");


                     $no=1; 
                     foreach($data_page as $row){
                      ?>

                        <tr>
                            <td><?=$no++?></td>
                            <td>
                                <?=$row->name?>
                                <br>
                                <?php 
                                   $id = $row->id;
                                   $get_email = DB::select("select  * from (
                                                            select * from users 
                                                            where id = '$id' 
                                                            ) v");
                                    echo $get_email[0]->email; 
                                ?>
                            </td>
                            <td><?=$row->level?></td>
                            <td><?=$row->email?></td>
                            <td> <?=$row->password?></td>
                           
                            <td> 
                                <?=$row->foto?>

                                <input style="width:120px;" class="form-control" type="file" id="foto_change<?php echo $row->id?>" onchange="update_foto(<?php echo $row->id?>)">
                    
                                <!-- <img src="http://localhost/laravel8-com/public/img/<?php echo $row->foto?> " alt="" data-toggle="modal" data-target="#exampleModal<?php echo $row->id?>" style="width:50px;height:50px;border-radius:5px;"> -->
                                <img src="{{ asset('img') }}/<?php echo $row->foto?> " alt="" data-toggle="modal" data-target="#exampleModal<?php echo $row->id?>" style="width:50px;height:50px;border-radius:5px;">
                               

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <img src="http://localhost/laravel8-com/public/img/<?php echo $row->foto?> " alt="" data-toggle="modal"  style="width:100%;">
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>


                            </td>
                            <td>
                                   <?php 
                                   $idx =  $row->id;
                                   $param1 = $idx+1;
                                   $param2 = $idx+2;
                                   ?>

                                   
                                      <button class="btn btn-danger" onclick="delete_data(<?php echo $row->id?>)"> Delete </button>

                                             <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaledit<?php echo $row->id?>">
                                        Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModaledit<?php echo $row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">edit <?php echo $row->id?> </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                

                                            <form>
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                    <input type="text"  class="form-control" id="nama<?php echo $row->id?>"  value="<?php echo $row->name?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Level</label>
                                                    <div class="col-sm-10">
                                                    <input type="text"  class="form-control" id="level<?php echo $row->id?>" value="<?php echo $row->level?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label"> Email</label>
                                                    <div class="col-sm-10">
                                                    <input type="text"  class="form-control" id="email<?php echo $row->id?>" value="<?php echo $row->email?>">
                                                    </div>
                                                </div>
                                              

                                            

                                                </form>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="update(<?php echo $row->id?>)" >Save changes</button>
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
