const items = document.querySelectorAll('.build div ul li');

items.forEach(item => {
    const information = item.querySelector('.information');
    
    item.addEventListener('mousemove', function(event) {
        information.classList.add('active');
        
        const cursorX = event.pageX,
              cursorY = event.pageY;
        
        const itemLeft = item.getBoundingClientRect().left,
              itemTop = item.getBoundingClientRect().top;
        
        const informationPositionX = cursorX - itemLeft,
              informationPositionY = cursorY - itemTop - window.scrollY;
        
		if(information.offsetWidth + 400 < event.clientX){
			information.style.left = `${informationPositionX - information.offsetWidth + 20}px`;
		   
		   }
		else{
			information.style.left = `${informationPositionX + 20}px`;
		}
        
        information.style.top = `${informationPositionY + 20}px`;
    });
    
    item.addEventListener('mouseout', () => {
        information.classList.remove('active')
    });
});

let imgBtn = document.querySelector('.imgBtn')
let video = document.querySelector('.video')

imgBtn.onclick = function() {
    imgBtn.classList.toggle('active')
    video.classList.toggle('hidden')
}