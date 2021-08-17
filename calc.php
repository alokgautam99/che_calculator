<?php
include("connection.php");
        $sql = mysqli_query($conn, "SELECT * from che ");
        $usercount = mysqli_fetch_assoc($sql);
$value = "0";
$save = "0";
$ab = "0";
$usercount2 = "0";
$usercount1 = NULL;
   if(isset($_GET['value'])){
       $value = $_GET['value'];
       $sql1 = mysqli_query($conn, "SELECT * from che WHERE element='$value'");
       $usercount1 = mysqli_fetch_assoc($sql1);
       //print_r($usercount1);
   } 
   if(isset($_GET['save'])){
       $save = $_GET['save'];
        if(strpos($save,'0-') !== false){
            $save2 = explode("0-",$save);
            echo $save2[1];
            $sql2 = mysqli_query($conn, "SELECT * from lab WHERE reaction='$save2[1]'");
            $usercount2 = mysqli_fetch_assoc($sql2);
            $a = explode("-",$save2[1]);
            $ab = count($a);
        }
        
    //    echo $check;
       
    //    $sql2 = mysqli_query($conn, "SELECT * from che WHERE reaction='$save'");
    //    $usercount2 = mysqli_fetch_assoc($sql2);
       //echo $save;
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   
<title> CHECALCULATOR </title>
<style type= text/css>
    a{
        background-color:#cc0000;
        border:1px solid #660000;
        border-radius:5px;
        color:#fff;
        margin-right:10px;
        padding:10px 10px 10px 10px;
    }
    body {
        background-color:blueviolet ;
    }
    .title{
            width: 600px;
            height: 60px;
    }
    input[type=button]{
        border-color:  rgb(37, 146, 64);
        height: 50px;
        width: 100px;   
    }
    .H1{
        background-color: red;
        color:black;
    }
    .H2{
        background-color: yellow;
    }
    .H3{
         background-color: violet; 
    }
    .H4{
        background-color: white;
    }
    .H5{
        background-color: teal;
    }
    .H6{
        background-color: tomato;
    }
    .H7{
        background-color: wheat;
    }
    .H8{
        background-color: yellowgreen;
    }
    .save{
        margin-left:30%;
        border-color:  rgb(37, 146, 64);
        height: 50px;
        width: 100px; 
        text-decoration:none;
    }
    .restart{
        height: 50px;
        width: 100px; 
        text-decoration:none;
    }
    .overall{
        margin-left:25%;
        width:50%;
    }
    .element{
        margin-top:3%
    }
    .action{
        margin-top:3%;
    }
    /* @media only screen and (min-width: 1281px){
        .title{
            width: 600px;
            height: 60px;
        }
    } */
    @media screen and (max-width: 600px) {
        .title{
            width: 100%;
        }
        .save{
            margin-left:20%;
        }
        .action{
            margin-top:10%;
        }
        .element{
            margin-top:10%;
        }
    }
</style>
</head>
<body>
    <div class="overall">
    <table style="border:1">
        <br><br>
        <br><br>
    <b>
        <input type="text" class="title" placeholder="REACTION WHICH YOU ARE LOOKING FOR" value="<?php if($ab != "0"){for($k=0;$k<$ab;$k++){echo $a[$k];if($k != $ab-1){echo "+";}else{echo "=";}}if($usercount2 != "0"){if($usercount2){echo $usercount2['product'];}else{echo "No Reaction";} }else{echo "No Reaction";}} ?>"><br>
        <div class="action">
            <?php if($value != "0"){ ?>
                <a href="calc.php?save=<?php echo $save.'-'.$value;?>" class="save">Save</a>
            <?php }else{ ?>
                <a href="calc.php" class="save">Save</a>
            <?php } ?>
            <a href="calc.php" class="restart">Restart</a><br>
        </div>
<div class="element">
<?php 
        foreach($sql as $usercount) {     
            $class = "H3";
            $element = $usercount['element'];
    ?>
            <input  type="button" class=<?php echo $class ; ?> value=<?php echo $element;?> onclick="window.location.href='calc.php?save=<?php echo $save; ?>&&value=<?php echo $element; ?>';">
    <?php  }
    ?>
</div>
    
        <!-- <input type="submit"class="H7"  value="Al">
        <input type="submit" class="H4"value="Ar" >
        <input type="submit" class="H1" value="As" >
        <input type="submit" class="H1" value="B" >
        <input type="submit"class="H6" value="Ba" > -->
        <!-- <br>
        <input type="submit"class="H6" value="Be" >
        <input type="submit"class="H5" value="Br" >
        <input type="submit" class="H1" value="C" >
        <input type="submit"class="H6" value="Ca" >
        <input type="submit"class="H3" value="Cd" >
        <input type="submit" class="H2"value="Ce" >
         <br>
        <input type="submit"class="H5" value="Cl" >
        <input type="submit"class="H3" value="Co" >
        <input type="submit"class="H3" value="Cr" >
        <input type="submit"class="H8" value="Cs" >
        <input type="submit"class="H3" value="Cu" >
        <input type="submit"class="H5" value="F" >
         
        <br>
        <input type="submit" class="H3" value="Fe" >
        <input type="submit" class="H7"value="Ga" >
        <input type="submit"class="H7" value="Ge" >
        <input type="submit" class="H1" value="H" >
        <input type="submit"class="H4" value="He" >
        <input type="submit"class="H5" value="I">
    
    
        <br>
        <input type="submit" class="H7"value="In" >
        <input type="submit"class="H8" value="K" >
        <input type="submit" class="H4"value="Kr" >
        <input type="submit"class="H2" value="La" >
        <input type="submit"class="H8" value="Li" >
        <input type="submit"class="H6" value="Mg" >
         
        <br>
        <input type="submit" class="H3"value="Mn" >
        <input type="submit"class="H3" value="Mo" >
        <input type="submit" class="H1" value="N">
        <input type="submit"class="H8" value="Na" >
        <input type="submit"class="H3" value="Nb" >
        <input type="submit"class="H2" value="Nd" >
        
        <br>
        <input type="submit"class="H4" value="Ne" >
        <input type="submit" class="H3"value="Ni" >
        <input type="submit" class="H1" value="O" >
        <input type="submit"  class="H1"value="P" >
        <input type="submit"class="H3" value="Pd" >
        <input type="submit"class="H2" value="Pr" >
         
         
        <br>
        <input type="submit" class="H8"value="Rb" >
        <input type="submit"class="H3" value="Rh" >
        <input type="submit"class="H3" value="Ru" >
        <input type="submit" class="H1" value="S" >
        <input type="submit" class="H7"value="Sb" >
        <input type="submit" class="H2"value="Sc" >
        
        <br>
        <input type="submit" class="H1" value="Se" >
        <input type="submit" class="H1" value="Si" >
        <input type="submit"class="H7" value="Sn">
        <input type="submit" class="H6"value="Sr" >
        <input type="submit"class="H3" value="Tc">
        <input type="submit" class="H1" value="Te" >
        
        
        <br>
        <input type="submit" class="H3"value="Ti" >
        <input type="submit" class="H3"value="V" >
        <input type="submit"class="H4" value="Xe" >
        <input type="submit"class="H2" value="Y" >
        <input type="submit"class="H3" value="Zn" >
        <input type="submit"class="H3" value="Zr" >
        
    </b> -->
         
    </table>
    </div>
    <!-- from here      -->

<?php if($value != "0" && $usercount1 != ""){ ?>
    <div class="overall">
    <table style="border:1">
        <br><br>
        <br><br>
    <b>
    <?php 
        $mole = explode(",",$usercount1['molecule']);
        $j = count($mole);
        for($i=0;$i<$j;$i++) {     
            $class = "H3";
            $molecule = $mole[$i];
    ?>
            <input  type="button" class=<?php echo $class ; ?> value=<?php echo $molecule;?> onclick="window.location.href='calc.php?save=<?php echo $save; ?>&&value=<?php echo $molecule; ?>';">      
    <?php  }
    ?>
         
    </table>
    </div>
<?php } ?>
</body>
</html>