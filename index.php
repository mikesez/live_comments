<?php /*
* Zive komentare - Michal Kuzela
* implementace komentaru s realtime zobrazovanim novych komentaru bez nutnosti aktualizace stránky
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

    <div id="status_box"> Komentar odeslan </div>
    
    <h1> Live komentare </h1>

    <div id="comment_article">
        <?php include("get.php"); ?> 
    </div>

    Jmeno: <br>
    <input type="text" id="firstname">
    <div id="fillName" style="color:red;"> Zadejte prosim jmeno :) </div>
    <br> Prijmeni: <br>
    <input type="text" id="lastname"> <br>
    <textarea id="text" style="resize:none; width:80%; height:20%;" placeholder="Tvuj komentar..."></textarea> <br>
    <button id="new_comment"> Odeslat! </button>

    <script type="text/javascript">
    $('#fillName').hide();      
    $('#status_box').hide();
    
    function refresh() {
          setTimeout(function(){ 
                    $('#comment_article').load('get.php');  
                    $('#status_box').text("Komentare aktualizovany");     refreshInterval(4000);
                    }, 2000);
                    
                     setTimeout(function(){ 
                    $('#status_box').hide(); 
                    $('#status_box').text("Komentar odeslan");
                    }, 4000);
    };
    
    function refreshInterval(i) {
        setTimeout(function(){ 
                    $('#comment_article').load('get.php');  
                    $('#status_box').text("Komentare aktualizovany");     $('#status_box').show();
                    }, i);
                    
                    setTimeout(function(){ 
                    $('#status_box').hide(); 
                    $('#status_box').text("Komentar odeslan");            refreshInterval(2000);
                    }, i+1000);
    }
    
    
    $('#new_comment').click(function() {
        $firstname =   document.getElementById("firstname").value; 
        
        if ($firstname != '') { 
        
            $('#fillName').hide();
            $lastname =   document.getElementById("lastname").value; 
            $text =   document.getElementById("text").value;         
            $('#status_box').show();
            
            $('#new_comment').load('send.php', { firstname: $firstname, lastname: $lastname, text: $text}, function(e){
            
                  console.log(e);
                  
                   refresh();
                    
                 
                    
                  });
         } else { 
         $('#fillName').show(); 
         }
    });
    
</script>

</body>

</html>