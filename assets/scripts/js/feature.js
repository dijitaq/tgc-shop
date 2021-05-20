function feature()
{
	var canvases = document.getElementsByClassName( 'canvas-feature' );
	var imgdata;

	var contexts = [];
		
		for( var i = 0; i < canvases.length; i++ ) {
			contexts[i] = canvases[i].getContext( '2d' );  //initialize each canvas with context.
		}

		function drawToCanvas() {
				// Do your drawing on canvases[1];
				canvases[1].width = canvases[1].clientWidth;
				canvases[1].height = canvases[1].clientHeight;
				contexts[1].beginPath();
				contexts[1].strokeStyle = "#E85A4F";

				if (Foundation.MediaQuery.upTo('small')) {
				 	contexts[1].moveTo(40, 80);
					contexts[1].lineTo(40, 0);
				
				} else if (Foundation.MediaQuery.atLeast('medium')) {
				 	contexts[1].moveTo(16, 80);
					contexts[1].lineTo(64, 0);
				}

				contexts[1].stroke();

				paintToAllContexts();
		}

	function paintToAllContexts() {
				for( var i = 2; i < canvases.length; i++ ) {
					canvases[i].width = canvases[i].clientWidth;
					canvases[i].height = canvases[i].clientHeight;
					contexts[i].drawImage( canvases[1], 0, 0 );
				}

				canvases[0].width = canvases[1].clientWidth / 2;
				canvases[0].height = canvases[1].clientHeight / 2;
				contexts[0].beginPath();
				contexts[0].strokeStyle = "#E85A4F";
				
				if (Foundation.MediaQuery.upTo('small')) {
				 	contexts[0].moveTo(40, 40);
				 	contexts[0].lineTo(40, 0);
				 	contexts[0].lineTo(80, 0);

				
				} else if (Foundation.MediaQuery.atLeast('medium')) {
				 	contexts[0].moveTo(16, 40);
				 	contexts[0].lineTo(40, 0);
				 	contexts[0].lineTo(80, 0);

				}

				contexts[0].stroke();
		}
}