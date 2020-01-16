<?php
require 'core/init.php';

if (isset($_SESSION['user_type']) != 1) {
	echo "<script>window.location.href='login.php';</script>";
}
if(check_user_data($con, $_SESSION['user_type'], $_SESSION['id']) == 1) {
	echo "<script>window.location.href='ngoDBinfo.php?complete_profile';</script>";
}
	if (isset($_SESSION['user_type'])) {
		$user = $_SESSION['user_type'];
	}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>NGO Public Profile</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css"> -->

  
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.min.css">
    <link rel="stylesheet" href="./admin/chat.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>


    <!-- Main Font -->
    <script src="js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

</head>

<body class="bg-gray-100">


    <!-- ... end Header Standard -->

    <div class="header-spacer--standard mb-2">
      	<?php require('template/navbar.inc.php'); ?>
          <link rel="stylesheet" href="./admin/vendor/bootstrap/css/bootstrap.min.css">
    </div>
    <div class="card-header bg-black col-md-8 container mt-3 shadow-lg bg-light">
           <i class="fas fa-comment-alt text-primary"></i>
           <span class="font-weight-bold font-sm">Ngo Chat</span> 
           </div>    
    <div class="container mt-1 chat bg-light col-md-8 shadow border-0 " id="container">
          <?php
          $id=$_SESSION['id'];

                $i = 1;
                $sql = mysqli_query($con, "SELECT 
                * FROM messages WHERE receiverId=$id");
                while ($row = mysqli_fetch_array($sql)) {
                  ?>
            <?php if( $row['status'] == 'received' )
            { ?>
                    <div class="message">
                    <img src="https://image.flaticon.com/icons/svg/265/265674.svg" />
                    <div>
                    <p class="bg-gray-50">
                    <?php echo $row['text']?>
                    </p>
                    </div>
                    </div> 
            <?php }
            ?>
            <?php if( $row['status'] == 'sent' )
            { ?>
                    <div class="message me">
                    <img src="http://api.randomuser.me/portraits/med/men/66.jpg" />
                    <div>
                    <p class="bg-primary text-white">
                    <?php echo $row['text']?>
                    </p>
                    </div>
                    </div> 
            <?php }
            ?>
        
                <?php } ?>
                </div>
    

    </div>

    <form id="messageContainer" class="container col-md-8 m-auto  mb-2 p-0">
    <input type="hidden" name="status" value='received'>
    <input type="hidden" name="recieverId" value="<?php echo $_SESSION['id']?>">
    <div class="d-flex justify-content-between shadow-lg p-2 mt-1 mb-3  bg-light ">
    <div class="form-group col-md-10 m-0">
        <input 
        type="text" 
        class="form-control bg-gray-50 text-black message-value" 
        name='message'
        placeholder="Please Enter Your Message..."
        required
        >
        </div>
        
        <input class="btn btn-primary btn-sm m-0 col-md-2" type="submit" value="Send" >
    </div>
        
        </form>

    

</body>
<script>

const form = document.getElementById('messageContainer');

form.addEventListener('submit',event=>{
    event.preventDefault();
    const data = new FormData(form);
    const message = data.get('message');

   fetch("messageSendngo.php",{
        method:'post', 
        body:data
    
   })
   .then(res=>res.json())
   .then(text=>{
    
    const div = document.createElement('DIV');

    div.className = 'message';

    const image = document.createElement('IMG');

    image.src = 'http://api.randomuser.me/portraits/med/men/66.jpg';

    const message = div.appendChild(image);

    let divafterImage = document.createElement('DIV');

    const p = document.createElement('P');

    p.className= 'bg-gray-50';


    p.innerText = text;

    divafterImage.appendChild(p);


    image.insertAdjacentElement('afterend', divafterImage);

    const container = document.getElementById('container');

    container.appendChild(div);

    const messageme = document.querySelector('.message-value');
    
    messageme.value = '';

    const chat = document.querySelector('.chat');

    chat.scrollTop = chat.scrollHeight;


   })
   .catch(err=>console.log(err));
    
});


</script>

</html>
