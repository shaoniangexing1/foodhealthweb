function move() {             /*title流动*/
    var head1=document.title;
    head2=head1.substring(0,1)
    head3=head1.substring(1,head1.length)
    document.title=head3+head2
}
setInterval(move,300);