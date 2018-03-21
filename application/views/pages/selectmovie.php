<title>Select Movie</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/bootstrap-social.css">

    <link rel="stylesheet" href="./css/<?php echo $title; ?>.css">
</head>
<body>
    <!-- <div class="container">
        <div class="row">
			<div class="col-xs-12 match">
				<img class="img-responsive" src="./img/select-movie.jpeg" alt="Match image">
            </div>
        </div>
    </div> -->
    <!--**************************************************************
    SELECT IMG
    ***************************************************************-->
    <div class="clearfix">
        <button class="select"> </button>
        <h1>select your photo</h1>
        <button class="send " data-counter="0">✔</button>
    </div>
    <ul>
        <li><img src="https://farm8.staticflickr.com/7326/11287113923_57d37ed9d3_q.jpg" /></li>
        <li><img src="https://farm9.staticflickr.com/8184/8095683964_9e27753908_q.jpg" /></li>
        <li><img src="https://farm9.staticflickr.com/8171/8018956825_67bf62c098_q.jpg" /></li>
        <li><img src="https://farm9.staticflickr.com/8425/7587724752_cdb9f0c444_q.jpg" /></li>
        <li><img src="https://farm8.staticflickr.com/7248/7587738254_707a32f27b_q.jpg" /></li>
        <li><img src="https://farm9.staticflickr.com/8191/8095680852_893f685cbd_q.jpg" /></li>
        <li><img src="https://farm9.staticflickr.com/8460/8018953043_c6ef9e3b29_q.jpg" /></li>
        <li><img src="https://farm9.staticflickr.com/8026/7445019824_914dea4ac3_q.jpg" /></li>
        <li><img src="https://farm8.staticflickr.com/7088/7332137562_14956827a7_q.jpg" /></li>
        <li><img src="https://farm8.staticflickr.com/7108/7151306497_9cfb1a367b_q.jpg" /></li>
        <li><img src="https://farm6.staticflickr.com/5198/7005209880_432389ef25_q.jpg" /></li>
        <li><img src="https://farm8.staticflickr.com/7280/7151302883_e6ef32f04d_q.jpg" /></li>
    </ul>


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!--**************************************************************
    DEVLEOPMENT BUTTONS TO DELETE
    ***************************************************************-->
    <form action="<?php echo base_url(); ?>/profile">
        <input type="submit" value="Profile" />
    </form>
    <form action="<?php echo base_url(); ?>/home">
        <input type="submit" value="Home" />
    </form>
    <script src="./js/<?php echo $title; ?>.js"></script>