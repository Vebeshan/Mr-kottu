<?php

include 'connection.php';

session_start();

if(isset($_SESSION['Profile_ID']))
{
    $ID=$_SESSION['Profile_ID'];
    
}
else
{
    header('location:Profile_login.php');
}

?>

<?php

if(isset($_POST['save']))
{
     $uimage=$_FILES['profile']['name'];
     $uimage_tmp_name = $_FILES['profile']['tmp_name'];
     $uimage_folder = 'updated_photo/'.$uimage;
    
     $Name=$_POST['NAME'];
     $Surname=$_POST['SURNAME'];
     $DOB=$_POST['DOB'];
     $Age=$_POST['AGE'];
     $Mobile=$_POST['TP'];
     $Address=$_POST['ADDRESS'];
     $Postcode=$_POST['Postcode'];
     $Nationality=$_POST['Nationality'];
     $Status=$_POST['Status'];
     $Email=$_POST['Email'];
     $Education=$_POST['Education'];
     $Qualification=$_POST['Qualification'];
     $Porject=$_POST['Porject'];
     $Awards=$_POST['Awards'];
     $Skill=$_POST['Skill'];
     $YearsExperience=$_POST['YearsExperience'];
     $Experience=$_POST['Experience'];
     $About=$_POST['About'];
     $Language=$_POST['Language'];
    
    $profile_name[] = $Name . ' ' . $Surname;
    $fullname = implode(', ',$profile_name);
    
    $profile_insert=mysqli_query($con,"INSERT INTO profile(Name,Address,TP_NO,DOB,AGE,status,Nationality,Postcode,Qualification,skill,Language,Experience,Experince_info,Porject,Awards,Education,MAIL,Profile_IMG,ABOUT,Profile_ID)  VALUES('$fullname','$Address','$Mobile','$DOB','$Age','$Status','$Nationality','$Postcode','$Qualification','$Skill','$Language','$YearsExperience','$Experience','$Porject','$Awards','$Education','$Email','$uimage','$About','$ID')");
    
    if($profile_insert)
    {
        move_uploaded_file($uimage_tmp_name, $uimage_folder);
    echo " <script> alert ('Profile Successfully Added...'); location.replace('Profile.php'); </script> ";
    }
    else
    {
     echo " <script> alert ('Profile Not Added...'); location.replace('Profile.php'); </script> ";
    }
}

?>

<?php

if(isset($_GET['did']))
{
    session_start();
    session_unset();
    session_destroy();
    
    header('location:Profile_login.php');
}

?>

<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Profile Management</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='#' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <style>::-webkit-scrollbar {
                                  width: 8px;
                                }
                                /* Track */
                                ::-webkit-scrollbar-track {
                                  background: #f1f1f1; 
                                }
                                 
                                /* Handle */
                                ::-webkit-scrollbar-thumb {
                                  background: #888; 
                                }
                                
                                /* Handle on hover */
                                ::-webkit-scrollbar-thumb:hover {
                                  background: #555; 
                                } body {
    background-color: #A0D2EB;
}

