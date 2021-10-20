<html>

<head>
    <title>Title at Masterpage</title>
</head>

<body>

    <div id="menu">
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact.php">Contact Us</a>
    </div>

    <div><?php echo $content; ?></div>

    <div id="footer">Footer to be repeated at all pages</div>

</body>

</html>