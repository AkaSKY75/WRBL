      <style>
#myInput {
  background-image: url('{BASE_URL}/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin-left: -1%;
}
</style>  <div class="row">

            <div class="col-md-12">

<div class="row" style="margin-left: 15%;">
								<div class="col-md-10" ><input  type="text" id="myInput" onkeyup="myFunction()" placeholder="Cauta.." title="Cautare">
								</div>
								</div>

    <table align="center" cellpadding="0" cellspacing="0" border="0" id="myTable" >

										<thead style="font-weight: bold;">

											<tr align="center">
												<td  onclick="sortTable(0)"style="background:#eef1f8 color:black">Nume si prenume</td>
												<td style="background:#eef1f8 color:black;"> CNP</td>

												<td style="background:#eef1f8 color:black;">Varsta</td>	
												<td style="background:#eef1f8 color:black;">Data nasterii</td>	

												
												<td style="background:#eef1f8 color:black;">Telefon </td>
												<td style="background:#eef1f8 color:black;">Actiuni</td>

											</tr>

										</thead>

										<tbody>

												{USERS}

												<tr align="center" {culoare}>
<td style="background:#eef1f8; color:#fe0000;">{nume} {prenume}</td>
													<td style="background:#eef1f8 color:black;">{cnp}</td>

													

													<td style="background:#eef1f8 color:black;">{varsta}</td>
													

													<td style="background:#eef1f8 color:black;">{data_nasterii}</td>
													<td style="background:#eef1f8 color:black;">{telefon}</td>
												

													

													

													<td style="background:#074486; color:white;" >

													<a style="color:white" class="link" href="{SITE_URL}/users/view_profile/{cnp}">Vezi fisa pacientului</a>&nbsp;&nbsp;&nbsp;	
													<a style="color:white" class="link" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}">Vezi consultatii</a>&nbsp;&nbsp;&nbsp;
													<a  style="color:white" class="link" href="{SITE_URL}/users/edit_pacient/{cnp}">Editeaza</a>&nbsp;&nbsp;&nbsp;

													<!--<a  style="color:white" class="link" href="{SITE_URL}/users/delete/{CNP}" onclick='return confirm("Doriti stergerea cursantului {prenume} {nume}?")'>Sterge</a>	
													-->
													</td>

												</tr>	

												{/USERS}

										</tbody>

									</table>

              </div>  

              

            </div>

<script>

function myFunction() {
  var input, filter, table, tr, td, i;
  //myInput este id-ul input-ului de cautare din care ia string-ul pe care il cauta
  input = document.getElementById("myInput");
  //filter e valoarea din input
  filter = input.value.toUpperCase();
  //myTable este id-ul tabelului in care va cauta string-ul
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  //cauta pe fiecare rand
  for (i = 1; i < tr.length; i++) { // de la primul rand (1), nu din header, header-ul e 0
    tr[i].style.display = "";
    var found = false; 
    //cauta in fiecare coloana de pe rand
    for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
      var td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) { //daca se potriveste macar partial
          found = true;
        }
      }
    }
    //daca a gasit valoarea 
    if (found) {
      tr[i].style.display = ""; //ramane vizibila
    } else {
      tr[i].style.display = "none"; //altfel nu o afiseaza
    }
    
  }
}


function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //am setat tipul de sortare
  dir = "asc"; 
  
  while (switching) {
    //presupunem ca nu s-a inversat nici o valoare
    switching = false;
    rows = table.rows;
    /*trece prin toate randurile, in afara de header, care are indexul 0*/
    for (i = 1; i < (rows.length - 1); i++) {
      //presupunem ca nu trebuiesc schimbate elementele
      shouldSwitch = false;
      /*comparam elementele din randuri consecutive*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*verificam in fucntie de directia sortarii, ascendent sau descendent*/
      if (dir == "asc") {
		  //daca trbeuiesc schimbate
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //le marcam pentru schimbare si intrerupem for-ul
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
		  //la fel pentru descrescator
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
	//daca elemntele trebuiesc schimbate intre ele
    if (shouldSwitch) {
      /*le interschimbam si marcam faptul ca am facut o schmbare*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //de fiecare data cand schimbam, marim un contor
      switchcount ++;      
    } else {
      /*daca nu s-a facut nici os chimbare si directia e ascendenta, o schimbam in descendenta, 
	  inseamna ca utilizatorul a apasat a sa sorteze din nou*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>