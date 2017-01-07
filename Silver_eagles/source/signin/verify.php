<?php 
session_start();
////	//	//	//
//
//	Why don't we have a comment header block?
// 
if(isset($_POST['submit'])){ 
    $dbHost     = "localhost";  //Location Of Database usually its localhost 
    $dbUser     = "root";   //Database User Name 
    $dbPass     = "";   //Database Password 
    $dbDatabase = "wolfpack"; //Database Name 
    //Connect to the databasse 
    $db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass); 

//prepare allows for the ?
    $sql_id = $db->prepare("SELECT * FROM accounts 
        WHERE username = ? AND 
        pass = ? 
        LIMIT 1"); 

    //Lets search the databse for the user name and password 
    //Choose some sort of password encryption, I choose sha256 
    //Password function (Not In all versions of MySQL). 
    $pas = hash('sha256', $_POST['password']); 
     
//bindvalue puts it into the ?     
    $sql_id->bindValue(1, $_POST["username"]); 
    //$sql_id->bindValue(2, $_POST['password']); 
	$sql_id->bindValue(2, $pas); 

    $sql_id->execute(); 

    // Row count is different for different databases 
    // Mysql currently returns the number of rows found 
    // this could change in the future. 
    if($sql_id->rowCount() == 1){ 
        $row_id                  = $sql_id->fetch(); 
         
        $_SESSION['account_id'] = $row_id['account_id']; 
		$_SESSION['usertype_id'] = $row_id['usertype_id'];
		$_SESSION['username']   = $row_id['username'];
		
		$sql_user = $db->prepare("SELECT * FROM usertypes 
        WHERE usertype_id = ? 
        LIMIT 1");
		$sql_user->bindValue(1, $_SESSION['usertype_id']);
		$sql_user->execute();
		$row_user = $sql_user->fetch();
		
		$_SESSION['usertype_name'] = $row_user['usertype_name'];
		
		$sql_name = $db->prepare("SELECT * FROM employees 
        WHERE account_id = ? 
        LIMIT 1");
		$sql_name->bindValue(1, $_SESSION['account_id']); 
		$sql_name->execute(); 
		$row_name				  = $sql_name->fetch();
        $_SESSION['firstname']    = $row_name['firstname']; 
        $_SESSION['lastname']    = $row_name['lastname']; 
		$_SESSION['employee_id'] = $row_name['employee_id'];
        $_SESSION['logged']   = TRUE; 
		$_SESSION['login_fail'] = FALSE;
		header("Location: ../dashboard/"); // Modify to go to the page you would like 
		//header("Location: users_page.php");
        exit; 
    }else{ 
		$_SESSION['message'] = '<strong>FAILURE!</strong> Incorrect login credentials.';
        header("Location: ../signin/"); 
        exit; 
    } 
}else{ //If the form button wasn't submitted go to the index page, or login page 
	$_SESSION['message'] = '<strong>FAILURE!</strong> Incorrect login credentials.';
    header("Location: ../signin/"); 
    exit; 
}
?>
