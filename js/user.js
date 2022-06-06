  
        function validate() {
            $('#adform input[type="text"]').each(function() {
                if(this.required){
                    if(this.value==""){
                        $(this).addClass("inpterr");
                    }
                    else{
                        $(this).addClass("inpterrc");
                    }
                }
            
                if($(this).attr("VT")=="NM"){
                    if((!isAlpha(this.value)) && this.value!=""){
                    alert("Only Aplhabets Are Allowed . . .");
                    $(this).focus();
                    }
                }

                if($(this).attr("VT")=="PH"){
                    if((!isPhone(this.value)) && this.value!=""){
                        alert("Check the phone number format . . .");
                        $(this).focus();
                    }
                }

                if($(this).attr("VT")=="EML"){
                    if(!IsEmail($(this).val()) && this.value!=""){
                        alert("Invalid Email . . . .");
                        $(this).focus();
                    }
                }	

                if($(this).attr("VT")=="PIN"){
                    if((!IsPin(this.value)) && this.value!=""){
                        alert("Invalid Pin Code . . . .");
                        $(this).focus();
                    }
                }

            });
        }
        
        function isAlpha(x){
            var re = new RegExp(/^[a-zA-Z\s]+$/);
            return re.test(x);
        }
        
        function isPhone(x){
            var ph = new RegExp (/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);  
            //if(!ph.length<10)
            return ph.test(x);
        }

        function IsEmail(x) {
            var em = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
            return em.test(x);
        }
        
        function IsPin(x){
            var pin = new RegExp (/^\d{6}$/);
            return pin.test(x);
        }

/* seryosong js */


