
function move() {             /*title流动*/
    var head1=document.title;
    head2=head1.substring(0,1)
    head3=head1.substring(1,head1.length)
    document.title=head3+head2
}
setInterval(move,300);
window.onload=function () {
    var carimg = document.querySelector('#carimg')
    console.log(conrightimg)
    var imgxiall = document.getElementsByClassName('imgxia')
    var carimgall = ['image/运动2.jpg', 'image/蔬菜.jpg', 'image/运动.jpg', 'image/美食2.jpg', 'image/健康美食.jpg']
    console.log(carimgall)
    i = 0

    function clearcar() {   /*清楚小图标样式*/
        for (var j = 0; j < 5; j++) {
            imgxiall[j].style.backgroundColor = '#01f129'
        }
    }

    function carimgf() {   /*自动轮播*/
        clearcar()
        if (i < 5) {
            imgxiall[i].style.backgroundColor = 'red'
            carimg.src = carimgall[i]
            i++;
        } else
            i = 0
    }

    timer = setInterval(carimgf, 1000);

    for (i = 0; i < imgxiall.length; i++)             /*手动轮播*/
    {
        imgxiall[i].index = i
        imgxiall[i].onmouseover = function () {
            clearInterval(timer)
            clearcar()
            this.style.backgroundColor = 'red'
            carimg.src = carimgall[this.index]
        }
        imgxiall[i].onmouseout = function () {
            timer = setInterval(carimgf, 1000)
            this.style.backgroundColor = '#01f129'
        }
    }
}