<?php /*
* Zive komentare - Michal Kuzela
* implementace komentaru s realtime zobrazovanim novych komentaru bez nutnosti aktualizace str�nky
* vyuziti php, mysql a jquery
* 
* Live comments
* Allows users to send comments and also view new comments without refreshing webpage
* Technologies used php, mysql and jquery
*/        ?>

<!doctype html>
<html lang="cz">

<head>
    <title>live komentare</title>
    <style>
        body {
            height: 30em;
        }
        
        #status_box {
            width: 20%;
            height: 10%;
            position: absolute;
            margin-left: 40%;
            background-color: #2ecc71;
            text-align: center;
            color: white;
            display: -webkit-box;
            -webkit-box-pack: center;
            -webkit-box-align: center;
            border-radius: 25px;
        }
        
        #comment_article {
            height: 50%;
            overflow: auto;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
</head>

<body> 

    <div id="status_box"> Koment�� odesl�n </div>
    
    <h1> Live komentare </h1>

    <div id="comment_article">
        <?php include("get.php"); ?> 
    </div>

    Va�e jm�no: <br>
    <input type="text" id="firstname">
    <div id="fillName" style="color:red;"> Zadejte pros�m jm�no :) </div>
    <br> P��jmen�: <br>
    <input type="text" id="lastname"> <br>
    <textarea id="text" style="resize:none; width:80%; height:20%;" placeholder="Tvuj komentar..."></textarea> <br>
    <button id="new_comment"> Odeslat! </button>

    <script type="text/javascript">
    $('#fillName').hide();      
    $('#status_box').hide();
    
    $('#new_comment').click(function() {
        $firstname =   document.getElementById("firstname").value; 
        
        if ($firstname != '') { 
        
            $('#fillName').hide();
            $lastname =   document.getElementById("lastname").value; 
            $text =   document.getElementById("text").value;         
            $('#status_box').show();
            
            $('#new_comment').load('send.php', { firstname: $firstname, lastname: $lastname, text: $text}, function(e){
            
                  console.log(e);
                  
                  setTimeout(function(){ 
                    $('#comment_article').load('get.php');  
                    $('#status_box').text("Koment��e aktualizov�ny"); 
                    }, 3000);
                    
                  setTimeout(function(){ 
                    $('#status_box').hide(); 
                    $('#status_box').text("Koment�� odesl�n");
                    }, 4000);
                    
                  });
         } else { 
         $('#fillName').show(); 
         }
    });
    
</script>

</body>

</html>