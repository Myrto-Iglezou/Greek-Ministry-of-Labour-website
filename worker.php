<?php
    session_start();
    include 'db_connection.php';
    // echo print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ΥΕΚΥ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <!-- <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css"> -->

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <?php
        $page = 'one'; include(dirname(__FILE__)."./header.php");
    ?>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="index.php"><i class="icofont-home"></i></a></li>
                <li>Προφίλ</li>
            </ol>
            </div>
        </div>
        </section><!-- End Breadcrumbs -->


 
        <div class="col-lg-10 mt-4 mt-lg-0">
            <div class="profile-wrapper">   
                <div class="tab-wrapper">
                    <ul class="tab-menu">
                        <li class="active">Τα στοιχεία μου</li>
                        <li>Νέα αίτηση</li>
                        <li>Εργασιακή κατάσταση</li>
                        <li>Στοιχεία εργοδότη </li>
                        <li>Ένσημα</li>
                        <li>Έγγραφα</li>
                    </ul>
                    <div class="tab-content">
                        <div>
                            <div class="container" >
                                <div class="container z-depth-1" style="background-color: white;padding-bottom:30px;"  ><br><br>
                                    <div class="row ">
                                        <div class="col-md-9" style="padding-left:30px; padding-top:20px; "><h5><i class="fa fa-user-circle-o" aria-hidden="true"></i>  Τα στοιχεία μου</h5></div>
                                        <div class="col-md-3" ><a  href="#editProfileModal" data-toggle="modal"style="background-color: rgb(226, 226, 226); text-transform: none;"  type="button" class="btn">
                                        <i class="icofont-ui-edit"></i> Επεξεργασία </a></div> 
                                    </div><hr> <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <div style="font-size:16px;" class="form-group">
                                                <label style="font-weight:bold;" class="col-sm-2 control-label">'Ονομα</label>
                                                <div class="col-sm-8">
                                                    <?php echo $_SESSION["firstname"]; ?>
                                                </div>
                                            </div>
                                            <div style="font-size:16px;" class="form-group">
                                                <label style="font-weight:bold;" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-8">
                                                    <?php echo $_SESSION["email"]; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div style="font-size:16px;" class="form-group">
                                                <label style="font-weight:bold;" class="col-sm-2 control-label">Επίθετο</label>
                                                <div class="col-sm-8">
                                                    <?php echo $_SESSION["lastname"]; ?>
                                                </div>
                                            </div>
                                            <div style="font-size:16px;" class="form-group">
                                                <label style="font-weight:bold;" class="col-sm-2 control-label">Τηλέφωνο</label>
                                                <div class="col-sm-8">
                                                    <?php echo $_SESSION["phone"]; ?>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div style="font-size:16px;" class="form-group">
                                                <label style="font-weight:bold;" class="col-sm-2 control-label">ΑΦΜ</label>
                                                <div class="col-sm-10">
                                                    <?php echo $_SESSION["afm"]; ?>
                                                </div>
                                            </div>
                                            <div style="font-size:16px;" class="form-group">
                                                <label style="font-weight:bold;" class="col-sm-10 control-label">Εργασιακή κατάσταση</label>
                                                <div class="col-sm-11">
                                                    <?php 
                                                        if($_SESSION["role"] === 'ergazomenos'){
                                                            echo 'Εργαζόμενος';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                            <div id="editProfileModal" class="modal fade">
                                <div class="modal-dialog row justify-content-center simple-form">
                                    <div class="modal-content">        
                                        <form action="forms/updateprofile.php" method="post" role="form"  class="php-email-form">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <div class=" section-title">						
                                                <h3 style="font-weight: bold; ">Επεξεργασία των στοιχείων μου</h3><hr>
                                            </div>
                                            <div class="modal-body">	
                                                <h4 style="color: #5688e6;font-weight: none; align: center;">Αλλαγή προσωπικών στοιχείων</h4>				
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="firstname" class="col-4 col-form-label">Όνομα</label> 
                                                        <input id="firstname" name="firstname" placeholder=<?php echo $_SESSION["firstname"]; ?> data-rule="checkifFilled:2" data-msg="Μη έγκυρο όνομα" class="form-control" type="text">
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="lastname" class="col-4 col-form-label">Επίθετο</label> 
                                                        <div class="form-group ">
                                                            <input id="lastname" name="lastname" placeholder=<?php echo $_SESSION["lastname"]; ?> data-rule="checkifFilled:2" data-msg="Μη έγκυρο επίθετο" class="form-control" type="text">
                                                            <div class="validate"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email" class="col-4 col-form-label">Email</label> 
                                                        <div class="form-group ">
                                                            <input id="email" name="email" placeholder=<?php echo $_SESSION["email"]; ?> data-rule="ifemail" data-msg="Μη έγκυρο email" class="form-control" type="email">
                                                            <div class="validate"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="phone" class="col-4 col-form-label">Τηλέφωνο</label> 
                                                        <div class="form-group ">
                                                            <input id="phone" name="phone" placeholder=<?php echo $_SESSION["phone"]; ?> data-rule="checkifFilled:10" data-msg="Μη έγκυρο ΑΦΜ" class="form-control" type="text">
                                                            <div class="validate"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="role" class="col-6 col-form-label">Εργασιακή κατάσταση</label> 
                                                        <div class="form-group ">
                                                            
                                                            <select name="role" id="role" class="form-control" data-column="role">
                                                                <option value="default" style="display:none;">
                                                                <?php
                                                                    if($_SESSION["role"] == 'ergazomenos'){
                                                                        echo "Εργαζόμενος";
                                                                    }else{
                                                                        echo 'Εργοδότης-Επιχείρηση';
                                                                    }
                                                                ?></option>
                                                                <option value="ergazomenos">Εργαζόμενος</option>
                                                                <option value="ergodoths">Εργοδότης/Επιχείρηση</option>
                                                                <option value="anergos">Άνεργος</option>
                                                                <option value="el_epag">Ελεύθερος επαγγελματίας</option>
                                                                <option value="syntaxiouxos">Συνταξιούχος</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h4 style="color: #5688e6;font-weight: none; align: center;">Αλλαγή ονόματος χρήστη</h4>
                                                    <br>

                                                    <div class="form-group col-md-12">
                                                        <label for="username" class=" col-form-label">Όνομα χρήστη</label> 
                                                        <div class="form-group ">
                                                            <input id="username" name="username" placeholder=<?php echo $_SESSION["username"]; ?> data-rule="checkifFilled:4" data-msg="Το όνομα χρήστη πρέπει να περιέχει πάνω απο 4 χαρακτήρες" class="form-control" type="text">
                                                            <div class="validate"></div>
                                                        </div>
                                                    </div>
                                                    <h4 style="color: #5688e6;font-weight: none; align: center;">Αλλαγή κωδικού πρόσβασης</h4>
                                                    <br>
                                                    <div class="form-group col-md-6">
                                                        <label for="password_1" class=" col-form-label">Νέος κωδικός</label> 
                                                        <div class="form-group ">
                                                            <input id="password_1" name="password_1"  data-rule="checkifFilled:4" data-msg="Ο κωδικός πρέπει να είναι μεγαλύτερος απο 4 χαρακτήρες" class="form-control" type="password">
                                                            <div class="validate"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="password_2" class=" col-form-label">Επαλήθευση νέου κωδικού</label> 
                                                        <div class="form-group ">
                                                            <input id="password_2" name="password_2"  data-rule="checkifFilled:4" data-msg="Ο κωδικός πρέπει να είναι μεγαλύτερος απο 4 χαρακτήρες" class="form-control" type="password">
                                                            <div class="validate"></div>
                                                        </div>
                                                    </div>
                                                </div>					
                                            </div>
                                            <div class="mb-3">
                                                <div class="loading">Φόρτωση</div>
                                                <div class="error-message"></div>
                                                <div class="sent-message">Τα στοιχεία ανανεώθηκαν με επιτυχία.<br> Ανανεώστε την σελίδα για να δείτε τα νέα στοιχεία.</div>
                                            </div>
                                            <div class="text-center">
                                                <button value="submit" name="submit" type="submit">Αποθήκευση νέων στοιχείων</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>       
                        </div>
                        
                        <div>
                            <h5>Επιλέξτε αίτηση</h5>
                            <br>
                            <div class="select-btn" style="padding-bottom:50px;">                    
                                <select id="aithsh" class="form-control col-md-6" >
                                    <option value="default" style="display:none;">Διαλέξτε</option>
                                    <option value="eidikou-skopou" >Άδεια ειδικού σκοπού</option>
                                    <option value="apwzhmeiwsh-eidikou-skopou" >Αίτηση απωζημείωσης ειδικού σκοπού</option>
                                    <option value="anergia" >Επίδομα ανεργείας</option>
                                    <option value="paraithsh" >Αίτηση παραίτησης</option>
                                </select>
                            </div>
                            <form style="display:none;" id="eidikou-skopou" action="forms/eidikou-skopou.php" method="post" role="form" class="contact">
                                <div class=" d-flex justify-content-center align-items-center">
                                    <div class="php-email-form col-md-9">
                                        <div class="form-row">
                                            <div class="section-title">
                                                <br>
                                                <h3 style="font-weight: bold; ">Δήλωση άδειας ειδικού σκοπού</h3><br><hr>
                                                <h7 >Συμπληρώστε τα στοιχεία που σας ζητούνται για να κάνετε την αίτησή σας στο υπουργείο. Τα προσωπικά σας στοιχεία θα σταλούν αυτόματα απο τον ιστόχωρό μας.<br>Όλα τα πεδία είναι <b>υποχρεωτικά</b>.</h7><br><hr>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="firstname">Ημερομηνία Έναρξης</label>
                                                <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="firstname">Ημερομηνία Λήξης</label>
                                                <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="family">Οικογενειακή κατάσταση</label>
                                                <select name="role" id="role" class="form-control" data-msg="Παρακαλώ εισάγετε την εργασιακή σας κατάσταση">
                                                    <option value="married">Έγγαμος</option>
                                                    <option value="non-married">Άγαμος</option>
                                                </select>  
                                                <div class="validate"></div>
                                            </div>
                                    
                                            <div class="form-group col-md-6">
                                                <label for="role">Αριθμός ανήλικων τέκνων</label>
                                                <select name="role" id="role" class="form-control" data-msg="Παρακαλώ εισάγετε την εργασιακή σας κατάσταση">
                                                    <option value="default" style="display:none;">Διαλέξτε</option>
                                                    <option value="ergazomenos">1</option>
                                                    <option value="ergodoths">2</option>
                                                    <option value="anergos">3</option>
                                                    <option value="el_epag">Περισσότερα από 3</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="name">Σημείωση</label>
                                            <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Γράψτε μας το αίτημα σας"></textarea>
                                            <div class="validate"></div>
                                        </div>
                                        <hr><br>
                                        <div class="mb-3">
                                            <div class="loading">Φόρτωση</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Το αίτημά σας στάλθηκε επιτυχώς </div>
                                        </div>
                                        <div class="text-center">
                                            <button value="submit" name="submit" type="submit">Αποστολή</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <!-- <h5>Η εργασιακή μου κατάσταση</h5><br> -->

                            <!-- <div class="container"> -->
                                <div class="table-responsive">
                                    <div class="table-wrapper">
                                        <?php echo '<form method="post" action="forms/afms.php" id="checkBoxes_POST"> <div class="table-title">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h2>Η <b>εργασιακή</b> μου κατάσταση </h2>
                                                </div>
                                            </div>
                                        </div>';

                                        $myafm = $_SESSION["afm"];
                                        $result = mysqli_query($conn,"SELECT * FROM employee WHERE afm=$myafm");
                                        $employee = mysqli_fetch_array($result);
                                        $anastoli = $employee['anastoli_id'];
                                        $thlergasia = $employee['thlergasia_id'];
                                        $adeia = $employee['adeia_id'];
                                        $count = 0;
 
                                        echo '<table id="table" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>Δήλωση</th>
                                                <th>Ημερομηνία Έναρξης</th>
                                                <th>Ημερομηνία Λήξης</th>
                                                <th>Κατάσταση</th>
                                                <th>Ενέργειες</th>
                                            </tr>
                                        </thead> <tbody>  ';
                                        
                                        if($anastoli != NULL){
                                            $result = mysqli_query($conn,"SELECT * FROM employee_action WHERE action_id=$anastoli");
                                            $action = mysqli_fetch_array($result);
                                            $count++;
                                            echo "<tr>";
                                            echo "<td> $count </td>";
                                            echo "<td> Αναστολή </td>";
                                            echo "<td>" . $action['starting_date'] . "</td>";
                                            echo "<td>" . $action['end_date'] . "</td>";
                                            echo "<td>" . "Ενεργή" . "</td>";
                                            echo ' <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Αλλαγή">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Διαγραφή">&#xE872;</i></a>
                                            </td>
                                            </tr>';
                                        }else if ($anastoli == NULL){
                                            $count++;
                                            echo "<tr>";
                                            echo "<td> $count </td>";
                                            echo "<td> Αναστολή </td>";
                                            echo "<td>" . " - " . "</td>";
                                            echo "<td>" . " - " . "</td>";
                                            echo "<td>" . "Ανενεργή" . "</td>";
                                            echo ' <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Αλλαγή">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Διαγραφή">&#xE872;</i></a>
                                            </td>
                                            </tr>';
                                        }
                                        if($thlergasia != NULL){
                                            $result = mysqli_query($conn,"SELECT * FROM employee_action WHERE action_id=$thlergasia");
                                            $action = mysqli_fetch_array($result);
                                            $count++;
                                            echo "<tr>";
                                            echo "<td> $count </td>";
                                            echo "<td> Τηλεργασία </td>";
                                            echo "<td>" . $action['starting_date'] . "</td>";
                                            echo "<td>" . $action['end_date'] . "</td>";
                                            echo "<td>" . "Ενεργή" . "</td>";
                                            echo ' <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Αλλαγή">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Διαγραφή">&#xE872;</i></a>
                                            </td>
                                            </tr>';
                                        }else if ($thlergasia == NULL){
                                            $count++;
                                            echo "<tr>";
                                            echo "<td> $count </td>";
                                            echo "<td> Τηλεργασία </td>";
                                            echo "<td>" . " - " . "</td>";
                                            echo "<td>" . " - " . "</td>";
                                            echo "<td>" . "Ανενεργή" . "</td>";
                                            echo ' <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Αλλαγή">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Διαγραφή">&#xE872;</i></a>
                                            </td>
                                            </tr>';
                                        } 
                                        if($adeia != NULL){
                                            $result = mysqli_query($conn,"SELECT * FROM employee_action WHERE action_id=$adeia");
                                            $action = mysqli_fetch_array($result);
                                            $count++;
                                            echo "<tr>";
                                            echo "<td> $count </td>";
                                            echo "<td> Άδεια </td>";
                                            echo "<td>" . $action['starting_date'] . "</td>";
                                            echo "<td>" . $action['end_date'] . "</td>";
                                            echo "<td>" . "Ενεργή" . "</td>";
                                            echo ' <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Αλλαγή">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Διαγραφή">&#xE872;</i></a>
                                            </td>
                                            </tr>';
                                        }else if ($adeia == NULL){
                                            $count++;
                                            echo "<tr>";
                                            echo "<td> $count </td>";
                                            echo "<td> Άδεια </td>";
                                            echo "<td>" . " - " . "</td>";
                                            echo "<td>" . " - " . "</td>";
                                            echo "<td>" . "Ανενεργή" . "</td>";
                                            echo ' <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Αλλαγή">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Διαγραφή">&#xE872;</i></a>
                                            </td>
                                            </tr>';
                                        } 
                                        echo " </tbody> </table></form>";

                                        ?>
                                    </div>
                                </div>        
                            <!-- </div> -->
                            <!-- Add Modal HTML -->
                            <div id="addEmployeeModal" class="modal fade contact">
                                <div class="modal-dialog row justify-content-center">
                                    <div class="modal-content">
                                        <form  action="forms/hirement.php" method="post" role="form" class="php-email-form">
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Πρόσληψη υπαλλήλου</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="font-size:18px;">					
                                                <div class="form-group">
                                                    <label>ΑΦΜ</label>
                                                    <input id="employee_afm" name="employee_afm" type="text" class="form-control" data-rule="checkifFilled:5" data-msg="Μη έγκυρο ΑΦΜ">
                                                    <div class="validate"></div>
                                                </div>					
                                            </div>
                                            <div class="text-center">
                                                <input type="submit" class="btn btn-success" value="Δημιουργία">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal HTML -->
                            <div id="editEmployeeModal" class="modal fade contact">
                                <div class="modal-dialog row justify-content-center">
                                    <div class="modal-content">
                                        <form class="php-email-form">
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Προσθήκη υπαλλήλου</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="font-size:18px;">					
                                                <div class="form-group">
                                                    <label>Ονοματεπώνυμο</label>
                                                    <input type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>ΑΦΜ</label>
                                                    <input type="text" class="form-control" required>
                                                </div>					
                                            </div>
                                            <div class="text-center">
                                                <input type="submit" class="btn btn-success" value="Δημιουργία">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- dhlwsh Modal HTML -->
                            <div id="dhlwshEmployeeModal" class="modal fade contact">
                                <div class="modal-dialog row justify-content-center">
                                    <div class="modal-content">        
                                        <form action="forms/dhlwsh.php" method="post" role="form"  class="php-email-form">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    
                                            <div class=" section-title">						
                                            <h3 style="font-weight: bold; ">Δήλωση εργαζομένου</h3><br><hr>
                                            <h7>Αρχικά επιλέξτε την δήλωση που σας ενδιαφέρει και στην συνέχεια συμπληρώστε τα στοιχεία που ζητούνται. 
                                                <br>Όλα τα πεδία είναι <b>υποχρεωτικά</b>.</h7><br><hr>
                                            </div>
                                            <div class="modal-body">					
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="dhlwsh">Είδος δήλωσης</label>
                                                        <select name="dhlwsh" id="dhlwsh" class="form-control" data-msg="Παρακαλώ επιλέξτε την δήλωση που επιθυμείτε">
                                                            <option value="default" style="display:none;">Διαλέξτε</option>
                                                            <option value="anastoli" >Δήλωση αναστολής σύμβασης εργασίας</option>
                                                            <option value="apostasi" >Δήλωση εξ αποστάσεως εργασία</option>
                                                            <option value="apozhmeiwsh-erg" >Δήλωση αποζημείωσης εργαζομένων</option>
                                                            <option value="apozhmeiwsh-eter" >Δήλωση αποζημείωσης εταιρείας</option>
                                                            <option value="apolysh" >Δήλωση απόλυσης</option>
                                                            <option value="proslhpsh" >Δήλωση πρόσληψης</option>
                                                        </select>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group col-md-6" id="date1" style="display:none;">
                                                        <label for="firstname">Ημερομηνία Έναρξης</label>
                                                        <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group col-md-6" id="date2" style="display:none;">
                                                        <label for="firstname">Ημερομηνία Λήξης</label>
                                                        <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>					
                                            </div>
                                            <div class="text-center">
                                                <button value="submit" name="submit" type="submit">Αποστολή</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal HTML -->
                            <div id="deleteEmployeeModal" class="modal fade contact">
                                <div class="modal-dialog row justify-content-center">
                                    <div class="modal-content">
                                        <form class="php-email-form">
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Διαγραφή υπαλλήλου</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <p style="font-size:18px;">Είστε βέβαιος/η ότι θέλετε να διαγράψετε αυτές τις εγγρφές; </p>
                                                <!-- <p class="text-warning"><small>This action cannot be undone.</small></p> -->
                                            </div>
                                            <div class="text-center">
                                                <input style="font-size:18px;" type="submit" class="btn btn-danger" value="Διαγραφή">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-md-9" style="padding-left:30px; padding-top:20px; "><h5>Στοιχεία Επιχείρησης-Εργοδότη</h5></div>
                                <div class="col-md-3" ><a  href="#editEmployerModal" data-toggle="modal"style="background-color: rgb(226, 226, 226); text-transform: none;"  type="button" class="btn">
                                <i class="icofont-ui-edit"></i> Αλλαγή εργοδότη</a></div> 
                            </div><hr> <br>
                            <div id="editEmployerModal" class="modal fade contact" >
                                <div class="modal-dialog row justify-content-center">
                                    <div class="modal-content">        
                                        <form action="forms/allaghErgodoth.php" method="post" role="form"  class="php-email-form">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    
                                            <div class=" section-title">						
                                                <h3 style="font-weight: bold; ">Αλλαγή στοιχείων εργοδότη</h3><hr>
                                                <h7>Για να αλλάξετε εργοδότη αρκεί να αλλάξετε το ΑΦΜ του. Τα υπόλοιπα στοιχεία θα ενημερωθούν αυτόματα. </h7><hr>
                                            </div>
                                            <div class="modal-body">	
                                                
                                                <h4 style="color: #5688e6;font-weight: none; align: center;">Αλλαγή ΑΦΜ επιχείρησης ή εργοδότη</h4>
                                                <br>
                                                <div class="form-group col-md-12">
                                                    <label for="password_1" class="col-8 col-form-label">Α.Φ.Μ επιχείρησης ή εργοδότη</label>                                             
                                                    <input id="afmEmployer" name="afmEmployer" placeholder=<?php echo $_SESSION["afmEmployer"]; ?> data-rule="checkifFilled:4" data-msg="Ο κωδικός ΑΦΜ να είναι μεγαλύτερος απο 4 χαρακτήρες" class="form-control" type="text">
                                                    <div class="validate"></div>
                                                </div>			
                                                <div class="mb-3">
                                                    <div class="loading">Φόρτωση</div>
                                                    <div class="error-message"></div>
                                                    <div class="sent-message">Τα στοιχεία ανανεώθηκαν με επιτυχία.<br> Ανανεώστε την σελίδα για να δείτε τα νέα στοιχεία.</div>
                                                </div>
                                                <div class="text-center">
                                                    <button value="submit" name="submit" type="submit">Αποθήκευση νέων στοιχείων</button>
                                                </div>
                                            </div>    
                                        </form>
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="container">
                                <p style = "font-style:italic">Παρακάτω παρουσιάζονται όλα τα στοιχεία του εργοδότη για τον οποίο εργάζεστε και με τα οποία μπορείτε να έρθετε σε επαφή μαζί του.</p>
                                <hr>
                                <div class="row">                                
                                    <div class="col">
                                        <div style="font-size:18px;" class="form-group">
                                            <label style="font-weight:bold;" class="col-sm-9 control-label">'Ονομα Εργοδότη</label>
                                            <div class="col-sm-10">
                                                <?php echo $_SESSION["employer"]["firstname"]; ?>
                                            </div>
                                        </div>
                                        <div style="font-size:18px;" class="form-group">
                                            <label style="font-weight:bold;" class="col-sm-9 control-label">Email </label>
                                            <div class="col-sm-10">
                                                <?php echo $_SESSION["employer"]["email"]; ?>
                                            </div>
                                        </div>
                                        <div style="font-size:18px;" class="form-group">
                                            <label style="font-weight:bold;" class="col-sm-9 control-label">ΑΦΜ </label>
                                            <div class="col-sm-10">
                                                <?php echo $_SESSION["employer"]["afm"]; ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div style="font-size:18px;" class="form-group">
                                            <label style="font-weight:bold;" class="col-sm-7 control-label">Επίθετο εργοδότη</label>
                                            <div class="col-sm-10">
                                                <?php echo $_SESSION["employer"]["lastname"]; ?>
                                            </div>
                                        </div>
                                        <div style="font-size:18px;" class="form-group">
                                            <label style="font-weight:bold;" class="col-sm-7 control-label">Τηλέφωνο</label>
                                            <div class="col-sm-10">
                                                <?php echo $_SESSION["employer"]["phone"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> <hr>

                        </div>
                        <div>
                            <h5>Τα έμσημά μου</h5>
                                <br>
                        </div>
                        <div>
                            <h5>Τα Έγγραφά μου</h5>
                                <br>
                        </div> 
                        </div>
                        <div>
                            
                        </div>
                        <div>
                        
                        </div>
                        <div>
                            
                        </div>
                        <div>
                        
                        </div>
                        <div>
                        </div>
                    </div><!-- //tab-content -->
                </div><!-- //tab-wrapper -->
            </div>    
        </div> 
    </main><!-- End #main -->


<!-- ======= Footer ======= -->
<?php
include "./footer.php";
?>
<!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a> 

<!-- Vendor JS Files -->
<!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script> -->
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<!-- <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script> -->
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>



<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- jQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="assets/js/wrapper.js"></script>

<script>
$('#aithsh').change(function(){
    $('form').hide();
    $('form#'+$(this).val()).show();
});
$('.date').datepicker({ language: "el"});
</script>

</body>

</html>