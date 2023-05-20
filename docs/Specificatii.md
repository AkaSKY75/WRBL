# WEARABLE

## SISTEM PURTABIL DE SUPRAVEGHERE A STĂRII DE SĂNĂTATE
## Beneficiar: Clinica “Sănătatea noastră” 
## Dan Mircea-Aurelian – Programator Șef
## Criste Andrei-Cristian – Secretar
## Ștefănescu Adrian – Programator
## Sergiu Crăcăoanu – Consilier Medical
## Rotea Paul – Tester
 
## Cuprins
### [Memoriul tehnic....................4](#memoriul-tehnic)
### [Fundamentare.......................4](#fundamentare)
### [Cerințe funcționale................5](#cerinte-functionale)
### [Cerințe nefuncționale..............7](#cerinte-nefunctionale)
### [Analiză de risc....................7](#analiza-de-risc)
### [Arhitectura sistemului.............8](#arhitectura-sistemului)
### [Cazuri de utilizare (Use Case).....9](#cazuri-de-utilizare-use-case)
### [Modele de stare....................9](#modele-de-stare)
### [Interfețe cu alte sisteme.........10](#interfete-cu-alte-sisteme)
### [Evoluția sistemului...............10](#evolutia-sistemului)
### [Analiza SWOT......................10](#analiza-swot)
### [Planificarea lucrărilor...........11](#planificarea-lucrarilor)
### [Interfața cu utilizatorul.........12](#interfata-cu-utilizatorul)


 
## Memoriul tehnic
### Denumirea proiectului
Sistem purtabil de supraveghere a stării de sănătate

### Prefață
Prezentul proiect a demarat în data de 02.03.2023 prin prezentarea unei teme tehnice la sediul companiei noastre, de către dr. Ionescu Gheorghe, reprezentantul Clinica “Sănătatea noastră” care cu aceasta a solicitat demararea realizării unui proiect cu numele “Sistem purtabil de supraveghere a stării de sănătate”

### Nume de cod 
WRBL

## Fundamentare:
Hipocrat a avut o influență puternică asupra primelor dosare medicale din secolul al V-lea. S-a stabilit că înregistrările medicale servesc în primul rând două scopuri:
1. Cursul firesc al bolii trebuie să fie reflectat.
2. Este necesar să se identifice cauzele potențiale ale bolii.
Dosarele medicale au fost folosite de peste un secol ca instrument de asistare a personalului medical în îngrijirea pacienților. În lumea de astăzi, fișa medicală este folosită pentru o varietate de scopuri, inclusiv înregistrarea observațiilor, informarea altora, educarea elevilor, dobândirea de cunoștințe, monitorizarea performanței și justificarea intervențiilor.
Mai multe studii au constatat că pacienții internați nu pot fi sprijiniți în timp util și eficient de către personalul medical. Mai important, păstrarea fișierelor cu informații generale sau specifice vizibile. In cazul pacientilor care sufera de o afectiune cronica care se manifesta ca un numar mare de fisuri, intre medicii apar probleme materiale si conceptuale.
Mulți cercetători cred că înregistrările electronice ale pacienților vor schimba fundamental modul în care pacienții sunt îngrijiți, implicând mai mult decât simpla înlocuire a înregistrărilor pe hârtie și permițând ca datele să fie utilizate într-o gamă largă de scopuri, de la îngrijirea directă a pacientului până la sprijinul în luarea deciziilor, asigurarea calității, cercetare științifică și managementul riscurilor.
Pentru transferul computerizat sunt necesare schimbări fundamentale în modul în care sunt exprimate informațiile clinice. Aceasta este una dintre problemele care se ridică atunci când avem de-a face cu asistența medicală computerizată deoarece datele pacientului trebuie să fie reprezentate într-un format utilizabil.
Fisa Medicala pe Hartie (PPR)
Dosarele pacienților în format tradițional, pe hârtie, utilizate în clinici, conțin informații generale despre medici, asistente și alți furnizori de servicii medicale. Indicațiile se completează eventual cu date obținute din alte surse: rezultate ale testelor de laborator sau rapoarte care descriu rezultatele altor analize (imagini radiologice, ecografii, endoscopii). Cu excepția câtorva excepții, toate informațiile conținute în formularele de înregistrare a pacienților includ date alfanumerice.
Informațiile conținute în pumnul pacientului sunt un amalgam de simptome, observații, teste de laborator, planuri de tratament și așa mai departe. Notificările dezordonate nu pot oferi o imagine cuprinzătoare, în special pentru pacienții care suferă de afecțiuni multiple.
Fişele pe hârtie pot fi înregistrate urmărind un fir logic anume. În funcție de le putem împărți în trei categorii în ceea ce privește înregistrarea:
- Hipocrate a propus o fișă medicală cronologică (fișa medicală orientată pe timp), sec. V î.Hr. Aveți o bază de date de observații medicale în ordine cronologică.
- Fișă medicală orientată către sursă (fișă medicală orientată către sursă) - Datele din fișă sunt ordonate în funcție de modul în care au fost obținute: consultații, rapoarte radiologice, analize de sânge etc. Datele sunt ordonate cronologic în cadrul fiecărei secțiuni.
- Fişa medicală orientată pe problemă (episoade) - Lawrence Weed a propus acest concept pentru prima dată în 1968. Observaţiile medicale se păstrează separat pentru fiecare problemă de sănătate, urmând structura SOAP (Subiect - descrierea simptomelor de către pacient; Obiectiv - observaţii de către medicul sau asistentul; Evaluarea - rezultatele testelor, diagnostic; Planul - recomandări, plan de tratament și trimiteri). Este ușor de acceptat de gânditorii raționali, dar necesită practică pentru a fi pus în practică

