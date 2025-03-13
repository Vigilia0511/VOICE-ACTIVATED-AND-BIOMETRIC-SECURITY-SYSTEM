<?php  
    session_start();
    require "include/connect.php"
?>
<center>
    <link rel="stylesheet" href="include/style.css">
    <form method="POST" action="verifysignup.php">
        <div class="container">
            <h1>REGISTER</h1>
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
                <tr>
                    <td>
                        <label for="lname">LAST NAME:</label>
                    </td>
                    <td>
                        <input type="text" name="lname" id="lname" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fname">FIRST NAME:</label>
                    </td>
                    <td>
                        <input type="text" name="fname" id="fname" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mname">MIDDLE NAME:</label>
                    </td>
                    <td>
                        <input type="text" name="mname" id="mname" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="sex">SEX</label>
                    </td>
                    <td>
                        <select name="sex" id="sex">
                        <option value="" readonly disabled selected required>
							Please select one....
						</option>
                            <option value="Male">MALE</option>
                            <option value="Female">FEMALE</option>
                        </select>
                    </td>
                </tr>
                <th colspan="2">
                    <button type="submit" name="sub" id="sub">SUBMIT</button>
                </th>
                
            </table>
            <h4>Already have an account? <a href="index.php">LOGIN</a></h4>
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