/**
 * Created by user_2 on 4/7/2017.
 */
$(function(){

    var myDraggable = Draggable.create("#UseLeave", {
        type:"",
        bounds:"#container",
        edgeResistance:0.5,
        throwProps:true
    });

    //console.log(myDraggable[0]);
    //console.log(myDraggable[0]._eventTarget.onselectstart !== null);
});