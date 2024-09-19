<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];
    if($_SESSION['userdata']['status']==0){
        $status = '<b style = color:red> Not Voted </b>';
    }
    else{
        $status = '<b style = color:green>Voted </b>';
    }
?>

<html>
    <head>
        <title>online voting system - Dashboard</title>
        <link rel="stylesheet" href="..\css\stylesheet.css">
    </head>
    <body>
    <style>
        #backbtn{
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
            background-color:#054ddf;
            color: white;
            border-radius: 5px;
            float:left;
            margin: 10px;
        }
        #logoutbtn{
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
            background-color:#054ddf;
            color: white;
            border-radius: 5px;
            float:right;
            margin: 10px;
        }
        #profile{
            border:2px solid black;
            background-color: white;
            width: 40%;
            float: left;
        }
        #group{
            border:2px solid black;
            background-color:white;
            width: 50%;
            float: right;
        }
        #votebtn{
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
            background-color:#054ddf;
            color: white;
            border-radius: 5px;
        }
        #mainpanel{
            padding: 20px;
        }
        #headersection{
            padding: 20px;
        }
        #voted{
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
            background-color:green;
            color: white;
            border-radius: 5px;
        }

        </style>

        <div id="mainsection">
            <center>
        <div id="headersection">
        <a href="../index.html"><button id="backbtn">back</button></a>
        <a href="../routes/logout.php"><button id="logoutbtn">logout</button></a>
        <h1>online voting system</h1>
        </div>
            </center>
        <hr>
        <div id="mainpanel">
        <div id="profile">
         <center><img src="../upload/<?php echo $userdata['photo'] ?>" height ="200" width = "200" ><br><br><br></center>
            <b>Name: </b><?php echo $userdata['name'] ?><br><br><br>
            <b>Mobile: </b><?php echo $userdata['mobile'] ?><br><br><br>
            <b>Address: </b><?php echo $userdata['address'] ?><br><br><br>
            <b>Status: </b><?php echo $status ?><br><br>
        </div>
        <div id="group">
            <?php
            if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++){
                    ?>
                    <div>
                        <img style = "float:right" src="../upload/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                        <b>Group Name : </b><?php echo $groupsdata[$i]['name'] ?><br><br>
                        <b>Votes : </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                            <?php
                                if($_SESSION['userdata']['status']==0){
                                    ?>
                                    <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                    <?php
                                }
                                else{
                                    ?>
                                    <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                                    <?php
                                }
                            ?>
                            
                        </form>
                    </div>
                    
                    <hr>
                    <?php
                }

            }
            else{

            }
            ?>
        </div>
        </div>
        </div>
      
        
    </body>
</html>