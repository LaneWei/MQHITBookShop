<?php
    session_start();

    $servername = "*";
    $dbUsername = "*";
    $dbPassword = "*";
    $database = "*";
    
    $conn = mysqli_connect($servername,$dbUsername,$dbPassword);
    mysqli_select_db($conn,$database);

    $sql = "select * from BOOK";
    $result = $conn->query($sql);

?>



<html>

<head>
	<title>MQ-HIT BookShop</title>
	<meta charset="utf-8"/>

    <style type="text/css">
        div.page-bg {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        div.page-body {
            width: 80%;
            margin: 40px auto auto auto;
            padding: 0;
        }

        div.shop-title {
            margin-top: 10px;
            margin-bottom: 50px;
        }

        div.shop-body {
            margin: auto;
            padding: 25px 0;
        }

		div.book {
			padding: 7px;
		}
		
		div.book-heading {
			height: 30px;
			margin: 0;
			padding: 0;
		}
		div.book-title {
			float: left;
			font-family: Georgia, serif;
			font-style:italic;
			font-size: 115%;
			font-weight: bold;
		}
		
		div.book-unit {
			text-align: right;
			font-style: normal;
			font-size: 85%;
			margin-bottom: 10px;
		}
		
		div.book-picture {
			float: left;
			width: 150px;
			height: 150px;
		}

		div.book-information-body {
			padding-left: 225px;
		}
		
		div.book-information-line {
			text-align: left;
			height: 30;
		}
		
		div.book-price {
			text-align: right;
			font-size:130%;
			font-weight: bold;
		}
		
		span.information-type {
			font-weight: bold;
		}
		
		img {
			width: 175px;
			height: 175px;
		}
		
        .shop-title {
            text-align: left;
            margin: 0;
        }

        .book-list {
			margin: 0 0 0 4px;
			padding: 0;
            list-style-type: none;
        }
		
		li.book-item {
			border-bottom-style: double;
			margin: 20px 10px;
			padding: 5px;
		}
    </style>
</head>




<body>
    <?php
        if(isset($_SESSION['testUS'])){
    ?>
    <div id="page-heading">
        <div style="float: left">
            <b>COMP344</b><br/>
            <b>&nbsp;&nbsp;group1</b><br/>
        </div>
        

        
        <div id="log-out" style="margin-bottom: 20px">  
            <h3 align="right"><?php echo $_SESSION['testUS'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="log-out.php">log out</a></h3>
        </div>
    </div>

	<div class="page-bg">
		<div class="page-body">
			<div class="shop-title">
                <h1 align="center">MQ-HIT Online BookShop</h1>
			</div>
			<div class="shop-body">
                <div class="book-list-body">
                    <ul class="book-list">
                        <?php
                        while($arr = mysqli_fetch_row($result)){
                        ?>
                        <li id="book_01" class="book-item">
                            <div class="book">
                                <div class="book-heading">
                                    <div class="book-title">
                                        <?php echo $arr[1] ?>
                                    </div>
                                    <div class="book-unit">
                                        [<?php echo $arr[7]?>]
                                    </div>
                                </div>
                                <div class="book-body">
                                    <div class="book-picture">
										<img src="<?php echo $arr[8] ?>" alt="A book">
                                    </div>
                                    <div class="book-information-body">
										<div class="book-information">
                                            <div class="book-information-line" id="book_01_authors">
                                                <span class="information-type">Authors:</span>
                                                <span class="information"><?php echo $arr[2]?></span>
                                            </div>
                                            <div class="book-information-line" id="book_01_pages">
                                                <span class="information-type">Pages:</span>
                                                <span class="information"><?php echo $arr[3]?></span>
                                            </div>
                                            <div class="book-information-line" id="book_01_publisher">
                                                <span class="information-type">Publisher:</span>
                                                <span class="information"><?php echo $arr[4]?></span>
                                            </div>
                                            <div class="book-information-line" id="book_01_ISBN-13">
                                                <span class="information-type">ISBN-13:</span>
                                                <span class="information"><?php echo $arr[0] ?></span>
                                            </div>
                                            <div class="book-information-line" id="book_01_yearOfPublish">
                                                <span class="information-type">Year of Publish:</span>
                                                <span class="information"><?php echo $arr[5] ?></span>
                                            </div>
                                            <div class="book-price" id="book_02_price">
                                                <span class="information">$<?php echo $arr[6] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
						
                    </ul>
                </div>
			</div>
		</div>
    </div>
    <?php
        }else {
            echo "Please log in!";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=log-in.html">';
        }
    ?>
</body>

</html>
