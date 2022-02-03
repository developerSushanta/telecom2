
		function changeSlide(direction)
		{
			var currentImg=$('.active');
			var nextImg = currentImg.next();
			var prevImg = currentImg.prev();
			if(direction =='next')
			{
				if(nextImg.length)
				{
					nextImg.addClass('active');
				}
				else
				{
					$('.banner img').first().addClass('active');
				}
			}
			else
			{
				if(prevImg.length)
				{
					prevImg.addClass('active');
				}
				else
				{
					$('.banner img').last().addClass('active');
				}
			}
					currentImg.removeClass('active');
		}

		var timer= null;
		function setTimer()
		{
			timer = setInterval(function()
			{
				changeSlide('next');
			},5000)
		}
		setTimer();



// for TEST Part
