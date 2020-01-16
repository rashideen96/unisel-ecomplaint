<div id="studForm">
	
        <div class="col-md-6 col-sm-12">
            <div class="login-form2">
                <h2 class="text-center">Student</h2><hr>
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
                          <input type="submit" name="register" class="btn btn-primary btn-xs rounded-pill" value="Daftar" id="register" >
                        </div>
                        
                    </div>
                    
                </form>
            </div>
        </div>
   
</div>