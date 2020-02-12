<?php
?>
<html>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins');
    @import url('https://fonts.googleapis.com/css?family=Orbitron&display=swap');

    body {
        font-family: "Poppins", sans-serif;
        height: 100vh;
        background: blue;
        background-size: 50%;
    }

    a {
        display: inline-block;
        text-decoration: none;
        font-weight: 400;
    }

    h2 {
        text-align: center;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
        margin: 40px 8px 10px 8px;
        color: #cccccc;
    }

    .wrapper {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        min-height: 100%;
        padding: 20px;
    }

    #formContent {
        background: black;
        padding: 30px;
        width: 90%;
        max-width: 450px;
        position: relative;
        box-shadow: 0 45px 60px 0 rgba(0, 0, 0, 0.3);
        text-align: center;
        margin-left: 40%;
        margin-bottom: 5%;
    }

    h2.inactive {
        color: deeppink;
        font-family: 'Orbitron', sans-serif;
    }

    h2.active {
        color: yellow;
        border-bottom: 2px solid greenyellow;
        font-family: 'Orbitron', sans-serif;;
    }

    input[type=button], input[type=submit], input[type=reset] {
        background-color: blue;
        border: none;
        color: black;
        padding: 15px 80px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        text-transform: uppercase;
        font-size: 13px;
        border: 2px solid greenyellow;
        width: 85%;
    }

    input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover {
        background-color: blue;
    }

    input[type=text] {
        background-color: blue;
        color: #0d0d0d;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        width: 85%;
        border: 2px solid greenyellow;
        fon
    }

    input[type=password] {
        background-color: blue;
        color: #0d0d0d;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        width: 85%;
        border: 2px solid greenyellow;
        fon
    }

    input[type=email] {
        background-color: blue;
        color: #0d0d0d;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        width: 85%;
        border: 2px solid greenyellow;
        fon
    }

    input[type=text]:focus {
        background-color: blue;
        border-bottom: 3px solid yellowgreen;
    }

    ​</style>
<div id="formContent">
    <a href="/signin"><h2 class="inactive underlineHover"> Sign In </h2></a>
    <h2 class="active"> Sign Up </h2>
    <div class="fadeIn first">
        <img style="width: 377px; border-radius: 5px 5px 5px 5px;" src="images/profile.png" id="icon" alt="User Icon"/>
    </div>
    ​
    <form method="post" action="checkCode">
        <input type="text" id="code" class="fadeIn second" name="code">
        <input pattern="" type="submit" class="fadeIn fourth" value="CONFIRM">
    </form>
</div>
</html>
