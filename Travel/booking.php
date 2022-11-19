<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanderlust-Login</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
        <div class="outer outerb">
            <div class ="topnav">
                <div class="topdiva">
                    <h3 class="tophead">Wanderlust</h3>
                </div>
                <div class="topdivb">
                    <button class="topbuts">
                        <a href="index.php">Home</a>
                    </button>
                    <?php 
                       session_start();
                       include ('conf.php');
                        

                        if(isset($_SESSION['is_logged_in'])){
                            echo '<button class="topbuts">
                                <a href="logout.php">Logout</a>
                            </button>';
                        } else{
                            echo "<button class='topbuts'>
                                    <a href='login.php'>Login</a>
                                </button>
                                <button class='topbuts'>
                                    <a href='signup.php'>Sign up</a>
                                </button>";
                        }
                    ?>
                    
                </div>
            </div>
            <div class="content">
                <div class="page">
                    <div class="login-head">
                        
                        <h3 class="head1">
                            Book a Hotel 
                        </h3>
                        
                    </div>
                        <?php
                       

                            if(!isset($_SESSION['is_logged_in'])){
                                $_SESSION['error'] = "You need to login to book a hotel";
                                header('Location: login.php');
                            }
                                
                        ?>
                    <div class="login-body">
                        <form action="book_hotel1.php" method="post">
                            <div class="form-div">
                                <div class="label-box"><label for="city" class="labels">Choose your City: </label></div>
                                <div class="form-box">
                                    <select name="city" id="city" required>
                                        <option value="">--- Select ---</option>  
                                        <?php
                                        $list = mysqli_query($conn, "SELECT DISTINCT city_name FROM hotel");
                                        while($row_list = mysqli_fetch_assoc($list)){
                                            echo '<option value="'.$row_list['city_name'].'">'.$row_list['city_name'].'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>       
                                <div class="label-box"><label for="hotel" class="labels">Choose your hotel: </label></div>
                                <div class="form-box">          
                                    <select name="hotel" id="hotel" required>   
                                        <option value="">--- Select ---</option> 
                                        <?php
                                        $list = mysqli_query($conn, "SELECT DISTINCT hotel_name FROM hotel");
                                        while($row_list = mysqli_fetch_assoc($list)){
                                            echo '<option value="'.$row_list['hotel_name'].'">'.$row_list['hotel_name'].'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>
                                <input type="submit" name="submit" id="submit">
                            </div>
                        </form>
                    </div>
                </div>   
            </div> 
        </div>
        
</body>
</html>