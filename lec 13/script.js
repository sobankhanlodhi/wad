function calc(n1, n2) {
    console.log("Calc function Declaration");
    return n1+n2;
}

console.log( calc(3,4) );

/*
var calculator = function () {
    console.log("Calc Function Expression");
}

calculator();*/

var citiesList = [ 12,"kchi", false, function abc() {} ]


/*
var user = {
    name: Ali;
    age = 27;
    isAlive = true;
    favMovies: ["The revenant"],
        teach
}*/

var dataBase = {
    username : "Ali",
    password : "123"
}

var newsFeed = [ {
    friend: "Usman",
    status: "I am feeling happy today!"
},
    {
        friend: "Umer",
        status: "I am feeling lonely today ! Join me :p"
    } ]

temp = prompt("Enter username");
temp2 = prompt("Enter password");

if(temp===dataBase.username && temp2===dataBase.password){
    console.log(newsFeed[0],newsFeed[1]);
}else{
    console.log("Invalid Username and Password");
}