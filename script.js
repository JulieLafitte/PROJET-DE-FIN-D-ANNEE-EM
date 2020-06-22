/**
 * Nav color animation
 */

$(".nav-link").hover(function(){
    $('.nav-link').css("color", "grey");
    $(this).css("color","white");
},function(){
    $('.nav-link').css("color","white");
});

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

/**
 * Insta feed
 */


/**
 * Shop Carousel
 */

$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if(bodyWidth<768){
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }else {
                incno = itemsSplit[3];
                 itemWidth = sampwidth / incno;
            }

            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
           

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
          
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
       

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
               
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});