.form-control:focus {
    box-shadow: none;
    border-color: #A0D2EB
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #A0D2EB;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}</style>
                                </head>
                                <body className='snippet-body'>
                                <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <form method="post" enctype="multipart/form-data">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"> Your Profile</span>
            <input type="file" class="form-control" placeholder="Select An Image" required="required" accept="image/jpg, image/png, image/jpeg" name="profile"><span> </span>
            <br>
            <a <?php echo 'href="Profile.php?did='.$ID.' "'; ?>  class="btn profile-button text-white" onclick="return confirm('Conform To Logout ? ');">Logout</a> 

           
        </div>
            
        </div>
        <div class="col-md-5 border-right">
            
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    
                    <div class="col-md-6"><label class="labels">Name</label>
                    <input type="text" class="form-control" placeholder="first name" value="" required="required" name="NAME"></div>
                    <div class="col-md-6"><label class="labels">Surname</label>
                    <input type="text" class="form-control" value="" placeholder="surname" required="required" name="SURNAME"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">DOB</label>
                    <input type="date" class="form-control" placeholder="first name" value="" required="required" name="DOB"></div>
                    <div class="col-md-6"><label class="labels">Age</label>
                    <input type="number" class="form-control" value="" placeholder="Age" required="required" name="AGE"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label>
                    <input type="number" class="form-control" placeholder="Enter phone number" value="" required="required" name="TP"></div>
                    <div class="col-md-12"><label class="labels">Address</label>
                    <textarea class="form-control" placeholder="Enter Your Address..." required="required" name="ADDRESS"></textarea></div>
                    
                    <div class="col-md-12"><label class="labels">Postcode</label>
                    <input type="number" class="form-control" placeholder="Enter Postcode" value="" required="required" name="Postcode"></div>
                    <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nationality</label>
                        <select class="form-control" required="required" name="Nationality">
                        <option value="">Please Select...</option>
                        <option value="Srilankan">Srilankan</option>
                        <option value="Foreigner">Foreigner</option>
                        </select>
                    </div>
                        
                    <div class="col-md-6"><label class="labels">Civil Status</label>
                        <select class="form-control" required="required" name="Status">
                        <option value="">Please Select...</option>
                        <option value="Single">Single</option>
                        <option value="Marriaged">Marriaged</option>
                        </select>
                    </div>
                </div>
                    
                    <div class="col-md-12"><label class="labels">Email ID</label>
                        <input type="text" class="form-control" placeholder="Enter email id" value="" required="required" name="Email"></div>
                    
                    <div class="col-md-12"><label class="labels">Education</label>
                        <textarea class="form-control" placeholder="Tell Your Education..." required="required" name="Education"></textarea></div>
                    
                    <div class="col-md-12"><label class="labels">Qualification</label>
                        <textarea class="form-control" placeholder="Tell Your Qualification..." required="required" name="Qualification"></textarea></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Porject Completed</label>
                        <input type="number" class="form-control" placeholder="No Of Porject Completed" value="" required="required" name="Porject"></div>
                    
                    <div class="col-md-6"><label class="labels">Awards Won</label>
                        <input type="number" class="form-control" value="" placeholder="No Of Awards" required="required" name="Awards"></div>
                </div>
                <div class="mt-5 text-center">
                <input type="submit" class="btn btn-primary" value="Save Profile" name="save">
                <input type="reset" class="btn btn-warning" value="Clear Profile">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                
                <div class="col-md-12"><label class="labels">Skill At</label>
                    <select class="form-control" required="required" name="Skill">
                        <option value="">Please Select...</option>
                        <option value="Back End Developer">Back_End_Developer</option>
                        <option value="Front End Developer">Front_End_Developer</option>
                        <option value="Database Administrator">Database_Administrator</option>
                        <option value="System Analyst">System_Analyst</option>
                        </select></div> <br>
                
                <div class="col-md-12"><label class="labels">Years OF Experience</label>
                    <input type="number" class="form-control" placeholder="experience" value="" required="required" name="YearsExperience"></div> <br>
                
                <div class="col-md-12"><label class="labels">Additional Experience Details</label>
                    <textarea class="form-control" placeholder="Tell Your Experience..." required="required" name="Experience"></textarea></div>
                
                <div class="col-md-12"><label class="labels">About You</label>
                    <textarea class="form-control" placeholder="Tell About You..." required="required" name="About"></textarea></div>
                
                <div class="col-md-12"><label class="labels">Select Language</label>
                    <select class="form-control" required="required" name="Language">
                        <option value="">Please Select...</option>
                        <option value="Tamil">Tamil</option>
                        <option value="English">English</option>
                        <option value="Sinhala">Sinhala</option>
                        </select>
                </div>
            </div>
             <hr>
            <center>
            <a <?php echo 'href="update_Profile.php?uid='.$ID.' "'; ?>class="btn btn-success">Update Profile</a>
           <a href="#" class="btn btn-success"></a></center>
            
            
        </div>
            </form>
       
    </div>
</div>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript'>#</script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>
                            
                                </body>
                            </html>