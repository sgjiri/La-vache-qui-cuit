// let currentStep = 1;
// let stepPrev = currentStep -1
// let two = 2;



// // go to next step
// function nextStep(next) {
//     //hide of current step
//     hideStep(currentStep);
//     //change value of showStep
//     showStep(next);
//     //change value of currentStep
//     currentStep = next;
// }


// function prevStep(prev) {
//     hideStep(currentStep);
//     showStep(prev);
//     currentStep = prev;
// }


// // add active class to next step
// function showStep(next) {
//     document.getElementById('step-' + next).classList.add('active');
// }

// //removev active class to precedent step
// function hideStep(stepPrev) {
//     document.getElementById('step-' + stepPrev).classList.remove('active');
// }

let t = document.getElementById('nextForm')
t.addEventListener('click', function (e) {
    e.preventDefault();
    let title = document.getElementById("title").value;
    let duration = document.getElementById("duration").value;
    let description = document.getElementById("description").value;
    let photo = document.getElementById("duration").photo;
    let difficulty = document.getElementById("difficulty").value;
    console.log(title);
    if (title, duration, description, photo, difficulty) {
    document.getElementById('step-2').classList.add('active');
    document.getElementById('step-1').classList.remove('active')

    let ingr = document.getElementById('buttonIngredient');
    let QUI = document.getElementById('QUI');

    let i = 1;
    ingr.addEventListener('click', function (er) {
        er.preventDefault();
        //add +1 to i on every click on button ingr for generate id unique
        i++;


        let newDiv = document.createElement('div');
        //set new quantity label
        let newQuantityLabel = document.createElement('label');
        newQuantityLabel.className = "quantityLabel";
        newQuantityLabel.setAttribute("for", "quantity" + i);
        newQuantityLabel.innerHTML = 'Quantité:';

        //set new quantity input
        let newQuantityInput = document.createElement('input');
        newQuantityInput.id = "quantity" + i;
        newQuantityInput.className = "quantityInput";
        newQuantityInput.setAttribute("type", "number");
        newQuantityInput.setAttribute("name", "quantity");
        newQuantityInput.setAttribute("placeholder", "Quantité")

        //set new unity label
        let newUnityLabel = document.createElement('label');
        newUnityLabel.className = "unityLabel";
        newUnityLabel.setAttribute("for", "unity" + i);
        newUnityLabel.innerHTML = 'Unité:';

        //set new unity input
        let newUnityInput = document.createElement('input');
        newUnityInput.id = "unity" + i;
        newUnityInput.className = "unityInput";
        newUnityInput.setAttribute("type", "text");
        newUnityInput.setAttribute("name", "unity");
        newUnityInput.setAttribute("placeholder", "Unité")

        //set new ingredient label
        let newIngredientLabel = document.createElement('label');
        newIngredientLabel.className = "ingredientLabel";
        newIngredientLabel.setAttribute("for", "ingredient" + i);
        newIngredientLabel.innerHTML = 'Ingredient:';

        //set new ingredient input
        let newIngredientInput = document.createElement('input');
        newIngredientInput.id = "ingredient" + i;
        newIngredientInput.className = "ingredientInput";
        newIngredientInput.setAttribute("type", "text");
        newIngredientInput.setAttribute("name", "ingredient");
        newIngredientInput.setAttribute("placeholder", "Ingredient")


        QUI.appendChild(newDiv);
        newDiv.appendChild(newQuantityLabel);
        newDiv.appendChild(newQuantityInput);
        newDiv.appendChild(newUnityLabel);
        newDiv.appendChild(newUnityInput);
        newDiv.appendChild(newIngredientLabel);
        newDiv.appendChild(newIngredientInput);
    })
}else{
    alert('Rempliser tout le champs demandés');
}})


let btnPrecedent = document.getElementById('btnPrecedent')
btnPrecedent.addEventListener('click', function (e) {
    document.getElementById('step-1').classList.add('active');
    document.getElementById('step-2').classList.remove('active')
})
