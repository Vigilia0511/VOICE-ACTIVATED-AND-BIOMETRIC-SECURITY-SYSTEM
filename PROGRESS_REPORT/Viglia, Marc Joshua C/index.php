<?php  
    session_start();
    require "include/connect.php";
?>
<center>
    <link rel="stylesheet" href="include/style.css">
    <form method="POST" action="verifyindex.php">
        <div class="container">
            <h1>LOGIN</h1>
            <table>
                <tr>
                    <td>
                        <label for="username">USERNAME</label>
                    </td>
                    <td>
                        <input type="text" name="username" id="username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">PASSWORD</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" required>
                    </td>
                </tr>
                <th colspan="2">
                    <button type="submit" name="sub" id="sub">SUBMIT</button>
                </th>
                
            </table>
            <h4>Don't have an account? <a href="signup.php">SIGNUP</a></h4>
        </div>
        <br>
            <?php if(isset($_SESSION['msg'])){
                ?>
                    <span id="msg"><?php echo ($_SESSION['msg']); unset($_SESSION['msg']);?></span>
                <?php
            } ?>
             <?php if(isset($_SESSION['msg1'])){
                ?>
                    <span id="msg1"><?php echo ($_SESSION['msg1']); unset($_SESSION['msg1']);?></span>
                <?php
            } ?>
    </form>
</center>