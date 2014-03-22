<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300,400,700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .welcome {
           width: 300px;
           height: 300px;
           position: absolute;
           left: 50%;
           top: 50%; 
           margin-left: -150px;
           margin-top: -150px;
        }

        a, a:visited {
            color:#FF5949;
            text-decoration:none;
        }

        a:hover {
            text-decoration:underline;
        }

        ul li {
            display:inline;
            margin:0 1.2em;
        }

        p {
            margin:2em 0;
            color:#555;
        }
    </style>
</head>
<body>
    <div class="welcome">
        <h1>{{{ ucwords('YoU have arrived.') }}}</h1>
    </div>

    <?php for($z=0;$z<6;$z++){ ?>
    
    <marquee scrollamount="<?php echo mt_rand(1, 3); ?>" direction="down">
    <?php 
    $x = array(); 
    for($y=0;$y<45;$y++)
        //$z = mt_rand(0, 1);
    {   $x[$y] = mt_rand(0, 1); };
    echo ' ';
    foreach($x as $xkey => $xvalue)
    {   echo $xvalue; echo ' '; } ;
    
    ?>
    
    </marquee>
<?php   
    echo "<br/><br/>"; 
    }   ?>

    <div align="center">
    <h3>Matrix Redesigned by <i>Arunkumar Gudelli</i></h3>
    <canvas id="q" width="500" height="500">Sorry Browser Won't Support</canvas><br/><br/>
    <button id="play">Play</button>
    <button id="pause">pause</button>
    </div>
    <script>
    $(document).ready(function(){
        var s=window.screen;
        var width = q.width=s.width;
        var height = q.height;
        var yPositions = Array(300).join(0).split('');
        var ctx=q.getContext('2d');
         
        var draw = function () {
          ctx.fillStyle='rgba(0,0,0,.05)';
          ctx.fillRect(0,0,width,height);
          ctx.fillStyle='#0F0';
          ctx.font = '10pt Georgia';
          yPositions.map(function(y, index){
            text = String.fromCharCode(1e2+Math.random()*33);
            x = (index * 10)+10;
            q.getContext('2d').fillText(text, x, y);
            if(y > 100 + Math.random()*1e4)
            {
              yPositions[index]=0;
            }
            else
            {
              yPositions[index] = y + 10;
            }
          });
        };
        RunMatrix();
        function RunMatrix()
        {
        if(typeof Game_Interval != "undefined") clearInterval(Game_Interval);
                Game_Interval = setInterval(draw, 33);
        }
        function StopMatrix()
        {
        clearInterval(Game_Interval);
        }
        //setInterval(draw, 33);
        $("button#pause").click(function(){
        StopMatrix();});
        $("button#play").click(function(){RunMatrix();});
         
    })
    </script>
</body>
</html>
