/*
https://developer.mozilla.org/en-US/docs/Web/Events
https://www.cambiaresearch.com/articles/15/javascript-char-codes-key-codes
*/

/*var b1 = document.getElementsByTagName("button")[0];

b1.addEventListener("mouseenter",function () {
    console.log("mouse entered !")
})*/


var button = document.getElementById("enter");
var input = document.getElementById("user-input");
var ul = document.getElementsByTagName("ul")[0];
var listItems = document.getElementsByTagName("li");
var delteButton= document.getElementsByClassName("del");
/*console.log(button);*/


button.addEventListener("click",addItemAfterClick);
/*{
    /!*console.log("mouse clicked");*!/
    if(input.value.length > 0) {
        var li = document.createElement("li");
        li.append(document.createTextNode(input.value));
        ul.append(li);
        input.value = '';
    }

});*/

input.addEventListener("keypress",addItemAfterPress);
    /*console.log(e);
    if(input.value.length > 0 && e.which ===13) {
      /!*  var li = document.createElement("li");
        li.append(document.createTextNode(input.value));
        ul.append(li);
        input.value = '';*!/
      createListItem();
    }*/

function inputLength(){
    if(input.value.length > 0)
        return true;
    return false;
}

function createListItem(){
      var li = document.createElement("li");
      var btn = document.createElement("button");

        li.append(document.createTextNode(input.value));
        btn.append(document.createTextNode("Delete"));
        btn.classList.add("del");
        li.append(btn);
        ul.append(li);
        input.value = '';
        addDeleteListener();
        addDoneListener();

}

function addItemAfterClick() {
    if(inputLength()){
        createListItem();
    }
}

function addItemAfterPress(e) {
    if(input.value.length > 0 && e.which ===13) {
        createListItem();
    }
}

function deleteItem() {
    this.parentElement.remove();
}

function isDone() {
    this.classList.toggle("done");
}

/*for(var i=0; i<listItems.length; i++){
    listItems[i].addEventListener("click",isDone);
}

for(var i=0; i<delteButton.length; i++){
    delteButton[i].addEventListener("click",deleteItem);
}*/

/*
function deleting() {
    for(var i=0; i<delteButton.length; i++){
        delteButton[i].addEventListener("click",deleteItem);
    }
}*/

function addDeleteListener(){
    for(var i=0; i<delteButton.length; i++){
        delteButton[i].addEventListener("click",deleteItem);
    }
}

addDeleteListener();

function addDoneListener(){
    for(var i=0; i<listItems.length; i++){
        listItems[i].addEventListener("click",isDone);
    }
}

addDoneListener();