<html>
    <head>
        <title>
            EMPLOYEE EDIT PAGE
        </title>
        <script>
            
          
                
            
            var pass="";
            var cpass="";
            checkfname=false;
            checkuname=false;
            checkmail=false;
            checkpass=false;
            checkcpass=false;
            //checkph=false;
			
			///user id
            function valiation(e){
                var uname=e.value;
                var msg=document.getElementById("check");
                
                if(uname.length>=5){
                    msg.innerHTML="";
                    checkuname=true;
                    
                }
				else if(isNaN(uname)){
				 msg.innerHTML =" ** only digit 0-9 are allowed";
				 msg.style.color="red";
				
				}
				else if(uname.length<=0){
                    msg.innerHTML="pls input";
                    msg.style.color="red";
                }
                else if(uname.length<5){
                    msg.innerHTML="character kom";
                    msg.style.color="red";
                }
				
            }
			///firstname
            function valiationfn(e){
                var uname=e.value;
                var msg=document.getElementById("checkfn");
                
                if(uname.length>5){
                    msg.innerHTML="";
                    checkfname=true;
                }
				else if(!isNaN(uname)){
				 msg.innerHTML =" ** only character a-z are allowed";
				 msg.style.color="red";
				
				}
                else if(uname.length<=0){
                    msg.innerHTML="*pls input ";
                    msg.style.color="red";
                }
				else if(uname.length<=5){
                    msg.innerHTML="*minimum 5 character ";
                    msg.style.color="red";
                }
            }
			
            function valiationemail(e) {
                var emails = e.value;
                
                var msg=document.getElementById("checkmail");
				if(emails.length <= 0){
				msg.innerHTML =" ** Please fill the email idx` field";
				 msg.style.color="red";
				
				}
				else if(emails.indexOf('@') <= 0 ){
				msg.innerHTML =" ** @ Invalid Position";
				 msg.style.color="red";
				
				}
				else if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				msg.innerHTML =" ** . Invalid Position";
				 msg.style.color="red";
				
				}
                else{
                    msg.innerHTML="";
                    checkmail= true;
                }
                
                    
            };
            ///password
            function validatepass(e){
                var x= e.value;
                var msg=document.getElementById("checkpass");
                if(x.length<6 || x.length>=20){
                    msg.innerHTML="length between 6 to 20";
                    msg.style.color="red";
                   
                }
                else{
                    msg.innerHTML="";
                    pass=x;
                    checkpass= true;
                }
            }
			///pass valid 
            function validateCompass(e){
                var x= e.value;
                var msg=document.getElementById("checkcompass");
                if(x==pass){
                    msg.innerHTML="match";
					msg.style.color="green";
                    checkcpass= true;
                }
                else{
                    msg.innerHTML="not match";
                    msg.style.color="red";
                    
                }
            }
           
            
            function checkall(){
                
                //var type=document.getElementById("Type");
                
               // var posttype=type.options[type.selectedIndex].value;
                
                if( checkfname==true && checkmail==true && checkuname==true && checkpass==true && checkcpass==true){
                    alert("Signup sucessful.");
                    return true;
                }
                else{
                    alert("Please input all * information");
                    return false;
                }
            }
            
            
        </script>
    </head>
    <body>
        
        <form method='post'  onsubmit='return checkall()'  style='text-align:center'>
                  {{@csrf_field()}}
                    <h1 style='text-align:cenetr'> employe update</h1>
                    <b>User Id     : </b> <input type='text' onkeyup='valiation(this)' name='uid' id='usname' placeholder='At lest 6 character'><level id='check' style='color:red'>*</level><br></br>
										
                    
                    <b>First Name    : </b> <input type='text' onkeyup='valiationfn(this)' name='fname' id='fn' placeholder='input first name'><level id='checkfn' style='color:red'>*</level><br></br>
                
                    <b>Last Name     : <input type='text' name='lname' id='ln' placeholder='optional'><br></br>
                
                    <b>Email         : </b>  <input type='text' onkeyup='valiationemail(this)' name='email' id='mail' placeholder='input valid email'><level id='checkmail' style='color:red'>*</level><br></br>
                   
                   
                    
                   
                    
                    <b>Password      : </b>  <input type='password' onkeyup='validatepass(this)' name='upass' id='pass' placeholder='at lest 6 character'><level id='checkpass' style='color:red'>*</level><br></br>
                    
                    <b>Confirm       : </b> <input type='password' onkeyup='validateCompass(this)' name='cpass' id='ass' placeholder='rewrite the pass'> <level id='checkcompass' style='color:red'>*</level><br></br>
                    
                    
                    
                    
                                       <input type='submit' value='update' name='submit'  style='color:green'>
                
             
        </form>
        
        
        
        
        
    </body>
</html>