## Cerințe funcționale
- ### Colectarea informațiilor de la utilizator cu ajutorul senzorilor:
În cadrul acestei funcționalități, parametri fiziologici ECG, umiditate, temperatură, puls precum și valorile provenite de la accelerometrul telefonului vor fi preluate de la cel ce utilizează sistemul. Parametri fiziologici vor fi citiți la fiecare 10 secunde, valorile asociate fiind transmise modulului Smartphone prin intermediul tehnologiei Bluetooth, iar la un interval de 30 de secunde se va realiza o medie a acestora cu ultimele 3 valori citite în vederea pasării acestor date modulului Cloud. În cazul în care anumite valori identificate de la senzori nu se vor regăsi între valorile normale, vor fi declanșate avertizări în urma citirilor la 10 secunde fără a se mai calcula media, iar transmiterea datelor către server se va realiza în mod asincron. Totodată, în ceea ce privesc valorile de la accelerometrul amintit, acestea vor fi captate o dată pe secundă în vederea corelării cu celelalte date, iar ulterior informațiile extrase vor fi transmise sub formă de mesaj burst care le va cuprinde pe toate către modulul Cloud
- ### Interfațarea cu beneficiarul modulului purtabil prin aplicația smartphone:
Prin intermediul acesteia se va asigura ilustrarea datelor preluate de la utilizator. Aplicația va fi responsabilă de monitorizarea în timp real a parametrilor fiziologici extrași de la senzori și semnalarea avertizărilor în cazul valorilor anormale. Totodată, prin intermediul acestei interfețe se va realiza conexiunea cu medicul prin afișarea recomandărilor acestuia, precum și activitățile și calendarul în care acestea vor trebui efectuate. În ceea ce privesc alarmele, acestora li se vor putea asocia diverse mesaje într-o casetă text în vederea informării medicului despre contextul în care au apărut. Spre exemplu, dacă utilizatorul decide să alerge, fapt care va determina creșterea anormală a ritmului cardiac înregistrat de senzori, medicul va putea fi informat despre această situație printr-un mesaj sugestiv de tipul „Alergare 10 minute”.
- ### Interfațarea cu utilizatori de tip medici sau pacienți prin aplicația WEB:
Datele extrase de la senzori vor putea fi vizualizate atât de către medici specialiști (cardiologi) cât și de către pacienți, aceștia vor trebui să acceseze link-ul https://wrbl.health în vederea utilizării platformei WEB asociate sistemului. În cadrul acesteia, datele vor putea fi afișate prin intermediul graficelor și să poată fi generate rapoarte cu acestea.
- ### Inserarea pacienților în baza de date și gestionarea datelor medicale aferente acestora:
Medicul va putea adăuga un nou pacient alături de datele demografice și medicale aferente acestuia. Medicul va putea modifica, şterge sau vizualiza datele pacientului, precum şi cele istorice sau grafice de evoluţie ale pacientului, inclusiv ale alarmelor/avertizărilor şi va introduce valorile normale pentru modulul inteligent, aceasta va fi personalizat pentru fiecare pacient.
- ### Crearea și vizualizarea fișei medicale de către medici
Medicul cardiolog va putea face consultații clasice față în față, iar în fișa pacientului se vor consemna motivul prezentării, simptome, diagnostic (codificat ICD-10), trimiterile (la analize, la spital, la tratamente, la proceduri), rețetele generate. Medicul va putea vedea consultațiile anterioare, sub formă tabelară. Pacientul va putea vizualiza propria fişă, recomandările date de către medic şi un istoric al activităţilor şi valorilor citite, inclusiv sub formă de grafice, respectiv un istoric al alarmelor/avertizărilor create de medic şi înregistrate în cadrul monitorizării.
- ### Comunicarea cu medicii de familie
Dacă medicul de familie a generat o trimitere la consult de specialitate, sistemul primește această cerere de la sistemul informatic respectiv (proiectul celeilalte echipe) sub formă de mesaj HL7 (nereprezentat în figură). Medicul specialist vede trimterile și în urma consultării pacientului va trimite medicului de familie o scrisoare medicală în același format folosind HL7 FHIR (Fast Healthcare Interoperability Resources).
- ### Stabilirea recomandărilor și a alarmelor/avertizărilor de către medici
Recomandările vor fi create de către medic şi vor conţine: tipul recomandării (ex.: bicicletă, alergat, plimbare, alte tipuri de activităţi fizice etc.), durata
zilnică, alte indicaţii. De asemenea, medicul va avea posibilitatea să definească alarme şi avertizări în caz că valorile senzorilor vor depăşi limite fixate de acesta, alarme condiţionate şi de durata de persistenţă şi de intervalul scurs de la debutul activităţilor fizice.
- ### Realizarea conexiunii în rețea:
Prin intermediul modulului Cloud va fi realizat schimbul de informații între pacienți și medici. Totodată, în cadrul serverului va rula aplicația WEB și baza de date SQL.
 

