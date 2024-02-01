<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Website</title>

  <style>
    /* Reset some default styles */
    body {
      background-image: url('danger.png');
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .background {
     
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .navigation {
      background-color: gray;
      padding: 10px;
      text-align: center;
      margin-top: 40px; /* Add margin to the top to move the navigation down */
    }

    .navigation ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .navigation li {
      display: inline;
      margin: 0 20px;
    }

    .navigation ul li {
      margin-bottom: 20px;
    }

    .navigation a {
      text-decoration: none;
      color: white;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .navigation a:hover {
      background-color: #555;
    }

    .footer {
      background-color: red;
      color: white;
      padding: 20px 0;
      text-align: center;
      margin-top: 240px;
    }

    .footer p {
      font-size: 16px;
    }

    h1, h2 {
      color: white;
      text-align: center;
      position: absolute;
      animation-duration: 10s; /* Make the animation slower (you can adjust this value) */
      animation-timing-function: linear;
      animation-iteration-count: infinite;
	  font-size:48px;
    }

    .animation-h1 {
      animation-name: moveLeft;
    }

    .animation-h2 {
      animation-name: moveRight;
    }

    @keyframes moveLeft {
      0% { left: 100%; }
      100% { left: 0; }
    }

    @keyframes moveRight {
      0% { right: 100%; }
      100% { right: 0; }
    }
	/* Your existing CSS styles (as previously defined) */

.hidden-image {
  display: none;
  text-align: center;
  padding: 20px;
  background-color: white;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999; /* Ensure the image pops up above other content */
}

.hidden-image img {
  max-width: 100%;
  max-height: 100%;
}

.show-image {
  display: block;
}
 .hidden-image {
      display: none;
      text-align: center;
      
      background-color: white;
      position: absolute;
      top: 48%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 999; /* Ensure the image pops up above other content */
    }

    .hidden-image img {
      max-width: 100%;
      max-height: 100%;
    }

    .show-image {
      display: block;
    }
  </style>
</head>
<body>
  <nav class="navigation">
    <ul>
      <li><a href="mall.php" onclick="showPage('home')">Home</a></li>
      <li><a href="login.php" onclick="showPage('services')">Admin</a></li>
      <li><a href="glam.php" onclick="showPage('services')">Services</a></li>
      <li><a href="booking.php" onclick="showPage('booking')">Booking</a></li>
      <li><a href="contact.php" onclick="showPage('contact')">Contact</a></li>
    </ul>
  </nav>
  <h1 class="animation-h1">Glam and Gloss</h1><br><br><br>
  <h2 class="animation-h2">Beauty Palor</h2>
  
   <div class="hidden-image" id="image-popup">
    <img src="boxnude.png" alt="boxnude" width="300">
  </div>
  
  <script>
<!-- Your existing HTML and CSS -->


const imagePopup = document.getElementById('image-popup');
    const h1 = document.querySelector('.animation-h1');
    const h2 = document.querySelector('.animation-h2');

    h1.addEventListener('animationiteration', function() {
      // Show the image after the text animation finishes
      imagePopup.classList.add('show-image');
    });

    // Remove the animation class after a certain duration
    setTimeout(function () {
      h1.classList.remove('animation-h1');
      h2.classList.remove('animation-h2');
    }, 10000);
</script>

</script>
</body>
</html>
