<?php

$servername="localhost";
$username="root";
$password="";
$database="notes";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("Sorry! The connection is not succesfull".mysqli_connect_error());
}
if(isset($_GET['delete']))
{
    $sno=$_GET['delete'];
    $sql="DELETE FROM `foods` WHERE `foods`.`sno` = $sno";
    $result=mysqli_query($conn,$sql);

}
$bill=0;
?>













<?php
$sno=4;
if($_SERVER['REQUEST_METHOD']=='POST')
{

  if(isset($_POST['snoEdit']))
  {
    // echo'Yes';   willl upadate the record now
    $sno=$_POST['snoEdit'];
    $title=$_POST['subject_namesEdit'];
    $quantedit=$_POST['quantEdit'];
  $sql="UPDATE `foods` SET `Name` = '$title' , `Quantity` = '$quantedit' WHERE `foods`.`sno` = $sno";      
      $result=mysqli_query($conn,$sql);
  
  }
elseif(isset($_POST["submit"]))
  {
         
  $subjectName=$_POST["subject_names"];
  $quant=$_POST["quant"];
  $sql="INSERT INTO foods (`Name`, `Quantity`) VALUES ('$subjectName','$quant')";
  mysqli_query($conn,$sql);

  }

  elseif(isset($_POST["submitloc"]))
  {
         
  $location=$_POST["w3review"];
  $sql="INSERT INTO locations (`addresss`) VALUES ('$location')";
  mysqli_query($conn,$sql);

  }
  
   




  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="index.js"></script>
    <title>Document</title>
    
  </head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
@import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,400;0,500;1,600&family=Roboto:ital,wght@1,300;1,400;1,500&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,400;0,500;1,600&family=Roboto:ital,wght@1,300;1,400;1,500&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
@import url("https://fonts.googleapis.com/css?family=Lato");

html, body {
  height: 100%;
  background-color: #333;
}

body {
  color: red;
  font-family: 'Roboto', sans-serif;
  font-size: 20px;
  line-height: 1.5;
  font-family: 'Dancing Script';
}

.slider {
  height: 100%;
  position: relative;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-flow: row nowrap;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
      -ms-flex-align: end;
          align-items: flex-end;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.slider__nav {
  width: 12px;
  height: 12px;
  margin: 2rem 12px;
  border-radius: 50%;
  z-index: 10;
  outline: 6px solid #ccc;
  outline-offset: -6px;
  box-shadow: 0 0 0 0 rgb(182, 27, 27), 0 0 0 0 rgba(231, 66, 66, 0);
  cursor: pointer;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}
.slider__nav:checked {
  -webkit-animation: check 0.4s linear forwards;
          animation: check 0.4s linear forwards;
}
.slider__nav:checked:nth-of-type(1) ~ .slider__inner {
  left: 0%;
}
.slider__nav:checked:nth-of-type(2) ~ .slider__inner {
  left: -100%;
}
.slider__nav:checked:nth-of-type(3) ~ .slider__inner {
  left: -200%;
}
.slider__nav:checked:nth-of-type(4) ~ .slider__inner {
  left: -300%;
}
.slider__inner {
  position: absolute;
  top: 0;
  left: 0;
  margin-top: 35px;
  width: 400%;
  height: 100%;
  -webkit-transition: left 0.4s;
  transition: left 0.4s;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-flow: row nowrap;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
}
.slider__contents {
  height: 100%;
  padding: 2rem;
  text-align: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
  -webkit-flex-flow: column nowrap;
      -ms-flex-flow: column nowrap;
          flex-flow: column nowrap;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.slider__image {
  font-size: 2.7rem;
      color: #2196F3;
}
.slider__caption {
  font-weight: 500;
  margin: 2rem 0 1rem;
  text-shadow: 0 1px 1px crimson;
  text-transform: uppercase;
}
.slider__txt {
  color: rgb(233, 129, 129);
  margin-bottom: 3rem;
  max-width: 300px;
}

@-webkit-keyframes check {
  50% {
    outline-color: rgb(233, 78, 78);
    box-shadow: 0 0 0 12px rgb(233, 78, 78), 0 0 0 36px rgb(233, 78, 78);
  }
  100% {
    outline-color: #333;
    box-shadow: 0 0 0 0 #333, 0 0 0 0 rgba(51, 51, 51, 0);
  }
}

@keyframes check {
  50% {
    outline-color: rgb(233, 78, 78);
    box-shadow: 0 0 0 12px rgb(233, 78, 78), 0 0 0 36px rgb(233, 78, 78);
  }
  100% {
    outline-color: rgb(233, 78, 78);
    box-shadow: 0 0 0 0 rgb(233, 78, 78), 0 0 0 0 rgb(233, 78, 78);
  }
}
.slider{
 background-size: cover;
 background-image: url('https://tse1.mm.bing.net/th?id=OIP.SDlP5ouXQuAU8Rqzi-XySAHaEx&pid');
 /* background-color: #333; */

  
}




/* navbar styling */
.navbar .max-width {
  display: flex;
  align-items: center;
  justify-content: space-between;
}




.max-width {
  max-width: 1300px;
  padding: 0 80px;
  margin: auto;
}

.navbar {
  /* background: red; */
  position: fixed;
  width: 100%;
  padding: 25px 0;
  transition: all 0.4s ease;
  /* Agr navbar syicky he aur us k uper kuch nahi lana */
  z-index: 999;
  font-family: 'Dancing Script';
  font-size: 20px;
  
}

.navbar.sticky {
  padding: 6px 0;
  padding-top: 12px;
  background: #333;
  opacity: 0.9;
  
}

.navbar.sticky .logo a span {
  color: whitesmoke;

}

.navbar .logo a {
  font-size: 35px;
  font-weight: 500px;
  color: whitesmoke;
  transition: color 0.3s ease;
  font-family: 'Lobster';
}

.navbar .menu li {
  list-style: none;
  display: inline-block;
 
}

.navbar .menu li a {
  color: whitesmoke;
  font-size: 19px;
  font-weight: 500;
  margin-left: 25px;
  transition: color 0.3s ease;
  text-decoration: none;
}

.navbar .menu li a:hover {
  color: red;

}   

  p {
    text-align: center;
    margin: 20px 0 60px;
  }
  
  main {
    background-color: #2C3845;
  }
  
  h1 {
    text-align: center;
    font-weight: 300;
  }
  
  table {
    display: block;
  }
  
  tr, td, tbody, tfoot {
    display: block;
  }
  
  thead {
    display: none;
  }
  
  tr {
    padding-bottom: 10px;
  }
  
  td {
    padding: 10px 10px 0;
    text-align: center;
  }
  td:before {
    content: attr(data-title);
    color: #7a91aa;
    text-transform: uppercase;
    font-size: 1.4rem;
    padding-right: 10px;
    display: block;
  }
  
  table {
    width: 100%;
  }
  
  th {
    text-align: left;
    font-weight: 700;
  }
  
  thead th {
    background-color: #202932;
    color: #fff;
    border: 1px solid #202932;
  }
  
  tfoot th {
    display: block;
    padding: 10px;
    text-align: center;
    color: #b8c4d2;
  }
  
  .button {
    line-height: 1;
    display: inline-block;
    font-size: 1.2rem;
    text-decoration: none;
    border-radius: 5px;
    color: #fff;
    padding: 8px;
    background-color: #4b908f;
  }
  
     .bord .select {
    padding-bottom: 20px;
    border-bottom: 1px solid #28333f;
  }
  .select:before {
    display: none;
  }
  
  .detail {
    background-color: #BD2A4E;
    width: 100%;
    height: 100%;
    padding: 40px 0;
    position: fixed;
    top: 0;
    left: 0;
    overflow: auto;
    -moz-transform: translateX(-100%);
    -ms-transform: translateX(-100%);
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
    -moz-transition: -moz-transform 0.3s ease-out;
    -o-transition: -o-transform 0.3s ease-out;
    -webkit-transition: -webkit-transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
  }
  .detail.open {
    -moz-transform: translateX(0);
    -ms-transform: translateX(0);
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  
  .detail-container {
    margin: 0 auto;
    padding: 40px;
    max-width: 500px;
  }
  
  dl {
    margin: 0;
    padding: 0;
  }
  
  dt {
    font-size: 2.2rem;
    font-weight: 300;
  }
  
  dd {
    margin: 0 0 40px 0;
    font-size: 1.8rem;
    padding-bottom: 5px;
    border-bottom: 1px solid #ac2647;
    box-shadow: 0 1px 0 #c52c51;
  }
  
  .close {
    background: none;
    padding: 18px;
    color: #fff;
    font-weight: 300;
    border: 1px solid rgba(255, 255, 255, 0.4);
    border-radius: 4px;
    line-height: 1;
    font-size: 1.8rem;
    position: fixed;
    right: 40px;
    top: 20px;
    -moz-transition: border 0.3s linear;
    -o-transition: border 0.3s linear;
    -webkit-transition: border 0.3s linear;
    transition: border 0.3s linear;
  }
  .close:hover, .close:focus {
    background-color: #a82545;
    border: 1px solid #a82545;
  }
  
  @media (min-width: 460px) {
    td {
      text-align: left;
    }
    td:before {
      display: inline-block;
      text-align: right;
      width: 140px;
    }
  
    .select {
      padding-left: 160px;
    }
  }
  @media (min-width: 720px) {
    table {
      display: table;
    }
  
    tr {
      display: table-row;
    }
  
    td, th {
      display: table-cell;
    }
  
    tbody {
      display: table-row-group;
    }
  
    thead {
      display: table-header-group;
    }
  
    tfoot {
      display: table-footer-group;
    }
  
    td {
      border: 1px solid #28333f;
    }
    td:before {
      display: none;
    }
  
    td, th {
      padding: 10px;
    }
  
    tr:nth-child(2n+2) td {
      background-color: #242e39;
    }
  
    tfoot th {
      display: table-cell;
    }
  
    .select {
      padding: 10px;
    }
  }


.bord h3{
  color: rgb(248, 190, 190);

text-align: center;
font-size: 40px;
font-family: 'Lobster';

}








.select-hidden {
  display: none;
  visibility: hidden;
  padding-right: 10px;
}

.select {
  cursor: pointer;
  display: inline-block;
  position: relative;
  font-size: 16px;
  color: #fff;
  width: 220px;
  height: 40px;
}

.select-styled {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  border-radius: 7px;
  left: 0;
  background-color: #c0392b;
  padding: 8px 15px;
  -moz-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  -webkit-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}
.select-styled:after {
  content: "";
  width: 0;
  height: 0;
  border: 7px solid transparent;
  border-color: #fff transparent transparent transparent;
  position: absolute;
  top: 16px;
  right: 10px;
}
.select-styled:hover {
  background-color: #b83729;
}
.select-styled:active, .select-styled.active {
  background-color: #ab3326;
}
.select-styled:active:after, .select-styled.active:after {
  top: 9px;
  border-color: transparent transparent #fff transparent;
}

.select-options {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
  left: 0;
  z-index: 999;
  margin: 0;
  padding: 0;
  list-style: none;
  background-color: #ab3326;
}
.select-options li {
  margin: 0;
  padding: 12px 0;
  text-indent: 15px;
  border-top: 1px solid #962d22;
  -moz-transition: all 0.15s ease-in;
  -o-transition: all 0.15s ease-in;
  -webkit-transition: all 0.15s ease-in;
  transition: all 0.15s ease-in;
}
.select-options li:hover, .select-options li.is-selected {
  color: #c0392b;
  background: #fff;
}
.select-options li[rel="hide"] {
  display: none;
}






.bord{
  
    border: 1px solid rgb(255, 41, 41);
    height: 391px;
    width: 651px;
    margin-top: 41px;
    margin-left: 332px;
    margin-bottom: 50px;
    /* padding: 71px; */
    background-image: url('https://tse2.mm.bing.net/th?id=OIP.8Stfkkx7EVpoklNIaiDH1QHaE7&pid');
   background-repeat: no-repeat;
   background-size: cover;
   border-radius: 12px;
}

.bord .selection1{
  margin-left: -25px;
  padding: 19px;
  margin-top: 40px;

}
.bord .selection2{
  margin-left: 370px;
  margin-top: -86px;
  padding: 19px;
}


#submit{
  color: white;
  background-color: rgb(245, 45, 45);
  border: none;
  border-radius: 4px;
  height: 40px;
  width: 140px;
  margin-left: 234px;
  margin-top: 216px;
}
#submit:hover{
  background-color: red;
}


#headi{
  color: rgb(255, 0, 51);
  padding-left: 80px;
  padding-top: 70px;
  font-family: cursive;
  
 
}

.tabi{
  color: rgb(255, 230, 235);
  border: crimson 12px solid;
  width: 620px;
  height: auto;
}

#dati{
  color: rgb(255, 133, 157);
  padding: -12px;
  text-align: center;
  margin-left: 130px;
}

