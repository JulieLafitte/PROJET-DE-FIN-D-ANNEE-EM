/**
 * Reveal
 */

 const revealElements = document.querySelectorAll('.reveal')
 const revealItems = []

 const scrollY=window.scrollY;

 for (const _element of revealElements)
 {
     const item = {}
     item.revealed = false
     item.element=_element;
     
     const bounding = _element.getBoundingClientRect();
     item.top = bounding.top + scrollY;
     item.height = bounding.height

     revealItems.push(item)
 }


window.addEventListener('scroll', () =>
{
    for(const _item of revealItems)
    {
        if(_item.revealed == false && window.scrollY +window.innerHeight > _item.top )
        {
            _item.revealed = true
            _item.element.classList.add('revealed')
        }
    }
})