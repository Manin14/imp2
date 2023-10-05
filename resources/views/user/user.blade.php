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

            <!-- jQuery 3 -->
<script src="{{ asset('AdminLTE2/bower_components/jquery/dist/jquery.min.js') }}"></script>

            <script>
                  function save_data() {
                    let nama = $('#nama').val()
                    let level = $('#level').val()
                    let email = $('#email').val()
                    let password = $('#password').val()
                
                
                    if(nama == '' ){ alert('Mohon isi nama ... ')}
                    else if(level == '' ){ alert('Mohon isi email ... ')}
                    else if(email == '' ){ alert('Mohon isi no_hp ... ')}
                    
                    else{

                        let formData = new FormData();
                        formData.append('name', nama);
                        formData.append('level', level);
                        formData.append('email', email);
                        formData.append('password', password);
                        
                    

                        fetch("{{ route('simpan_user') }}",
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