#bt{
  color: #a82545;
}





#pricing-table {
	  margin: 100px auto;
	  text-align: center;
	  width: 892px; /* total computed width = 222 x 3 + 226 */
  }
  
  #pricing-table .plan {
	  font: 12px 'Lucida Sans', 'trebuchet MS', Arial, Helvetica;
	  text-shadow: 0 1px rgba(255,255,255,.8);        
	  background: #fff;      
	  border: 1px solid #ddd;
	  color: #333;
	  padding: 20px;
	  width: 180px; /* plan width = 180 + 20 + 20 + 1 + 1 = 222px */      
	  float: left;
	  position: relative;
  }
  
  #pricing-table #most-popular {
	  z-index: 2;
	  top: -13px;
	  border-width: 3px;
	  padding: 30px 20px;
	  -moz-border-radius: 5px;
	  -webkit-border-radius: 5px;
	  border-radius: 5px;
	  -moz-box-shadow: 20px 0 10px -10px rgba(0, 0, 0, .15), -20px 0 10px -10px rgba(0, 0, 0, .15);
	  -webkit-box-shadow: 20px 0 10px -10px rgba(0, 0, 0, .15), -20px 0 10px -10px rgba(0, 0, 0, .15);
	  box-shadow: 20px 0 10px -10px rgba(0, 0, 0, .15), -20px 0 10px -10px rgba(0, 0, 0, .15);    
  }
  
  #pricing-table .plan:nth-child(1) {
	  -moz-border-radius: 5px 0 0 5px;
	  -webkit-border-radius: 5px 0 0 5px;
	  border-radius: 5px 0 0 5px;        
  }
  
  #pricing-table .plan:nth-child(4) {
	  -moz-border-radius: 0 5px 5px 0;
	  -webkit-border-radius: 0 5px 5px 0;
	  border-radius: 0 5px 5px 0;        
  }
  
  /* --------------- */	
  
  #pricing-table h3 {
	  font-size: 20px;
	  font-weight: normal;
	  padding: 20px;
	  margin: -20px -20px 50px -20px;
	  background-color: #eee;
	  background-image: -moz-linear-gradient(#fff,#eee);
	  background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));    
	  background-image: -webkit-linear-gradient(#fff, #eee);
	  background-image: -o-linear-gradient(#fff, #eee);
	  background-image: -ms-linear-gradient(#fff, #eee);
	  background-image: linear-gradient(#fff, #eee);
  }
  
  #pricing-table #most-popular h3 {
	  background-color: #ddd;
	  background-image: -moz-linear-gradient(#eee,#ddd);
	  background-image: -webkit-gradient(linear, left top, left bottom, from(#eee), to(#ddd));    
	  background-image: -webkit-linear-gradient(#eee, #ddd);
	  background-image: -o-linear-gradient(#eee, #ddd);
	  background-image: -ms-linear-gradient(#eee, #ddd);
	  background-image: linear-gradient(#eee, #ddd);
	  margin-top: -30px;
	  padding-top: 30px;
	  -moz-border-radius: 5px 5px 0 0;
	  -webkit-border-radius: 5px 5px 0 0;
	  border-radius: 5px 5px 0 0; 		
  }
  
  #pricing-table .plan:nth-child(1) h3 {
	  -moz-border-radius: 5px 0 0 0;
	  -webkit-border-radius: 5px 0 0 0;
	  border-radius: 5px 0 0 0;       
  }
  
  #pricing-table .plan:nth-child(4) h3 {
	  -moz-border-radius: 0 5px 0 0;
	  -webkit-border-radius: 0 5px 0 0;
	  border-radius: 0 5px 0 0;       
  }	
  
  #pricing-table h3 span {
	  display: block;
	  font: bold 25px/100px Georgia, Serif;
	  color: #777;
	  background: #fff;
	  border: 5px solid #fff;
	  height: 100px;
	  width: 100px;
	  margin: 10px auto -65px;
	  -moz-border-radius: 100px;
	  -webkit-border-radius: 100px;
	  border-radius: 100px;
	  -moz-box-shadow: 0 5px 20px #ddd inset, 0 3px 0 #999 inset;
	  -webkit-box-shadow: 0 5px 20px #ddd inset, 0 3px 0 #999 inset;
	  box-shadow: 0 5px 20px #ddd inset, 0 3px 0 #999 inset;
  }
  
  /* --------------- */
  
  #pricing-table ul {
	  margin: 20px 0 0 0;
	  padding: 0;
	  list-style: none;
  }
  
  #pricing-table li {
	  border-top: 1px solid #ddd;
	  padding: 10px 0;
  }
  
  /* --------------- */
	  
  #pricing-table .signup {
	  position: relative;
	  padding: 8px 20px;
	  margin: 20px 0 0 0;  
	  color: #fff;
	  font: bold 14px Arial, Helvetica;
	  text-transform: uppercase;
	  text-decoration: none;
	  display: inline-block;       
	  background-color: #72ce3f;
	  background-image: -moz-linear-gradient(#72ce3f, #62bc30);
	  background-image: -webkit-gradient(linear, left top, left bottom, from(#72ce3f), to(#62bc30));    
	  background-image: -webkit-linear-gradient(#72ce3f, #62bc30);
	  background-image: -o-linear-gradient(#72ce3f, #62bc30);
	  background-image: -ms-linear-gradient(#72ce3f, #62bc30);
	  background-image: linear-gradient(#72ce3f, #62bc30);
	  -moz-border-radius: 3px;
	  -webkit-border-radius: 3px;
	  border-radius: 3px;     
	  text-shadow: 0 1px 0 rgba(0,0,0,.3);        
	  -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, .5), 0 2px 0 rgba(0, 0, 0, .7);
	  -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, .5), 0 2px 0 rgba(0, 0, 0, .7);
	  box-shadow: 0 1px 0 rgba(255, 255, 255, .5), 0 2px 0 rgba(0, 0, 0, .7);
  }
  
  #pricing-table .signup:hover {
	  background-color: #62bc30;
	  background-image: -moz-linear-gradient(#62bc30, #72ce3f);
	  background-image: -webkit-gradient(linear, left top, left bottom, from(#62bc30), to(#72ce3f));      
	  background-image: -webkit-linear-gradient(#62bc30, #72ce3f);
	  background-image: -o-linear-gradient(#62bc30, #72ce3f);
	  background-image: -ms-linear-gradient(#62bc30, #72ce3f);
	  background-image: linear-gradient(#62bc30, #72ce3f); 
  }
  
  #pricing-table .signup:active, #pricing-table .signup:focus {
	  background: #62bc30;       
	  top: 2px;
	  -moz-box-shadow: 0 0 3px rgba(0, 0, 0, .7) inset;
	  -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .7) inset;
	  box-shadow: 0 0 3px rgba(0, 0, 0, .7) inset; 
  }
  
  /* --------------- */
  
  .clear:before, .clear:after {
	content:"";
	display:table
  }
  
  .clear:after {
	clear:both
  }
  
  .clear {
	zoom:1
  }


.location{
color:rgb(255, 0, 51);
/* margin-bottom: 400px; */
margin-left: 450px;

}
#w3review
{
  border: crimson 2px solid;

  border-radius: 13px;
  background-color: #333;
  color: whitesmoke;
}

#loc{
  color: white;
  width:90px;
  background-color: crimson;
border: none;
height:40px;
border-radius: 13px;
margin-left: 32px;
}

  </style>




<body>
 <!-- Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this note</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <form action="/foodi/index.php" method="POST" class="mb-3">
        <input type="hidden" name="snoEdit" id="snoEdit">
    <h3>Choose your favorite languages</h3>

    <select name="subject_namesEdit"  class="custom-select" id="subject_namesEdit">
 <option disabled selected>Select Subject</option>
 <option value="chicken">Chicken</option>
 <option value="pizza">Pizza</option>
 <option value="fish">Fish</option>
 <option value="beef">Beef</option>
 <option value="showarma">showarma</option>
 </select>

 <select name="quantEdit"  class="custom-select" id="quantEdit">
 <option disabled selected>Select Quantity</option>
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 </select>
 <button type="submit" name="submitEdit" id="submitEdit" >Submit</button>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


<!-- ************************************************************************************* -->
<nav class="navbar ">
    <div class="max-width">
    <ul class="menu">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#team">Projects</a></li>
        <li><a href="#"><label  id="dark-change"></label></a></li>
    </ul>
    
    </div>
</nav>

  <div class="slider">
    
    </nav>
    <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>
    <input type="radio" name="slider" title="slide2" class="slider__nav"/>
    <input type="radio" name="slider" title="slide3" class="slider__nav"/>
    <input type="radio" name="slider" title="slide4" class="slider__nav"/>
    <div class="slider__inner">
      <div class="slider__contents"><img src="https://tse2.mm.bing.net/th?id=OIP.bjnTsR-Ya_9mq1ql3KeczgHaEF&pid=Api&P=0&w=299&h=165" alt=""></i>
        <h2 class="slider__caption">Kale-bacon pizza</h2>
        <p class="slider__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate omnis possimus illo quos, corporis minima! </p>
      </div>
      <div class="slider__contents"><img src="https://tse3.mm.bing.net/th?id=OIP.l5h7aEtJ4fbIFVGX7Xij-QHaE8&pid=Api&P=0&w=280&h=280" alt=""></i>
        <h2 class="slider__caption">Chicken</h2>
        <p class="slider__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate omnis possimus illo quos, corporis minima!</p>
      </div>
      <div class="slider__contents"><img src="https://tse3.mm.bing.net/th?id=OIP.782Iz0Xdt9yWZeNhCGRUbgHaE8&pid=Api&P=0&w=270&h=180" alt=""></i>
        <h2 class="slider__caption">Fish</h2>
        <p class="slider__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate omnis possimus illo quos, corporis minima!</p>
      </div>
      <div class="slider__contents"><img src="https://tse4.mm.bing.net/th?id=OIP.RIeTeLEeJ0aLBZO3JcnrZQHaEK&pid=Api&P=0&w=277&h=156" alt=""></i>
        <h2 class="slider__caption">Beef</h2>
        <p class="slider__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate omnis possimus illo quos, corporis minima!</p>
      </div>
    </div>
  </div>
<!-- ************************************************************************************** -->











<h1 class="mx-4 my-4" id="headi">
  GREAT&nbsp&nbsp&nbspCHOICES&nbsp AMAZING&nbsp TASTE</h1>

<div class="bord" >


   
    
    


   


<div class="myform-container mx-4">
<form action="/foodi/index.php" method="POST" class="mb-3">

<div class="selection1">
    <select name="subject_names"  class="custom-select" id="subject_names">
 <option disabled selected>Select&nbsp Menu</option>
 <option value="chicken">Chicken</option>
 <option value="pizza">Pizza</option>
 <option value="fish">Fish</option>
 <option value="beef">Beef</option>
 </select>
</div>






<div class="selection2">
 <select name="quant"  class="custom-select" id="quant">
 <option disabled selected>Select Quantity</option>
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 </select>
</div>



 <!-- <button type="submit" name="submit" id="submit" >Submit</button> -->

 <button  type="submit" name="submit" id="submit">Submit</button>
</div>


</div>



</form>





<div class="tabi container ">
<main >
    <table  id="myTable" class="tab" >
     <thead  >

        <tr >
          <th scope="col">S.No</th>
          <th scope="col">Name</th>
          <th scope="col">quantity</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>

      <tfoot class="foot">
        <tr>
          <th colspan='3' id="dati">
            2-3-2022 - 4PM
          </th>
        </tr>
      </tfoot>
      
      
      <tbody>
     
       
      
        <?php
$sql="select * from foods";
$result=mysqli_query($conn,$sql);
$sno=0;
while($row= mysqli_fetch_assoc($result))
    {
      $sno+=1;
  //   echo"<tr>
  //   <th scope='col'>".$sno."</td>
  //   <td scope='col'>".$row['Name']."</td>
  //   <td scope='col'>".$row['Quantity']."</td>
  //   <td scope='col'><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button>  <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button></td>
  // </tr>";
  echo"<tr>
  <td >".$sno."</td>
  <td scope='col'>".$row['Name']."</td>
  <td scope='col'>".$row['Quantity']."</td>
  <td scope='col'><button class='edit btn btn-sm btn-info' id=".$row['sno'].">Edit</button>  <button class='delete btn btn-sm btn-info' id=d".$row['sno'].">Delete</button></td>
</tr>";


    }
?>
      
      
      </tbody>
    </table>
   

  </main>
  </div>



  <?php

  $sql="select * from foods";
  $result=mysqli_query($conn,$sql);
  $sno=0;
  $pizzabill=100;
  $chickenbill=200;
  $fishbill=300;
  $beefbill=500;
  $total=0;
  
  while($row= mysqli_fetch_assoc($result))
      {
        if  ($row['Name'] == 'pizza')
        {
          $i=$pizzabill*$row['Quantity'];
         $total+=$i;
        }
        if  ($row['Name'] == 'chicken')
        {
          $i=$chickenbill*$row['Quantity'];
         $total+=$i;
        }
        if  ($row['Name'] == 'beef')
        {
          $i=$beefbill*$row['Quantity'];
         $total+=$i;
        }
        if  ($row['Name'] == 'fish')
        {
          $i=$fishbill*$row['Quantity'];
         $total+=$i;
        }

        
      }      
  
  ?>
<!--                                   pricing -->
<div id="pricing-table" class="clear">
  <div class="plan">
      <h3 style="font-weight: bolder;font-style: italic;">BILL<span><?php echo $total.'Rs' ;?></span></h3>
      <a class="signup" href="">Payment</a>         
      <ul>
          
      
  <?php

$sql="select * from foods";
$result=mysqli_query($conn,$sql);
while($row= mysqli_fetch_assoc($result))
    {
     
        if($row['Name']=='chicken')
        {
          echo '<li><b>'.$row['Name'].'&nbsp&nbsp</b>200 Rs</li>';
        }
        if($row['Name']=='pizza')
        {
          echo '<li><b>'.$row['Name'].'&nbsp&nbsp</b>100 Rs</li>';
        }
        if($row['Name']=='fish')
        {
          echo '<li><b>'.$row['Name'].'&nbsp&nbsp</b>300 Rs</li>';
        }
        if($row['Name']=='beef')
        {
          echo '<li><b>'.$row['Name'].'&nbsp&nbsp</b>500 Rs</li>';
        }
      
    }   

?>
      
      
  




       <li><b>Enjoy</b> Food</li>			
      </ul> 
  </div>





  <div class="location">
    <h1>Add Your Address</h1>
  
  <form action="/foodi/index.php" method="POST">
  <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
  <br>
  <input type="submit" name="submitloc" id="submitloc">
  </form>
  
  </div>

</div>
<!--                                      pricing end -->






















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>




<script>
     edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener('click', (e) => {
        console.log("edit",);
        tr = e.target.parentNode.parentNode;
        Name = tr.getElementsByTagName("td")[0].innerText;
        Quantity = tr.getElementsByTagName("td")[1].innerText;
        console.log(Name, Quantity);
        subject_namesEdit.value = Name;
        quantEdit.value = Quantity;
        snoEdit.value = e.target.id
        console.log(snoEdit);
        $("#editModal").modal("toggle");
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener('click', (e) => {
        console.log("edit",);
       sno=e.target.id.substr(1,);
       if(confirm("Press a button!"))
       {
        console.log("Yes");
        window.location=`/foodi/index.php?delete=${sno}`;
       }
       else
       {
        console.log("No");
       }
      })
    })





  

</script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>



<script>
  $(document).ready(function () {

$(window).scroll(function () {
    if (this.scrollY > 20) {
        $('.navbar').addClass("sticky");
    } else {
        $('.navbar').removeClass("sticky");

    }
})
});



/*
Reference: http://jsfiddle.net/BB3JK/47/
*/

$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
        //if ($this.children('option').eq(i).is(':selected')){
        //  $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
        //}
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });






});




</script>
</body>
</html>














