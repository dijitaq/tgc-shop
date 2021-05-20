function animation() {
    var canvas = document.getElementById( "dot-animation" ),
        ctx = canvas.getContext( '2d' );

    canvas.width = canvas.clientWidth;
        canvas.height = canvas.clientHeight;

        var nStars, minRadius, radius, maxRadius;

    var starsArr = [], // Array that contains the stars
        FPS = 60, // Frames per second
            mouse = {
                x: 0,
                y: 0
                };  // mouse location

    var centerX = canvas.width / 2;
    var centerY = canvas.height / 2;

    if (canvas.height < 500) {
        nStars = 60;
        minRadius = canvas.height * 0.3;
        radius = canvas.height * 0.4;
        maxRadius = canvas.height * 0.5;

    } else {
        nStars = 80;
        minRadius = canvas.height * 0.15;
        radius = canvas.height * 0.25;
        maxRadius = canvas.height * 0.45;
    }

    var diffRadius = maxRadius - radius;

    // Push stars to array

    for (var i = 0; i < nStars; i++) {
            var angle = Math.random() * Math.PI * 2;

            if ( i < ( nStars * 0.4 )) {
                starsArr.push({
                        x: ( Math.cos( angle ) * radius ) + centerX,
                        y: ( Math.sin( angle ) * radius ) + centerY,
                    });

                } else {

                    starsArr.push({
                                x: ( Math.cos( angle ) * ( radius + ( Math.random() * diffRadius ) ) ) + centerX,
                                y: ( Math.sin( angle ) * ( radius + ( Math.random() * diffRadius ) ) ) + centerY,
                                vx: Math.floor( Math.random() * 50 ) - 25,
                                vy: Math.floor( Math.random() * 50 ) - 25
                        });
                }
        }

    // Draw the scene

    function draw() {
            ctx.clearRect( 0 ,0, canvas.width, canvas.height );
          
            ctx.globalCompositeOperation = "lighter";
          
            for (var i = 0, x = starsArr.length; i < x; i++) {
                        var s = starsArr[i];
              
                        ctx.fillStyle = "#fff";
                        ctx.beginPath();
                        ctx.arc(s.x, s.y, 3, 0, 2 * Math.PI);
                        ctx.fill();
                        ctx.fillStyle = "#fff";
                        ctx.stroke();
                }
          
            ctx.beginPath();

            for (var i = 0, x = starsArr.length; i < x; i++) {
                        var starI = starsArr[i];
                
                        ctx.moveTo( starI.x,starI.y ); 
                        
                        if ( distance( mouse, starI ) < 150 ) ctx.lineTo( mouse.x, mouse.y );

                        for ( var j = 0, x = starsArr.length; j < x; j++ ) {
                            var starII = starsArr[j];
                            
                            if (distance(starI, starII) < 150) {
                                        //ctx.globalAlpha = (1 / 150 * distance(starI, starII).toFixed(1));
                                        ctx.lineTo(starII.x,starII.y);
                                    }
                        }
                }

            ctx.lineWidth = 0.1;
            ctx.strokeStyle = "#fff";
            ctx.stroke();
        }

    function distance( point1, point2 ) {
            var xs = 0;
            var ys = 0;
         
            xs = point2.x - point1.x;
            xs = xs * xs;
         
            ys = point2.y - point1.y;
            ys = ys * ys;
         
            return Math.sqrt( xs + ys );
        }

    // Update star locations

    function update() {
            var dist, s;

            for ( var i = 0, x = starsArr.length; i < x; i++ ) {
                    s = starsArr[i];
          
                if (i >= ( nStars * 0.4 )) {
                            s.x += s.vx / FPS;
                            s.y += s.vy / FPS;

                            var distX = s.x - centerX;
                            var distY = s.y - centerY;

                        dist = Math.sqrt( (distX * distX) + ( distY * distY ) );

                    }
                    //console.log( dist );

                    if (i >= ( nStars * 0.4 ) && i < ( nStars * 0.5 )) {
                            if ( dist < minRadius || dist > maxRadius ) {
                                    s.vx = -s.vx;
                                    s.vy = -s.vy;
                                }

                    } else if (i >= ( nStars * 0.5 )) {
                        if (dist > maxRadius ) {
                                    s.vx = -s.vx;
                                    s.vy = -s.vy;
                                }
                    }

                    //if (s.x < 0 || s.x > canvas.width) s.vx = -s.vx;
                    //if (s.y < 0 || s.y > canvas.height) s.vy = -s.vy;
            }
        }

    canvas.addEventListener('mousemove', function(e){
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });

    // Update and draw

    function tick() {
            draw();
            update();
            requestAnimationFrame(tick);
        }

    tick();
}