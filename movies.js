let moviesArray = []; 


function updateArray(event) { 
    event.preventDefault();
    const movieName = document.getElementById('name').value; 
    if (movieName) {
        moviesArray.push(movieName); 
    
       document.getElementById('name').value = '';  } else {
        alert("Input field cannot be left empty!");
    }
    document.getElementById("demo2").innerHTML = "Total no. of movies added: "+moviesArray.length;
    document.getElementById("demo3").innerHTML = "";
}

function displayArray(event) { 
    event.preventDefault();
    document.getElementById("demo2").innerHTML = moviesArray.join("<br>") ;
    document.getElementById("demo3").innerHTML = "Total no. of movies added: " + moviesArray.length;
}

function removeMovie(event) {
    event.preventDefault();

    const movieName = document.getElementById('name').value; 
    if (movieName) {
        const index =moviesArray.indexOf(movieName);
        if (index >-1) {
            moviesArray.splice(index, 1); 
        } else {
            alert(movieName + " not found");
        }
        document.getElementById('name').value = ''; 
    } else {
        alert("Please enter a movie name to remove.");
    }
    document.getElementById("demo2").innerHTML = "Total no. of movies added: "+moviesArray.length;
    document.getElementById("demo3").innerHTML = "";

}

function clearArray(event){
    event.preventDefault();
    moviesArray=[];
    document.getElementById("demo2").innerHTML = "";

    document.getElementById("demo3").innerHTML = "Total no. of movies added: " + moviesArray.length;
}

const updateButton = document.getElementById('updateButton'); 
updateButton.addEventListener('click', updateArray);

const deleteButton = document.getElementById('deleteButton'); 
deleteButton.addEventListener('click', removeMovie);

const displayButton = document.getElementById('displayButton'); 
displayButton.addEventListener('click', displayArray);

const clearButton = document.getElementById('clearButton'); 
clearButton.addEventListener('click', clearArray);