//for citizenship
function yesnoCheck() {
    if (document.getElementById("foreignCheck").selected || document.getElementById("dualCheck").selected) {
        document.getElementById("ifYes").style.display = "block";
        document.getElementById("citizenShipSpecify").required = "true";
    }
    else {
        document.getElementById("citizenShipSpecify").required = false;
        document.getElementById("citizenShipSpecify").value = "NA";
        document.getElementById("ifYes").style.display = "none";
    }
  }
  
  //for urs campus options
  var lookup = {
    'ANGONO CAMPUS': ['Please Choose Course', '(AB ELS) Bachelor of Arts in English Language Studies', '(BA MC) Bachelor of Arts in Mass Communication', 
    '(BEED) Bachelor of Elementary Education', '(BFA VC)Bachelor of Fine Arts in Visual Communication', '(BM ME)Bachelor of Science in Music Music Education',
    '(BS HM)Bachelor of Science in Hospitality Management','(BS TM) Bachelor of Science in Tourism Management', 
    '(BSE ENG)Bachelor of Secondary Education Major in English', '(BSE FIL)Bachelor of Secondary Education Major in Filipino ', 
    '(BSE MAPEH) Bachelor of Secondary Education Major in MAPEH'],
  
    'ANTIPOLO CAMPUS': ['Please Choose Course', '(BEED) Bachelor of Elementary Education Major in Content Courses', 
    '(BS CE) Bachelor of Secondary Education', '(BS CpE) Bachelor of Science in Computer Engineering', '(BS HM) Bachelor of Science in Hospitality Management', 
    '(BS OA) Bachelor of Science in Office Administration', '(BS TM) Bachelor of Science in Tourism Management', 
    '(BSBA HRM) Bachelor of Science in Hotel and Restaurant Management', '(BSBA MM) Bachelor of Science in Business Administration Major in Marketing Management', 
    '(BSE ENG) Bachelor of Secondary Education Major in English ', '(BSE FIL) Bachelor of Secondary Education Major in Filipino', 
    '(BSE MATH) Bachelor of Secondary Education Major in Math', '(BSE SS) Bachelor of Secondary Education Major in Social Studies'],
  
    'BINANGONAN CAMPUS': ['Please Choose Course', '(BSA) Bachelor of Science in Accountancy', '(BSBA) Bachelor of Science in Business Administration', 
    '(BSIS) Bachelor of Science in Information System', '(BSIT) Bachelor of Science in Information Technology', '(BSOA) Bachelor of Science in Office Administration'],
  
    'CAINTA CAMPUS': ['Please Choose Course', '(BEED) Bachelor of Elementary Education', '(BS IT) Bachelor of Science in Information Technology', 
    '(BSE ENG) Bachelor of Secondary Education Major in English', '(BT LEd IA) Bachelor of  Technology and Livelihood Education Major in Industrial Arts'],
  
    'CARDONA CAMPUS': ['(BSF 2019) Bachelor of Science in Fisheries 2019'],
  
    'MORONG CAMPUS': ['Please Choose Course', '(BEED) Bachelor of Elementary Education', '(BS BIO) Bachelor of Science in Biology', 
    '(BS CE) Bachelor of Science in Civil Engineering', '(BS CpE) Bachelor of Science in Computer Engineering', '(BS ECE) Bachelor of Science in Electronics and Communications Engineering', 
    '(BS EE) Bachelor of Science in Electrical Engineering', '(BS HM) Bachelor of Science in Hospitality Management', 
    '(BS HS) Bachelor of Science in Human Services', '(BS MATH) Bachelor of Science in Mathematics', 
    '(BS ME) Bachelor of Science in Mechanical Engineering', '(BS PSY) Bachelor of Science in Psychology', '(BSE ENG) Bachelor of Secondary Education Major in English', 
    '(BSE MATH) Bachelor of Secondary Education Major in Math', '(BSE SCIE) Bachelor of Secondary Education Major in Science', 
    '(BT AT) Bachelor of Technology Major in Automotive Technology', '(BT C) Bachelor of Technology Major in Civil Technology', 
    '(BT DT) Bachelor of Technology Major in Drafting Technology', '(BT ELT) Bachelor of Technology Major in Electrical Technology', 
    '(BT EMT) Bachelor of Technology Major in Electro-mechanical Technology', '(BT HVAC) Bachelor of Technology Major in Heating Ventilation and Airconditioning', 
    '(BT LEd HE) Bachelor of Technology in Livelihood Education Major in Home Economics', '(BT LEd IA) Bachelor of Technology in Livelihood Education Major in Industrial Arts', 
    '(BT M) Bachelor of Technology Major in Mechanical and Production Technology', '(BT VTED CT) Bachelor of Technical Vocational Teacher Education Major in Civil Technology and Construction Technology', 
    '(BT VTED DT) Bachelor of Technical Vocational Teacher Education Major in Drafting Technology', '(BT VTED EST) Bachelor of Technical Vocational Teacher Education Major in Electronics Technology', 
    '(BT VTED ET) Bachelor of Technical Vocational Teacher Education Major in Electrical Technology'],
  
    'PILILLA CAMPUS': ['Please Choose Course', '(BA ENG) Bachelor of Arts Major in English', '(BA POS) Bachelor of Arts Major in Political Science', 
    '(BEED) Bachelor of Elementary Education Major in Content Courses', '(BS OA) Bachelor of Science in Office Administration', 
    '(BS PSYCH) Bachelor of Science in Psychology', '(BSBA) Bachelor of Science in Business Administration', 
    '(BSE ENG) Bachelor of Secondary Education Major in English', '(BSE SS) Bachelor of Secondary Education Major in Social Studies'],
  
    'RODRIGUEZ CAMPUS': ['Please Choose Course', '(BEED) Bachelor of Elementary Education Major in Content Courses', '(BS OA) Bachelor of Science in Office Administration', 
    '(BS SW) Bachelor of Science in Social Work', '(BSA) Bachelor of Science in Agriculture', '(BSBA) Bachelor of Science in Business Administration', 
    '(BSBA HRM) Bachelor of Science in Business Administration Major in Human Resource Management', 
    '(BSBA MM) Bachelor of Science in Business Administration Major in Marketing Management', '(BSE ENG) Bachelor of Secondary Education Major in English', 
    '(BSE FIL) Bachelor of Secondary Education Major in Filipino', '(BSE MATH) Bachelor of Secondary Education Major in Math', 
    '(BSE SCI) Bachelor of Secondary Education Major in Science', '(BSE SS) Bachelor of Secondary Education Major in Social Studies'],
  
    'TANAY CAMPUS': ['Please Choose Course', '(AB ENG) Bachelor of Arts Major in English', '(AB POL SCI) Bachelor of Arts Major in Political Science', 
    '(BEED) Bachelor of Elementary Education Major in Content Courses', '(BS BIO) Bachelor of Science in Biology', 
    '(BS OA) Bachelor of Science in Office Administration', '(BS TM) Bachelor of Science in Tourism Management', 
    '(BSA) Bachelor of Science in Agriculture', '(BSA BE) Bachelor of Science in Agricultural and Biosystems Engineering ', '(BSBA FM) Bachelor of Science in Business Administration Major in Financial Management', 
    '(BSBA HRM) Bachelor of Science in Business Administration Major in Human Resource Management', 
    '(BSBA MM) Bachelor of Science in Business Administration Major in Marketing Management', '(BSE ENG) Bachelor of Secondary Education Major in English', 
    '(BSE MATH) Bachelor of Secondary Education Major in Math', '(BSP) Bachelor of Science in Psychology'],
  
    'TAYTAY CAMPUS': ['Please Choose Course', '(BEED) Bachelor of Elementary Education Major in Content Courses', '(BSE ENG) Bachelor of Secondary Education Major in English', 
    '(BSN) Bachelor of Science in Nursing', '(BSP) Bachelor of Science in Science in Psychology', '(BT LEd ICT) Bachelor of Science Information Technology'],
  };
  
  // When an option is changed, search the above for matching choices
  $('#campusChoice').on('change', function() {
    // Set selected option as variable
    var selectValue = $(this).val();
  
    // Empty the target field
    $('#courseChoice').empty();
    $('#courseChoicee').empty();
    // For each chocie in the selected option
    for (i = 0; i < lookup[selectValue].length; i++) {
       // Output choice in the target field
       $('#courseChoice').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
    }
    for (i = 0; i < lookup[selectValue].length; i++) {
        // Output choice in the target field
        $('#courseChoicee').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
     }
  });
   
  // When an option is changed, search the above for matching choices
  $('#campusChoice1').on('change', function() {
    // Set selected option as variable
    var selectValue = $(this).val();
  
    // Empty the target field
    $('#courseChoice1').empty();
    $('#courseChoice2').empty();
    // For each chocie in the selected option
    for (i = 0; i < lookup[selectValue].length; i++) {
       // Output choice in the target field
       $('#courseChoice1').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
    }
    for (i = 0; i < lookup[selectValue].length; i++) {
        // Output choice in the target field
        $('#courseChoice2').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
     }
  });
  

  function childCheck() {
    if (!document.getElementById("facChild").checked) {
        document.getElementById("facChild").value = "NO";

        document.getElementById("ifChild").style.display = "none";
        document.getElementById("ifChildd").style.display = "none";

        document.getElementById("parentEmpName").required = false;
        document.getElementById("officeEmp").required = false;
        document.getElementById("parentOfficeDesig").required = false;
        document.getElementById("parentTelNo").required = false;

        document.getElementById("parentEmpName").value = "NA";
        document.getElementById("officeEmp").value = "NA";
        document.getElementById("parentOfficeDesig").value = "NA";
        document.getElementById("parentTelNo").value = "0";

    } else {
        document.getElementById("facChild").value = "YES";

        document.getElementById("ifChild").style.display = "flex";
        document.getElementById("ifChildd").style.display = "flex";

        document.getElementById("parentEmpName").required = true;
        document.getElementById("officeEmp").required = true;
        document.getElementById("parentOfficeDesig").required = true;
        document.getElementById("parentTelNo").required = true;

        document.getElementById("parentEmpName").value = "";
        document.getElementById("officeEmp").value = "";
        document.getElementById("parentOfficeDesig").value = "";
        document.getElementById("parentTelNo").value = "";
    }
  }
  
  
  function courseCheck() {
  
      if((document.getElementById("courseChoice").selected == document.getElementById("courseChoicee").selected)
      || (document.getElementById("courseChoice1").selected == document.getElementById("courseChoicee1").selected))
      {
          document.getElementById("ifSame").style.display = "none";
      }
      else{
          document.getElementById("ifSame").style.display = "block";
      }
  }
  
  //for self supporting specification
  function selfSupCheck() {
    if (document.getElementById("selfSup").checked) {
        document.getElementById("selfSup").value = "YES";
        document.getElementById("ifSelfSup").style.display = "flex";
        document.getElementById("natureOfWork").required = true;
    } else {
        
        document.getElementById("natureOfWork").required = false;
        document.getElementById("selfSup").value = "NO";
        document.getElementById("ifSelfSup").style.display = "none";
        document.getElementById("natureOfWork").value = "NA";
        document.getElementById("workSpecify").value = "NA";
        
    }
  }

  function othersSupCheck() {
    if (document.getElementById("othersSelfSup").selected ) {
        document.getElementById("othersSpecify").style.display = "block";
        document.getElementById("workSpecify").required = true;
    }
    else {
        document.getElementById("workSpecify").required = false;
        document.getElementById("workSpecify").value = "NA";
        document.getElementById("othersSpecify").style.display = "none";
    }
  }