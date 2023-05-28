		<div class="row">

            <div class="col-md-12">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="{SITE_URL}/users/add_done1/" enctype="multipart/form-data">

                              <input type="hidden" name="source" value="{source}" />


								<div class="form-group">

                                  <label class="col-lg-2 control-label">Nume</label>

                                  <div class="col-lg-5">

                                    <input id="nume" name="nume" type="text" placeholder="Nume" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>
		 

							  <div class="form-group">

                                  <label class="col-lg-2 control-label">Prenume</label>

                                  <div class="col-lg-5">

									<input id="prenume" name="prenume" type="text" placeholder="Prenume" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>

							  <div class="form-group" >

                                  <label class="col-lg-2 control-label">CNP</label>

                                  <div class="col-lg-5">

									<input id="cnp" name="cnp" type="text"  placeholder="CNP" class="form-control" onkeyup="validateCNP()" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>

								<div class="form-group">

                                  <label class="col-lg-2 control-label">Judet domiciliu</label>

                                  <div class="col-lg-5">

									<input id="judet" name="judet" type="text" placeholder="Judet" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>

								<div class="form-group">

                                  <label class="col-lg-2 control-label">Localitate domiciliu</label>

                                  <div class="col-lg-5">

									<input id="localitate" name="localitate" type="text" placeholder="Localitate" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>
								
								<div class="form-group">

                                  <label class="col-lg-2 control-label">Adresa domiciliu</label>

                                  <div class="col-lg-5">

									<input id="adresa" name="adresa" type="text" placeholder="Adresa" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div> </div>
									<div class="form-group">

                                  <label class="col-lg-2 control-label">Telefon</label>

                                  <div class="col-lg-5">

									<input id="telefon" name="telefon" type="text" placeholder="Telefon" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>
                               
								<div class="form-group">

                                  <label class="col-lg-2 control-label">Greutate</label>

                                  <div class="col-lg-5">

									<input id="greutate" name="greutate" type="text"  placeholder="Greutate" class="form-control" > 

                                  </div>

                                </div>
								<div class="form-group">

                                  <label class="col-lg-2 control-label">Inaltime</label>

                                  <div class="col-lg-5">

									<input id="inaltime" name="inaltime" type="text"  placeholder="Inaltime" class="form-control" > 

                                  </div>

                                </div>
								<div class="form-group">

                                  <label class="col-lg-2 control-label">Alergii</label>

                                  <div class="col-lg-5">

									<input id="alergii" name="alergii" type="text"  placeholder="Alergii" class="form-control" > 

                                  </div>

                                </div>
								
								<div class="form-group">

                                  <label class="col-lg-2 control-label">Istoric medical</label>

                                  <div class="col-lg-5">

									<textarea id="istoric_medical" name="istoric_medical" rows=4 type="text"  placeholder="Istoric medical" class="form-control" > </textarea>

                                  </div>

                                </div>

							  

								
				    

				                        <div class="form-group" style="padding-left: 25%;">
                                  <div class="col-lg-5">
									<input type="submit" class="buton_sumbit" id="" name="project_save" class="project_save" value="Adauga">
                                  </div>
                                </div>									 

                              </form>
              </div>  



            </div>



          </div>
		  
		  <script>
		  function validateCNP () {
			  var value = document.getElementById('cnp').value;
	var re = /^\d{1}\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])(0[1-9]|[1-4]\d| 5[0-2]|99)\d{4}$/,
		bigSum = 0,
		rest = 0,
		ctrlDigit = 0,
		control = '279146358279',
		i = 0;
	if (re.test(value)) {
		for (i = 0; i < 12; i++) {
			bigSum += value[i] * control[i];
		}
		ctrlDigit = bigSum % 11;
		if (ctrlDigit === 10) {
			ctrlDigit = 1;
		}

		if (ctrlDigit !== parseInt(value[12], 10)) {
			return false;
		} else {
			return true;
		}
	}
	return false;
};
		  </script>