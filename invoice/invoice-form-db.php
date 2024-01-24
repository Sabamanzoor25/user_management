<?php
include("../pages/Db/config.php");
?>
<html>
	<head>
		<title>Invoice generator</title>
	</head>
	<body>
		select invoice:
		<form method='post' action='invoice-db.php'>
            <input list="browsers" name="invoiceID" >
            <datalist id="browsers">
                <?php
                //show invoices list as options
                $sql = "SELECT * FROM book ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option name='bid' value='".$row['b_id']."'>".$row['b_id']."</option>";
                    }
                }
                ?>
            </datalist>

			<select name='invoiceID'>
				<?php
					//show invoices list as options
                $sql = "SELECT * FROM book ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option name='bid' value='".$row['b_id']."'>".$row['b_id']."</option>";
                    }
                }
				?>
			</select>
			<input type='submit' name="Generate" value='Generate'>
		</form>
	</body>
</html>
