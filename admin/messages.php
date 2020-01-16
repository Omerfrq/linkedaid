<?php require 'templates/header.php'; ?>
<link rel="stylesheet" href="chat.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
  <body>
  
    <div class="page">
      <!-- Main Navbar-->
      <?php require 'templates/navbar.php'; ?>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
      <?php require 'templates/sidebar.php'; ?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header mb-2">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">NGO's</h2>
            </div>
          </header>
          
          <div class="card-header bg-black col-md-8 m-auto shadow bg-light">
           <i class="fas fa-comment-alt text-primary"></i>
           <span class="font-weight-bold font-sm">Ngo Chat</span> 
           </div>
          <div class="container mt-1 chat bg-light col-md-8 shadow border-0 " id="container">
          
          <?php
                $i = 1;
                $receiverId = $_GET['id'];
                $sql = mysqli_query($con, "SELECT 
                * FROM messages WHERE receiverId='$receiverId'");
                while ($row = mysqli_fetch_array($sql)) {
                  ?>
            <?php if($row['status'] =='received')
            { ?>
                    <div class="message">
                    <img src="http://api.randomuser.me/portraits/med/men/66.jpg" />
                    <div>
                    <p class="bg-gray">
                    <?php echo $row['text']?>
                    </p>
                    </div>
                    </div> 
            <?php }
            ?>
             <?php if($row['status'] =='sent')
            { ?>
                    <div class="message me ">
                    <img src="https://image.flaticon.com/icons/svg/265/265674.svg" />
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

          <form id="messageContainer" class="container col-md-8 m-auto  mb-2 p-0">
        
          <input type="hidden" name="status" value='sent'>
          <input type="hidden" name="recieverId" value=<?php echo $_GET['id']?>>
        
        <div class="d-flex justify-content-between shadow-lg p-2 mt-1 mb-3  bg-light ">
        <div class="form-group col-md-10 m-0">
        <input 
        class="form-control bg-gray text-black message-value" 
        type="text" 
        name='message' 
        placeholder="Please Enter Your Message..."
        required
        >
        </div>
        <input class="btn btn-primary btn-sm  col-md-2" type="submit" value="Submit" >
        </div>
      

            </form>
            <div>
       
          <?php require 'templates/footer.php'; ?>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script>

    const form = document.getElementById('messageContainer');

    form.addEventListener('submit',event=>{
        event.preventDefault();
        const data = new FormData(form);
        const message = data.get('message');
        
       fetch("messageSend.php",{
            method:'post', 
            body:data
        
       })
       .then(res=>res.json())
       .then(text=>{
        
        const div = document.createElement('DIV');

        div.className = 'message me';

        const image = document.createElement('IMG');

        image.src = 'http://api.randomuser.me/portraits/med/men/66.jpg';

        const message = div.appendChild(image);

        let divafterImage = document.createElement('DIV');

        const p = document.createElement('P');

        p.className= 'bg-primary text-white';

        p.innerText = text;

        divafterImage.appendChild(p);


        image.insertAdjacentElement('afterend', divafterImage);

        const container = document.getElementById('container');

        container.appendChild(div);

        const mvalue = document.querySelector('.message-value');

        mvalue.value = '';

        const chat = document.querySelector('.chat');

        chat.scrollTop = chat.scrollHeight;

       })
       .catch(err=>console.log(err));
        
    });
   

    </script>
    <?php require 'templates/footer-scripts.php'; ?>
  </body>
</html>
