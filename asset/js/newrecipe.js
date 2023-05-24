let currentStep = 1;


function showStep(step) {
document.getElementById('step-' + step).classList.add('active');
}

function hideStep(step) {
document.getElementById('step-' + step).classList.remove('active');
}

function nextStep(next) {
hideStep(currentStep);
showStep(next);
currentStep = next;
}

function prevStep(prev) {
hideStep(currentStep);
showStep(prev);
currentStep = prev;
}

let t = document.getElementById('test')
t.addEventListener('click', function(e){
    nextStep(2)
    let ingr = document.getElementById('buttonIngredient')
    let form = document.getElementById('form')
    ingr.addEventListener('click', function() {
        let newQuantityLabel = document.createElement('label');
        let newQuantityInput = document.createElement('input');
        let newUnityLabel = document.createElement('label');
        let newUnityInput = document.createElement('input');
        let newIngredientLabel = document.createElement('label');
        let newIngredientInput = document.createElement('input');
        form.appendChild(newQuantityLabel);
        form.appendChild(newQuantityInput);
        form.appendChild(newUnityLabel);
        form.appendChild(newUnityInput);
        form.appendChild(newIngredientLabel);
        form.appendChild(newIngredientInput);})
})

// let ingredient = document.getElementById('ingredient');
// console.log(ingredient);
// let form = document.getElementById('form');
// ingredient.addEventListener('click', function() {
//     alert('co')
//     // let newQuantityLabel = document.createElement('label');
//     // let newQuantityInput = document.createElement('input');
//     // let newUnityLabel = document.createElement('label');
//     // let newUnityInput = document.createElement('input');
//     // let newIngredientLabel = document.createElement('label');
//     // let newIngredientInput = document.createElement('input');
//     // form.appendChild(newQuantityLabel);
//     // form.appendChild(newQuantityInput);
//     // form.appendChild(newUnityLabel);
//     // form.appendChild(newUnityInput);
//     // form.appendChild(newIngredientLabel);
//     // form.appendChild(newIngredientInput);
// });