## Cerințe nefuncționale
Este necesară asigurarea corespunzătoare a conexiunii la internet pentru ca modulul Cloud să poată comunica în permanență cu restul dispozitivelor asociate care includ smartphone-ul pacienților și platformele capabile să acceseze aplicația WEB având instalat un browser. De asemenea, va trebui asigurat un minim de nivel al bateriei telefonului mobil pentru ca aplicația să poată funcționa, caz în care se recomandă o baterie externă, iar in ceea ce privește alimentarea plăcuței Arduino, se va putea folosi un modul bazat pe baterii reîncărcabile de tip 16340 Rechargeable Lithium Charging (https://www.aliexpress.com/i/32955019430.html). Valorile de consum înregistrare pentru plăcuța Arduino vor fi de 0.161 Wh în modul de hibernare, iar primirea informației de la senzori, în modul de funcționare standard, va consuma 0.2325 Wh. Funcționalitățile prezentate nu necesită un timp îndelungat de răspuns, în cazul în care apar întârzieri neașteptate, se recomandă reluarea procesului aferent contextului la care se face referire. În ceea ce privește spațiul de stocare, este necesară stabilirea anumitor limite, cum ar fi numele, prenumele și adresa de lungime maximă a pacienților. Modulul Cloud dezvoltă o putere electrică de aproximativ 0.06498 kWh,
Se propune utilizarea unui server propriu cu o putere de procesare de minim 2.90GHz pentru a se putea gestiona o cantitate mare de cereri provenite de la informațiile preluate de la senzori în vederea stocării lor în baza de date, dar și a cererilor de tip HTTPS în vederea utilizării platformei WEB. Sistemul va fi proiectat astfel încât să fie capabil să funcționeze 24 ore din 24, pentru a permite efectuarea unor măsurători și pe durata somnului pacienților.

## Analiză de risc
O posibilă funcționare necorespunzătoare a sistemului o constituie rularea ansamblului prezentat fără acces la rețea în cazul în care utilizatorul nu se mai află într-o zonă de acoperire a furnizorului de internet. Pentru ca datele preluate de la senzori să nu fie pierdute, la fiecare cerere efectuată către Cloud se va aștepta un mesaj de răspuns pentru a avea confirmarea că a fost realizat cu succes transferul de date. Se va seta un anumit interval de timp de 30 de secunde (timpul minim de așteptare între mesaje successive de date) în care, dacă serverul nu va răspunde, se va declanșa pe smartphone modul de avarie al aplicației. În cadrul acestui mod de funcționare, datele vor fi în continuare preluate de la senzori, însă se vor stoca local într-un fișier nou creat până ce conexiunea cu serverul va fi restabilită. La momentul în care serverul va răspunde cererilor de reconectare efectuate la fiecare 30 de secunde, se va cunoaște faptul că a fost declanșat modul de avarie pe telefonul mobil printr-un mesaj specific. În mod asincron cu acțiunile de preluare și trimitere la Cloud a valorilor de la senzori, mesajele stocate în fișierul salvat local pe smartphone vor fi transmise la rândul lor fiind specificate coordonatele de timp.
 


## Arhitectura sistemului 
 
Figura 1. Arhitectura generală a sistemului
 
## Cazuri de utilizare (Use Case)
 
Figura 1 Caz de utilizare general

## Modele de stare 
 
Figura 2
 
Figura 3

## Interfețe cu alte sisteme
Sistemul va trebui să asigure schimbul de mesaje de tip HL7 între medici de familie și medici specialiști în cadrul trimiterilor.

## Evoluția sistemului
Eventualele îmbunătățiri vor avea în vedere modficiări ale senzorilor în vederea obținerii de performanțe și mai bune, creșterea numărului de servere pentru a oferi timp de răspuns la cereri și mai bune prin utilizarea tehnologiilor bazate pe clustere.

## Analiza SWOT
|              |              |
| ------------ | ------------ |
| <h4>Puncte tari</h4><ul><li>Monitorizarea în permanență prin intermediul senzorilor a ritmului cardiac în vederea prevenirii diverselor afecțiuni</li><li>Posibilitatea de a comunica repede și eficient cu medicul specialist în vederea stabilirii recomandărilor medicale</li><li>Vizualizarea în timp real a alertelor declanșate în urma detectării valorilor anormale a inimii</li></ul> | <h4>Puncte slabe</h4><ul><li>Alimentarea plăcuței Arduino cu baterii</li><li>Nevoia constantă de a înlocui clemele de prindere a senzorului ECG întrucât acestea se deteriorează</li><li>Datele sensibile ale pacienților care trebuiesc securizate</li></ul> |
| <h4>Oportunități</h4><ul><li>Interesul crescut față de aplicațiile medicale</li><li>Implementarea standardelor pentru a putea comunica și cu alte clinici</li><li>Dezvoltarea continuă a aplicației care va duce la implementarea serviciilor de tip abonamente</li></ul> | <h4>Amenințări</h4><ul><li>Existența pe piață a mai multor produse asemănătoare cu cel dezvoltat</li><li>Reticența medicilor de a renunța la fișele în format fizic pentru a nu depune muncă suplimentar</li><li>Frica pacienților de a utiliza sisteme medicale în lipsa medicilor care să îi coordoneze la fața locului</li></ul> |

## Planificarea lucrărilor
 
Figura 4
 
## Interfața cu utilizatorul
### Interfața cu utilizatorul – Aplicația mobilă 
 
Figura 5 - Ecranul de înregistrare
 
Figura 6 – Ecranul de activitati pentru pacient


 
Figura 7 - Ecranul de autentificare
 
Figura 8 - Ecranul unei activitati
 

 
Figura 9 - Ecranul de măsurători




 
### Interfața cu utilizatorul – Paginile web 

 
Figura 10 - Autentificare și înregistrare web

 
Figura 11 - Adăugare pacient 
  
Figura 12 - Listă pacienți
 
  
Figura 13 - Vizualizare pacient
 



 
  
 
Figura 14 - Adăugare consultație
 
  
Figura 14 - Listă consultații

 

