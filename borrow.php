<?php
session_start();
include('conn.php');
$status="";
if (isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id'];
$result = mysqli_query($connection,"SELECT * FROM books WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
$Title = $row['Title'];
$id= $row['id'];
$Author = $row['Author'];
$Publisher = $row['Publisher'];
$CallNo = $row['CallNo'];
$Availability = $row['Availability'];
$Images = $row['Images'];

$cartArray = array(
	$id=>array(
	'Author'=>$Author,
	'id'=>$id,
    'Publisher'=>$Publisher,
    'CallNo' => $CallNo,
    'Availability'=>$Availability,
    'Image'=>$Images)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Book is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($id,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Book is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Book is added to your cart!</div>";
	}

	}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Borrow Today!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        background: url(./images/borrow_BGv2.png) no-repeat center;
        background-size: cover;
        -webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
        height: 1000px;
        overflow-y: hidden;
    }

    .container {
        height: 200px;
        background-color: #773344; /* For browsers that do not support gradients */
        background-image: linear-gradient(#773344, #d44d5c, #e3b5a4);
        border-radius: 25px;
        margin: 50px auto;
        padding: 50px;
        width: 70%;
        height: 50%;
        overflow: auto;
        overflow-y: scroll; /* Add the ability to scroll */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .container::-webkit-scrollbar {
    display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .container {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
    }

    .container .sidetext {
        writing-mode: vertical-rl;
        text-orientation: mixed;
        text-align: justify;
        position: fixed;
        color: white;
        font-family: arial;
        text-transform: uppercase;
        letter-spacing: 10px;
        margin-top: -35px;
        margin-left: -2.5%;
        margin-bottom: 30px;
    }

    .container .second-sidetext {
        writing-mode: vertical-rl;
        text-orientation: mixed;
        text-align: justify;
        position: fixed;
        color: white;
        font-family: arial;
        text-transform: uppercase;
        letter-spacing: 7px;
        margin-top: -25px;
        margin-left: 69%;
        margin-bottom: 30px;
    }

    .container .home-btn {
        position: fixed;
        top: 93%;
        margin-left: 8%;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container a:hover {
        color: #0b0014;
        transition: .5s ease;
    }

    .container .abt-btn {
        position: fixed;
        top: 93%;
        margin-left: 24.5%;
        font-weight: bold;
        text-decoration: none;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
    }    
    
    .container .inst-btn {
        position: fixed;
        top: 93%;
        margin-left: 39%;
        font-weight: bold;
        text-decoration: none;
        letter-spacing: 3px;
        font-size: 12px;
        text-transform: uppercase;
        color: white;
        font-family: Arial, Helvetica, sans-serif;   
    }    
    
    .container .cnt-btn {
        position: fixed;
        top: 93%;
        font-weight: bold;
        margin-left: 57.5%;
        letter-spacing: 3px;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 12px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* search bar */
.container .search-container {
    position: fixed;
    margin-left: 54%;
    margin-top: -100px;
}

.container input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.container .search-container button {
  position: fixed;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #773344;
  color: #f5e9e2;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.container.search-container button:hover {
  background: #e3b5a4;
}

@media screen and (max-width: 600px) {
  .container .search-container {
    float: none;
  }
  .container a, .container input[type=text], .container .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .container input[type=text] {
    border: 1px solid #000;  
  }
}

    .cart_div {
	float:right;
	font-weight:bold;
    position:absolute;
    top: 50px;
    right: 50px;
    }

.product_wrapper {
    border-radius: 25px;
    background-color: #f5e9e2;
    color: #0b0014;
    font-family: arial;
    letter-spacing: 1px;
    margin-bottom: 50px;
    margin-left: 40px;
    padding-top: 50px;
    padding-left: 20px;
    padding-right: 20px;
	text-align: center;
    height: 300px;
    font-size: 12px;
    width: 180px;
    height: 270px;
    text-align: justify;
    float: left;
    }
    
.product_wrapper:hover {
    transition: .2s ease;
    background: #0b0014;
    color: white;
	cursor:pointer;
    }
    

.product_wrapper .buy {
    text-transform: uppercase;
    font-weight: bold;
    font-size: 9px;
    letter-spacing: 1px;
    border-radius: 25px;
    font-family: arial;
    border: none;
    cursor: pointer;
    color: #f5e9e2;
    width: 100px;
    background-color: #773344;
    padding: 5px 5px;
    margin-top: 10px;
}

.product_wrapper .buy:hover {
    background: #f5e9e2;
    color: #773344;
    border-color: #773344;
}

.cart_div {
	float:right;
	font-weight:bold;
	position:fixed;
    margin-top: 30px;
    margin-right: 50px;
	}
.cart_div a {
	color:#000;
	}	
.cart_div span {
	font-size: 12px;
    line-height: 14px;
    background: #773344;
    padding: 2px;
    border: 2px solid #f5e9e2;
    border-radius: 50%;
    position: absolute;
    top: -1px;
    left: -5px;
    color: #fff;
    width: 14px;
    height: 13px;
    text-align: center;
	}
.cart .remove {
    background: none;
    border: none;
    color: #0067ab;
    cursor: pointer;
    padding: 0px;
	}
.cart .remove:hover {
	text-decoration:underline;
	}
  
.overlay {
  position: relative;
  opacity: 0;
  transition: .5s ease;
  background-color: #0b0014;
  margin: auto;
}

.the-container img {
    margin-top: -10px;
}

.the-container button {
    margin-left: auto;
    margin-right: auto;
    display: block;
}

.the-container:hover .overlay {
    top: -220px;
    margin: auto;
    display: block;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 30px;
    padding-bottom: 30px;
    text-align: justify;
    opacity: 1;
}

</style>
</head>

<body> 
    <div class="container">
    <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search book..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
    <h1 class="sidetext"><i> List of Latest Books </i></h1>
    <a class="home-btn" href="/bookbear/index.html">Home</a>
    <a class="abt-btn" href="/bookbear/about.html">About</a>
    <a class="inst-btn" href="/bookbear/howto.html">Instructions</a>
    <a class="cnt-btn" href="/bookbear/contact.html">Contacts</a>

    <h1 class="second-sidetext"><i> Read. Innovate. Excel. </i></h1>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="./images/book-count.png" style="width: 50px;"/> <br><span><?php echo $cart_count; ?></span></a>
</div>


<?php
}
$result = mysqli_query($connection,"SELECT * FROM `books`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='the-container'><div class='product_wrapper'>
			  <form method='post' action=''>
              <input type='hidden' name='id' value=".$row['id']." />
              <div class='Images'><img src ='".$row['Images']."' width=\"180\" height=\"240\" /></div>
            <div class='overlay'>		<
			  <div class='Title'> <font color=\"#e3b5a4\"><b> ".$row['Title']." </b></font> </div>
				 <div class='Author'> <font color=\"#f5e9e2\">".$row['Author']." </font></div>
				 <div class='Publisher'> <font color=\"#f5e9e2\">".$row['Publisher']."</font></div>
				 <div class='Availability'><font color=\"red\">".$row['Availability']."</font></div>
			  <button type='submit' class='buy'>Borrow!</button>
              </form>
              </div>
              </div>
		   	  </div>";
        }
mysqli_close($connection);
?>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
      </div>
      <script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
</body>
</html>