function moveSlide(direction)
{
	{
		var currentImg=$('.current');
		var nextImg = currentImg.next();
		var prevImg = currentImg.prev();
		if(direction =='next')
		{
			if(nextImg.length)
			{
				nextImg.addClass('current');
			}
			else
			{
				$('.carousel img').first().addClass('current');
			}
		}
		else
		{
			if(prevImg.length)
			{
				prevImg.addClass('current');
			}
			else
			{
				$('.carousel img').last().addClass('current');
			}
		}
				currentImg.removeClass('current');
	}

		var currentText=$('.now');
		var nextText = currentText.next();
		var prevText = currentText.prev();
		if(direction =='next')
		{
			if(nextText.length)
			{
				nextText.addClass('now');
			}
			else
			{
				$('.detail').first().addClass('now');
			}
		}
		else
		{
			if(prevText.length)
			{
				prevText.addClass('now');
			}
			else
			{
				$('.detail').last().addClass('now');
			}
		}
				currentText.removeClass('now');


}