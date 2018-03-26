var drinks = ['zero','one','two','three','four','five','six','seven'],
    prev = -1;

			$(document).ready(function() {
				$('#arm').click(function(e) {
					var arm = $(this).addClass('clicked'),
						delay = setTimeout(function() { arm.removeClass('clicked') }, 500);
					e.preventDefault();
					spin();
				});
			});
			function spin() {
				do {
					index = Math.floor(Math.random()*drinks.length);
				} while (index == prev);
				var equation = $('#equation').removeClass("done").removeClass(drinks[prev]).addClass(drinks[index]),
					timeout = setTimeout(function() { equation.addClass('done') },3000);
        		prev = index;
        		console.log("Before S" + prev);
        		setTimeout(function(){
        			console.log("In S"+prev);
        			switch(prev){
						case 0: {window.top.location.href = '../assets/games/hextris/index.html'; break;}
						case 1: {window.top.location.href = '../assets/games/missile/index.html'; break;}
						case 2: {window.top.location.href = '../assets/games/circles/index.html'; break;}
						case 3: {window.top.location.href = '../assets/games/hextris/index.html'; break;}
						case 4: {window.top.location.href = '../assets/games/missile/index.html'; break;}
						case 5: {window.top.location.href = '../assets/games/circles/index.html'; break;}
						case 6: {window.top.location.href = '../assets/games/hextris/index.html'; break;}
						case 7: {window.top.location.href = '../assets/games/missile/index.html'; break;}
					}	
        		},6000);
        		
						
			}