<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System - Login</title>
	<style type="text/css">
	    body
	    {
		    background-color: #CCCCFF;
	    }
        .top
        {
            background-color: #1E90FF;
        }
        .btn1
        {
            width: 100px;
            border: 10px;
            padding: 10px;
			background-color: antiquewhite;
			margin: 10px;
            border-radius: 5px;
			color: black;
			font-weight: bold;
			cursor: pointer;
        }
        .one
        {
            font-size: 20px;
            color: darkblue;
        }
        input
		{
			height: 30px;
			width: 20%;
			padding-left: 20px;
		}
        textarea
        {
            height: 30px;
			width: 64%;
			padding-left: 20px;
        }
	</style>
</head>
<body>
<center>
    <div class="top">
        <a href="home.php"><button class="btn1">Home</button></a>
        <a href="contact.php"><button class="btn1">Contact</button></a>
        <a href="index.php"><button class="btn1">Login</button></a>
    </div>
</center>
<div>
		<div>
			<div class="one">
				<h2>CONTACT US</h2>
			</div>
			<div>
				<h3>MISCELLANEOUS INFORMATION :</h3>
				<p>We are always happy to help you....</p>
			</div>
			<div>
				<div>
					<h3>ADDRESS :</h3>
                           Civil lines<br>Prayagraj
				</div>
				<div>
					<h3>CONTACT NO :</h3>
					9234566789
				</div>
				<div>
					<h3>EMAIL :</h3>
					<a href="mailto:example@mail.com">thulasi@gmail.com</a>
				</div>
			</div>		
			<div>
				<h3>CONTACT FORM</h3>
				<form>
					<input type="text" placeholder="Name" required="">
					<input type="email" placeholder="Email" required="">
					<input type="text" placeholder="Telephone" required=""><br><br>
					<textarea type="text" required="" placeholder="Message..."></textarea>
					<button class="btn1">Submit</button>
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
