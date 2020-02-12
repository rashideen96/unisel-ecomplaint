<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Daftar Pelajar</title>
</head>
<body>
<!-- <div class="w3-center">
    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div> -->
<!-- <br> -->
<div class="container">
    <div class="row pb-3">
        <div class="col-lg-12 text-center">
            
        <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="">
        <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
        </div>
    </div>
</div>

<?php include("include/nav.php"); ?>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <form>
                <div class="form-group">
                    <label>Login Sebagai: </label>
                    <select name="login">
                        <option value="pelajar">--Sila Pilih--</option>
                        <option value="pelajar">Pelajar</option>
                        <option value="staff">Staf</option>
                        <option value="technician">Technician</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                
            
            </form>
        </div>
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center">Student Registration / Daftar Pelajar</h2><hr>

                    <form action="" method="post" id="formRegisterStudent">

                        <div class="form-group row">
                            <label for="matricNo" class="col-sm-4 col-form-label">Student ID / ID Pelajar</label>
                            <div class="col-sm-8">
                              <input type="text"  name="no_matrik" class="form-control form-control-sm rounded-0" id="no_matrik" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Name / Nama</label>
                            <div class="col-sm-8">
                              <input type="text" name="name" class="form-control form-control-sm rounded-0" id="nama" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emel" class="col-sm-4 col-form-label">Email / Emel</label>
                            <div class="col-sm-8">
                              <input type="emel" name="emel" class="form-control form-control-sm rounded-0" id="emel" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone No / No Telefon</label>
                            <div class="col-sm-8">
                              <input type="text" name="no_telefon" class="form-control form-control-sm rounded-0" id="phone" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Faculty / Fakulti</label>
                            <div class="col-sm-8">
                                <select name="fakulti" id="fakulti" class="form-control form-control-sm rounded-0" required>
                                    <option value="">--Sila Pilih--</option>
                                    <option value="Faculty Communication Visual Arts & Computing">Faculty Communication
                                        Visual Arts & Computing</option>
                                    <option value="Faculty Engineering & Life Science">Faculty Engineering & Life
                                        Science</option>
                                    <option value="Faculty Education & Science Social">Faculty Education & Science
                                        Social</option>
                                    <option value="Faculty Business & Accounting">Faculty Business & Accounting</option>
                                    <option value="Center of Foundation">Center of Foundation</option>
                                </select>
                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course" class="col-sm-4 col-form-label">Course / Aliran</label>
                            <div class="col-sm-8">
                              <input type="text" name="aliran" class="form-control form-control-sm rounded-0" id="course" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password / Kata Laluan</label>
                            <div class="col-sm-8">
                              <input type="password" name="password" class="form-control form-control-sm rounded-0" id="password" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password2" class="col-sm-4 col-form-label">Confirm Password / Sahkan Kata Laluan</label>
                            <div class="col-sm-8">
                              <input type="password" name="password2" class="form-control form-control-sm rounded-0" id="password2" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                              <input type="submit" class="btn btn-primary btn-xs rounded-pill" value="Daftar" id="register">
                            </div>
                            <div class="col-sm-2">
                              <input type="reset" class="btn btn-primary btn-xs rounded-pill" value="Batal" id="cancel">
                            </div>
                        </div>
                        <!-- <table class="w3-table w3-border">
                            <tbody> -->
                            
                            <!-- <tr>
                                <th width="20%">Student ID / ID Pelajar</th>
                                <td><input type="text" name="no_matrik" class="w3-input w3-border" autocomplete="off" id="no_matrik" required></td>
                            </tr> -->
                            <!-- <tr>
                                <th>Name / Nama</th>
                                <td><input type="text" name="name" class="w3-input w3-border" autocomplete="off" required></td>
                            </tr> -->
                            <!-- <tr>
                                <th>Email / Emel</th>
                                <td><input type="email" name="emel" class="w3-input w3-border" autocomplete="off" required></td>
                            </tr> -->
                            <!-- <tr>
                                <th>Phone No / No Telefon</th>
                                <td><input type="text" name="no_telefon" class="w3-input w3-border" autocomplete="off" required></td>
                            </tr> -->
                            <!-- <tr>
                                <th>Faculty / Fakulti</th>
                                <td>
                                    <select name="fakulti" id="fakulti" class="w3-input w3-border" required>
                                        <option value="">--Sila Pilih--</option>
                                        <option value="Faculty Communication Visual Arts & Computing">Faculty Communication
                                            Visual Arts & Computing</option>
                                        <option value="Faculty Engineering & Life Science">Faculty Engineering & Life
                                            Science</option>
                                        <option value="Faculty Education & Science Social">Faculty Education & Science
                                            Social</option>
                                        <option value="Faculty Business & Accounting">Faculty Business & Accounting</option>
                                        <option value="Center of Foundation">Center of Foundation</option>
                                    </select>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <th>Course / Aliran</th>
                                <td><input type="text" name="aliran" class="w3-input w3-border" autocomplete="off" required></td>
                            </tr> -->
                            <!-- <tr>
                                <th>Password / Kata Laluan</th>
                                <td><input type="password" id="password" name="password" class="w3-input w3-border" required></td>
                            </tr>
                            <tr>
                                <th>Confirm Password / Sahkan Kata Laluan</th>
                                <td><input type="password" id="password2" name="password2" class="w3-input w3-border" required></td>
                            </tr> -->
                            <!-- <tr>
                                <th colspan="2" class="w3-center">
                                    <input type="submit" name="login" class="w3-button w3-light-grey" value="Daftar">
                                    <input type="reset" name="reset" class="w3-button w3-light-grey" value="Batal">
                                </th>

                            </tr> -->
                            <!-- </tbody>
                        </table> -->
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="w3-container">
    <div class="w3-cell-row">
        <!-- <div class="w3-container w3-light-grey w3-cell" style="width: 200px;">
            <ul class="w3-ul">
                <li><a href="login.php"><img src="https://img.icons8.com/plasticine/2x/password.png" alt=""
                                             width="40px" height="40px">Login</a></li>

            </ul>
        </div> -->
        <div class="w3-cell-row">



            <div class="w3-container w3-cell">
                <h4 class="w3-center" id="mesej"></h4>
                <form action="" method="post" id="formRegisterStudent">
                <table class="w3-table w3-border">
                    <tbody>
                    <tr>
                        <th colspan="2" class="w3-center w3-light-grey">Student Registration / Daftar Pelajar</th>
                    </tr>
                    <tr>
                        <th width="20%">Student ID / ID Pelajar</th>
                        <td><input type="text" name="no_matrik" class="w3-input w3-border" autocomplete="off" id="no_matrik" required></td>
                    </tr>
                    <tr>
                        <th>Name / Nama</th>
                        <td><input type="text" name="name" class="w3-input w3-border" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <th>Email / Emel</th>
                        <td><input type="email" name="emel" class="w3-input w3-border" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <th>Phone No / No Telefon</th>
                        <td><input type="text" name="no_telefon" class="w3-input w3-border" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <th>Faculty / Fakulti</th>
                        <td>
                            <select name="fakulti" id="fakulti" class="w3-input w3-border" required>
                                <option value="">--Sila Pilih--</option>
                                <option value="Faculty Communication Visual Arts & Computing">Faculty Communication
                                    Visual Arts & Computing</option>
                                <option value="Faculty Engineering & Life Science">Faculty Engineering & Life
                                    Science</option>
                                <option value="Faculty Education & Science Social">Faculty Education & Science
                                    Social</option>
                                <option value="Faculty Business & Accounting">Faculty Business & Accounting</option>
                                <option value="Center of Foundation">Center of Foundation</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Course / Aliran</th>
                        <td><input type="text" name="aliran" class="w3-input w3-border" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <th>Password / Kata Laluan</th>
                        <td><input type="password" id="password" name="password" class="w3-input w3-border" required></td>
                    </tr>
                    <tr>
                        <th>Confirm Password / Sahkan Kata Laluan</th>
                        <td><input type="password" id="password2" name="password2" class="w3-input w3-border" required></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="w3-center">
                            <input type="submit" name="login" class="w3-button w3-light-grey" value="Daftar">
                            <input type="reset" name="reset" class="w3-button w3-light-grey" value="Batal">
                        </th>

                    </tr>
                    </tbody>
                </table>
                </form>


            </div>



        </div>
        
    </div>


    <br>
    <?php require_once "include/footer.php"; ?>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        // $('#no_matrik').on('focusout', function(){
        //     var val = $(this).val();
        //     console.log(val);
        //     // $('#validate_matrik').text(val);
        //     // alert(val);
        // });

        $('#formRegisterStudent').on('submit', function(e){
            e.preventDefault();

            var password = $('#password').val();
            var password2 = $('#password2').val();

            if (password !== password2) {
                // console.log('password not matching');
                 $('#mesej').text('Kata Laluan Tidak Sama');
            } else {
                // console.log(password+password2);
                var data = $(this).serialize();
                $.ajax({
                    url: "processRegStud.php",
                    method: "POST",
                    data: data,
                    success: function(data){
                        $('#mesej').html(data);
                    },
                    error: function() {
                        alert('error handling here');
                    }
                });
                $('#password').val('');
                $('#password2').val('');
                $('#fakulti').val('');
                $('#formRegisterStudent').trigger("reset");

            }
           

            

        });
    });
</script>
<style>
    .bg-danger{
        color: red;
    }
</style>
</html>