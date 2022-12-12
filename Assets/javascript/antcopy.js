function disableselect(e)
{
return false
}
function reEnable()
{
return true
}
document.onselectstart=new Function ("return false")

if (window.sidebar)
{
document.onmousedown=disableselect
document.onclick=reEnable
}
document.oncontextmenu = function(){return false}
