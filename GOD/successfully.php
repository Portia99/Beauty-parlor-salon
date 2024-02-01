<!DOCTYPE html>
<html>
<head>
    <style>
	body{
	background-image: url('home.jpg');
	}
        /* Container styles */
        .running-text-container {
            width: 100%;
            overflow: hidden;
        }

        /* Running text styles */
        .running-text {
            white-space: nowrap;
            animation: scrollText 10s linear infinite;
            font-size: 40px; /* Increase the font size for clarity */
            color: white; /* Set purple color */
        }

        @keyframes scrollText {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body>
    <div class="running-text-container">
        <div class="running-text">
            <p>Thank you for Booking with Glam and Gloss Beauty Parlor</p>
        </div>
    </div>
</body>
</html>
